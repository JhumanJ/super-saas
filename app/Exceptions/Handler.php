<?php

namespace App\Exceptions;

use App\Events\Notion\NotionConnectionError;
use App\Listeners\Notion\NotifyOnConnectionError;
use FiveamCode\LaravelNotionApi\Exceptions\HandlingException;
use FiveamCode\LaravelNotionApi\Exceptions\LaravelNotionAPIException;
use FiveamCode\LaravelNotionApi\Exceptions\NotionException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest(url('/login'));
    }

    public function report(Throwable $exception)
    {
        if ($exception instanceof NotionException) {
            // Notify owner
            event(new NotionConnectionError(request(), $exception));
        } elseif (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof NotionException) {
            if (NotifyOnConnectionError::shouldHandle($e)) {
                if (request()->routeIs('forms.answer')) {
                    return response()->json([
                        'type' => 'success',
                        'message' => 'Form submission saved.'
                    ], 200);
                } else {
                    if ( request()->routeIs('notion.workspaces.databases.show') &&
                        str_contains($e->getMessage(),NotifyOnConnectionError::NOTION_ERROR_NOT_FOUND)
                    ) {
                        return response()->json([
                            'type' => 'not_found',
                            'message' => 'We could not find your Notion table.'
                        ], 404);
                    }

                    Log::channel('slack')->error($e);
                    return response()->json([
                        'type' => 'notion_error',
                        'message' => 'Could not connect to notion workspace.'
                    ], 433);
                }
            }
        }

        if ($this->shouldReport($e)) {
            Log::channel('slack')->error($e);

            if ($e instanceof LaravelNotionAPIException) {
                Log::channel('slack')->error($e->getPayload());
            }
        }

        return parent::render($request, $e);
    }
}

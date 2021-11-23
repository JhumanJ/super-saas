<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ImpersonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function impersonate($identifier) {
        $user = null;
        if (is_numeric($identifier)) {
            $user = User::find($identifier);
        } elseif (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $user = User::whereEmail($identifier)->first();
        }

        if (!$user) return $this->error([
            'message'=> 'User not found.'
        ]);

        // Be this user
        $token = auth()->login($user);
        return $this->success([
            'token' => $token
        ]);
    }
}

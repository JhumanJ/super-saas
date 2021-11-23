<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

    /**
     * Contains route name and the associated priority
     *
     * @var array
     */
    protected $urls = [
        ['/', 1],
        ['/pricing', 0.9],
        ['/login', 0.4],
        ['/register', 0.4],
        ['/password/reset', 0.3],
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();
        foreach ($this->urls as $url) {
            $sitemap->add($this->createUrl($url[0], $url[1]));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->line('File "sitemap.xml" published in public directory.');
    }

    private function createUrl($url, $priority, $frequency='daily')
    {
        return Url::create($url)->setPriority($priority)->setChangeFrequency($frequency);
    }
}

<?php
namespace Nicxon\TempDownload;

use Illuminate\Support\ServiceProvider;

class TempDownloadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tempdownload.php', 'tempdownload');
    }

    public function boot()
    {
        if (! class_exists('CreateTempDownloadLinksTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/2025_08_15_000000_create_temp_download_links_table.php'
                    => database_path('migrations/' . date('Y_m_d_His') . '_create_temp_download_links_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__ . '/../config/tempdownload.php' => config_path('tempdownload.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
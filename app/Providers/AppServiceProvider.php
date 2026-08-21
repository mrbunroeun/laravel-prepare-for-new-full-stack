<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Auto-check and fix public/storage link if folder was renamed or moved
        $publicStorage = public_path('storage');
        $targetStorage = storage_path('app/public');

        if (!file_exists($targetStorage)) {
            @mkdir($targetStorage, 0755, true);
        }

        // If public/storage is a broken junction/link or doesn't exist, recreate it automatically
        if (is_link($publicStorage) || (file_exists($publicStorage) && !is_dir($publicStorage))) {
            if (!file_exists($publicStorage . '/.')) {
                // Link is broken
                @unlink($publicStorage);
                @rmdir($publicStorage);
            }
        }

        if (!file_exists($publicStorage)) {
            try {
                \Illuminate\Support\Facades\Artisan::call('storage:link');
            } catch (\Throwable $e) {
                // Fallback for Windows junction creation if needed
                if (PHP_OS_FAMILY === 'Windows') {
                    @exec(sprintf('cmd /c mklink /J "%s" "%s"', $publicStorage, $targetStorage));
                }
            }
        }
    }
}

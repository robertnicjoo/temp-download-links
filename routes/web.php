<?php
use Nicxon\TempDownload\TempDownloadController;

Route::get('/download/{token}', [TempDownloadController::class, 'download'])
    ->name('temp.download');
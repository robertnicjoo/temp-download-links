<?php
namespace Nicxon\TempDownload;

use Illuminate\Database\Eloquent\Model;

class TempDownloadLink extends Model
{
    protected $fillable = [
        'token',
        'file_path',
        'max_downloads',
        'download_count',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
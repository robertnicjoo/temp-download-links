<?php
namespace Nicxon\TempDownload;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TempDownloadLinkService
{
    public function make(string $filePath, int $minutes = 60, int $maxDownloads = 1): string
    {
        $token = Str::random(40);

        TempDownloadLink::create([
            'token'         => $token,
            'file_path'     => $filePath,
            'max_downloads' => $maxDownloads,
            'expires_at'    => Carbon::now()->addMinutes($minutes),
        ]);

        return route('temp.download', ['token' => $token]);
    }

    public function resolve(string $token)
    {
        return TempDownloadLink::where('token', $token)
            ->where('expires_at', '>', now())
            ->whereColumn('download_count', '<', 'max_downloads')
            ->firstOrFail();
    }

    public function incrementDownload(TempDownloadLink $link)
    {
        $link->increment('download_count');
        if ($link->download_count >= $link->max_downloads) {
            $link->delete();
        }
    }
}
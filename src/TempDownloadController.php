<?php
namespace Nicxon\TempDownload;

use App\Http\Controllers\Controller;

class TempDownloadController extends Controller
{
    public function download($token, TempDownloadLinkService $service)
    {
        $link = $service->resolve($token);

        $service->incrementDownload($link);

        $filePath = $link->file_path;

        if (filter_var($filePath, FILTER_VALIDATE_URL)) {
            return redirect($filePath);
        }

        return response()->download($filePath);
    }
}
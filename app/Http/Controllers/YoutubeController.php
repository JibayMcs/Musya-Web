<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class YoutubeController extends Controller
{
    public function download($url)
    {
        dispatch(function () use ($url) {
            Artisan::call("youtubedl $url");
        });

        return redirect()->back();
    }
}

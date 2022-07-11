<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function index()
    {
        $artists = Artist::all();

//        dd($artists[0]->tracks);

        return view('dashboard', compact('artists'));
    }

}

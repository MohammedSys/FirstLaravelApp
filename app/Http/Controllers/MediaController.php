<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function getViewers(){
        $video = Video::first();
        event(new VideoViewer($video)); // Fire the Event with event Fun (Ready from laravel)
        return view('video')->with('video', $video);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\Video;
class VideoController extends Controller
{
    public function store(Request $request)
    {
        // $video = \App\Models\Video::create([
        //     'disk' => 'videos_disk',
        //     'original_name' => $request->file->getClientOriginalName(),
        //     'path' => fileupload($request, "videos_disk", "video"),
        //     'title' => $request->title,
        // ]);

        // // dispatch(new ConvertVideoForDownloading($video));
        // // dispatch(new ConvertVideoForStreaming($video));

        return "your video uploads is processing :)";
    }
}

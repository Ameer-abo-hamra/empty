<?php

use App\Http\Controllers\Video;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/video-upload', function () {
    return view('upload_video');
});

Route::post("upload-video", [VideoController::class, "store"])->name("upload.video");

// Route::get("video/{video_id}", function ($video_id) {

//     return view("videoPlay", compact("video_id"));
// });

// use Illuminate\Support\Facades\File;

Route::get("video/{video_id}", function ($video_id) {
    $directory = public_path("streamable_videos");

    // البحث عن جميع الملفات التي تحتوي على video_id وتنتهي بـ .m3u8
    $files = File::files($directory);
    $videoFiles = [];

    foreach ($files as $file) {
        if (str_contains($file->getFilename(), $video_id) && $file->getExtension() === 'm3u8') {
            $videoFiles[] = $file->getFilename();
        }
    }

    if (empty($videoFiles)) {
        abort(404, "Video not found");
    }

    return view("videoPlay", compact("videoFiles", "video_id"));
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;
use Storage;
class ApiController extends Controller
{
    function getTopics() {
        $topics = Topic::all();
        return response()->json($topics);
    }
    function postAnswers(Request $request) {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        return json_encode(Storage::disk('dynamic_images')->put('image.png', $data));

    }
}

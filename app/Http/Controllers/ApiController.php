<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;
use Storage;
use App\Image;
use App\Question;
use Session;
class ApiController extends Controller
{
    function getTopics(Request $request) {
        $workspace = Session::get('workspace');
        return view('trial', compact('workspace'));
    }
    function postAnswers(Request $request) {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        $image = Image::create([
            'data' => $data
            ]);
        return json_encode(Storage::disk('dynamic_images')->put($image->created_at, $data));
    }
    function postQuestions(Request $request) {

        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        $question = Question::create([
            'text' => 'wowowo',
            'topic' => $request->workspace
        ]);
        $image = Image::create([
            'data' => $data
            ]);
        $question->image_id = $image->id;
        $question->save();
    }
}

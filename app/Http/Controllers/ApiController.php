<?php

namespace App\Http\Controllers;

use App\Comment;
use App\DynamicIcon;
use App\Image;
use App\Question;
use App\Topic;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getTopics(Request $request)
    {
        return json_encode(Topic::all());
    }

    public function postAnswers(Request $request)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        $question = Question::find($request->question_id);
        $comment = Comment::create();
        $question->comments()->save($comment);
        $image = Image::create([
            'data' => $data,
        ]);
        $comment->image_id = $image->id;

        return json_encode('Yis');
    }

    public function getQuestions(Request $request, $question_id)
    {
        return json_encode(Question::findOrFail($question_id));
    }

    public function postQuestions(Request $request)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        $question = Question::create([
            'text'  => 'Lorem ipsum dolor sit amet',
            'topic' => $request->workspace,
        ]);
        $image = Image::create([
            'data' => $data,
            ]);
        $question->image_id = $image->id;
        $question->save();

        $dynamic_icons = $request->dynamic_icons;
        foreach ($dynamic_icons as $dynamic_icon) {
            $d = DynamicIcon::create($dynamic_icon);
            $image->dynamicIcons()->save($d);
        }
    }

    public function getQuestionComponents(Request $request)
    {
        $question = Question::find($request->question_id);

        return json_encode($question->image->getComponents());
    }

    public function getQuestionAnswers(Request $request, $question_id)
    {
        return json_encode(Question::findOrFail($question_id)->comments);
    }
}

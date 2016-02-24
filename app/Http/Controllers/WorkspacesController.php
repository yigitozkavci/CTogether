<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use Session;

class WorkspacesController extends Controller
{
    public function index($workspace = 'math')
    {
        Session::put('workspace', $workspace);
        Session::save();
        $topics = Topic::all();
        $questions = Question::all();

        return view('workspaces.index', compact('workspace', 'topics', 'questions'));
    }
}

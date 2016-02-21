<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;
use Session;
use App\Question;
class WorkspacesController extends Controller
{
    function index($workspace = 'math') {
        Session::put('workspace', $workspace);
        Session::save();
        $topics = Topic::all();
        $questions = Question::all();
        return view('workspaces.index', compact('workspace', 'topics', 'questions'));
    }
}

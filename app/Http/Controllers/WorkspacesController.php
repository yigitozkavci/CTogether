<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;

class WorkspacesController extends Controller
{
    function index($workspace = 'math') {
        $topics = Topic::all();
        return view('workspaces.index', compact('workspace', 'topics', 'questions'));
    }
}

<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function getIndex()
    {
        return view('users.index');
    }

    public function workspaceIndex($workspace)
    {
    }
}

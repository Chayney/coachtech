<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;

class CommentController extends Controller
{
    public function index()
    {
        return view('index');
    }
}

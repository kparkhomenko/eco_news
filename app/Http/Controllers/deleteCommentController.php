<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class deleteCommentController extends Controller
{
    public function delete(Request $req){
        Comment::where('id', '=', $req->id)->delete();
    }
}

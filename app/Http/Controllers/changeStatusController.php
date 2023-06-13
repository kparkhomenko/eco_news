<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class changeStatusController extends Controller
{
    public function change(Request $req){
        News::where('id', '=', $req->id)->update(["status" => 'moderated']);
    }
}


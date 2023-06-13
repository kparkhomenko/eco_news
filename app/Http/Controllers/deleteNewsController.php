<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class deleteNewsController extends Controller
{
    public function delete(Request $req){
        News::where('id', '=', $req->id)->delete();
    }
}

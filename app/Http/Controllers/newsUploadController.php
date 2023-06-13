<?php

namespace App\Http\Controllers;


use App\Http\Requests\newsUploadRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class newsUploadController extends Controller
{
    public function upload(newsUploadRequest $req)
    {
        $req->file('image')->store('public/titleImages');
        $image_name = $req->file('image')->hashName();
        News::create(array_merge($req->validated(), ['user_id' => Auth::user()->id, 'path' => $image_name, 'status' => 'unmoderated']));
        $success_message = $req->session()->put('success_message', 'Новость отправлена на модерацию');
        return redirect()->back()->with($success_message);
    }
}

<?php

use App\Http\Controllers\newsUploadController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\sendCommentController;
use App\Http\Controllers\changeStatusController;
use App\Http\Controllers\deleteNewsController;
use App\Http\Controllers\deleteCommentController;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $news = News::where('status', '=', 'moderated')->orderBy('id', 'desc')->get();
    if (Auth::check()) {
        if(Auth::user()->status == 'admin') {
        $news = News::all();
        return view('mainpage', compact('news'));
        } else {
            return view('mainpage', compact('news'));
        }
    } else {
        return view('mainpage', compact('news'));
    }
})->name('mainPage');
Route::get('statusChange', [changeStatusController::class, 'change'])->name('statusChange');
Route::get('deleteNews', [deleteNewsController::class, 'delete'])->name('deleteNews');

Route::get('news/{id}', function ($id) {
    $news = News::find($id);
    $user = User::find($news->user_id);
    $news_item = News::find($id);
    if($news_item->status == 'moderated') {
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('news_id', '=', $id)
            ->select('comments.id', 'comments.user_id', 'comments.user_name', 'comments.text', 'comments.created_at', 'users.path')
            ->orderBy('id', 'desc')
            ->paginate(20);
         return view('newspage', compact('news_item', 'comments', 'user'));
        
    } else {
        if(Auth::check()) { 
         if(Auth::user()->status == 'admin') {
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('news_id', '=', $id)
            ->select('comments.id', 'comments.user_id', 'comments.user_name', 'comments.text', 'comments.created_at', 'users.path')
            ->orderBy('id', 'desc')
            ->paginate(20);
            return view('newspage', compact('news_item', 'comments', 'user'));
        }  else {
            return redirect()->back();
        }
        } else {
           return redirect()->back(); 
        }   
    }
});
Route::get('deleteComment', [deleteCommentController::class, 'delete'])->name('deleteComment');

Route::get('sendcomment', [sendCommentController::class, 'send'])->name('sendComment');

Route::get('addnews', function () {
        if (Auth::check()) {
        return view('addNewsPage');
        }
})->name('newsupload');
Route::post('addnews', [newsUploadController::class, 'upload'])->name('newsuploading');

Route::get('logout', function () {
    Auth::logout();
    return redirect('register');
})->name('logout');

Route::get('userpage/{id}', function($id) {
    Artisan::call('storage:link');
    $user = User::find($id);
    $news = News::where('region', '=', $user->region)->where('status', '=', 'moderated')->orderBy('id', 'desc')->paginate(6);
    return view('userpage', compact('user', 'news'));
})->name('userpage');


Route::get('register', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('/');
    }
    return view('registration');
})->name('register');
Route::post('register', [registrationController::class, 'add_user'])->name('user_register');

Route::get('login', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('userpage/' . Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'let_user_in'])->name('user_login');

Route::get('/map', function () {
    return view('regionMap');
})->name('regionMap');

Route::get('/map/region', function () {
    return view('regionNewsPage');
})->name('regionPage');

Route::get('regionPage/volgograd', function () {
    Artisan::call('storage:link');
    $region = 'volgograd';
    $news = News::where('region', '=', $region)->where('status', '=', 'moderated')->orderBy('id', 'desc')->paginate(6);
    return view('regionNewsPage', compact('news'));
});

Route::get('regionPage/astrakhan', function () {
    Artisan::call('storage:link');
    $region = 'astrakhan';
    $news = News::where('region', '=', $region)->where('status', '=', 'moderated')->orderBy('id', 'desc')->paginate(6);
    return view('regionNewsPage', compact('news'));
});

Route::get('regionPage/rostov', function () {
    Artisan::call('storage:link');
    $region = 'rostov';
    $news = News::where('region', '=', $region)->where('status', '=', 'moderated')->orderBy('id', 'desc')->paginate(6);
    return view('regionNewsPage', compact('news'));
});

Route::get('regionPage/krasnodar', function () {
    Artisan::call('storage:link');
    $region = 'krasnodar';
    $news = News::where('region', '=', $region)->where('status', '=', 'moderated')->orderBy('id', 'desc')->paginate(6);
    return view('regionNewsPage', compact('news'));
});

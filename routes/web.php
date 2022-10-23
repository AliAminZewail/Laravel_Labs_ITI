<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;

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
    return view('welcome');
});

// Route::get('/test', function () {
//     $testName = 'ahmedasdasdasdd';
//     $books = ['first book', 'second book'];

//     return view('test', [
//         'name' => $testName,
//          'age' => 23,
//          'books' => $books,
//     ]);
// });

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/indexoff/{post}', [PostController::class, 'indexoff'])->name('posts.indexoff');

Route::get('posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/view/{post}', [PostController::class, 'view'])->name('posts.view');
Route::get('/posts/delete/{post}', [PostController::class, 'delete'])->name('posts.delete');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');

// class Test
// {
//     protected $hello;

//     public function greeting () 
//     {

//     }
// }

// $test = new Test;

// $test->hello;
// $test['hello'];// thorws exception

// foreach($test as $item){ //thorws exception

// }

Route::get('test',function(){
    $user = User::find(1);

    dd($user->posts);
});
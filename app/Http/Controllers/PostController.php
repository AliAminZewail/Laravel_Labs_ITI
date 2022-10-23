<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $allPosts = Post::all()->skip(0)->take(4);

        return view('posts.index', [
          'posts' => $allPosts
        ]);
    }

    public function indexoff($num){
        $allPosts = Post::all()->skip(($num - 1)*4)->take(4);
        return view('posts.index', [
            'posts' => $allPosts
          ]);
  
    }


    public function create()
    {
        $allUsers = User::all();

        return view('posts.create',[
            'allUsers' => $allUsers
        ]);
    }

    public function view($postId)
    {

        $post = Post::find($postId);
        return view('posts.view',['post'=> $post]);
    }

    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
       
        return view('posts.edit',['post'=> $post]);
    }    

    public function store()
    {
        $data = request()->all();

        // request()->title
        // request()->description
        // request()->post_creator
        // dd($data, request()->title, request()->post_creator);

        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]); //insert into posts ('ahmed','asdasd')

        return to_route('posts.index');
    }
    public function update($postId)
    {
        // $data = $_POST;
        $data = request()->all();
        $post = Post::find($postId);
        
        $post->update([
            'title' => $data['title'],
            'description'=> $data['description']
        ]);

        // request()->title
        // request()->description
        // request()->post_creator
        // dd($data, request()->title, request()->post_creator);
/*
        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]); //insert into posts ('ahmed','asdasd')

  **/
        return to_route('posts.index');
    }
}

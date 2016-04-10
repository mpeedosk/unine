<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        if($request->ajax()) {
            return [
                'posts' => view('loelisaks.ajax.loelisaks')->with(compact('posts'))->render(),
            ];
        }
        return view('loelisaks', compact('posts'));
    }

    protected function store(Request $request){

        $post = new Post;
        $post -> body = $request->body;
        $post->save();

        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);

        if($request->ajax()) {
            return [
                'posts' => view('loelisaks.ajax.loelisaks')->with(compact('posts'))->render(),
            ];
        }

        return back();
    }
}

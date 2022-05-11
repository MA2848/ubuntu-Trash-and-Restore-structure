<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'title' =>['required','min:5','max:50','unique:posts'],
            'email' =>['required','min:20','max:100','unique:posts'],
            'description' =>['required','min:55','max:500'],
        ]);

      $post = new Post();
      $post->title = $request->title;
      $post->email = $request->email;
      $post->description = $request->description;
      $post->save();

      session()->flash('success', 'Post created successfully');
      return redirect(route('posts.index'));
    }

    public function show($id)
    {
       $post = Post::find($id);
       return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title' =>['required','min:5','max:50'],
            'email' =>['required','min:10','max:100'],
            'description' =>['required','min:50','max:500'],
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->email = $request->email;
        $post->description = $request->description;
        $post->save();

        session()->flash('success', 'Post updated successfully');
        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->find($id);
        if($post->trashed())
        {
            $post->forceDelete();
            session()->flash('success', 'Post deleted successfully');
            return redirect(route('posts.index'));
        }else{

            $post->delete();
            session()->flash('success', 'Post Trashed successfully');
            return redirect(route('posts.index'));
        }
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();

        session()->flash('success','Post restored successfully');
        return redirect(route('posts.index'));
    }
}

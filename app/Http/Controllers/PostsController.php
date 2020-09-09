<?php


namespace App\Http\Controllers;


use DB;
use App\Post;
use App;
use App\check;
use mysqli;

class PostsController
{

    public function show($link)
    {
        if ($this->checkdb() === 1) {
            return view('500');
        } else {
            return view('posts.post', [
                'post' => post::where('link', $link)->firstOrFail()
            ]);
        }
    }

    public function create()
    {
        return view('posts.createpost');
    }

    public function store()
    {
        if ($this->checkdb() === 1) {
            return view('500');
        } else {
            Post::create(request()->validate([
                'title' => 'required',
                'link' => 'required',
                'text' => 'required',
                'hide' => 'required',
                'user_id' => 'required'
            ]));
            return redirect('/posts');
        }
    }

    public function edit($link)
    {
        $post = Post::where('link', $link)->firstOrFail();

        return view('posts.edit', compact('post'));
    }

    public function update($link)
    {
        if ($this->checkdb() === 1) {
            return view('500');
        } else {
            $post = Post::where('link', $link)->firstOrFail();
            $post->update(request()->validate([
                'title' => 'required',
                'link' => 'required',
                'text' => 'required',
                'hide' => 'required',
                'user_id' => 'required'
            ]));

            return redirect('/posts/' . $post->link);
        }
    }

    public function checkdb()
    {
        try {
            $test = DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $test = 1;
        }
        return $test;
    }
}

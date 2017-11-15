<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 記事一覧表示
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [ "posts" => $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 記事作成
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create', [ "post" => $post ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 新規記事登録
     */
    public function store(Request $request)
    {
        /*バリデーション追加*/
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|min:4'
        ]);
        /**/
        $post = Post::create($request->all());
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     * 
     * 記事詳細表示
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        //return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     * 
     * 既存記事編集
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     * 
     * 編集記事登録
     */
    // public function update(Request $request, Post $post)
    public function update(Request $request, Post $post)
    {
        /*バリデーション追加*/
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|min:4'
        ]);
        /**/
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     * 
     * 記事削除
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}

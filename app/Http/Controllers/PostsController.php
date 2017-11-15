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

    /**
     * 記事検索
     */
    public function search(Request $request)
    //{
        /* 検索キーワードの授受 */
        //$words = $request->input('words');
        //$from_date = $request->input('from_date');
        //$to_date = $request->input('to_date');
        /* titleとcontentの検索*/
        //$posts = Post::where('title', 'like', '%' .$words. '%')
        //    ->orwhere('content', 'like', '%' .$words. '%')
        //    ->wherebetween('created_at', [$from_date, $to_date])->get();
        //    dd($request);
    {
        $words = $request->input('words');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        
        //検索ワードが入力されていたら、ワード検索を実行する
        if ($words != null) {
            $posts = Post::where(function ($query) use ($words) {
            $query->where('title', 'like', '%' .$words. '%')
                ->orWhere('content', 'like', '%' .$words. '%');})->get();
        //日付が入力されていたら、日付範囲検索を実行する
        }else if ($from_date != null && $to_date != null) {
            $posts = Post::wherebetween('created_at', [$from_date, $to_date])->get();
        //何も入力されていなければ、テーブル全体を取得
        } else {
            $posts = Post::all();
        }
        return view('posts.index', [ "posts" => $posts ]);
    }
}

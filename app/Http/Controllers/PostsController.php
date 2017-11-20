<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\UserRequest;
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
    public function index(Request $request)
    {
        $query = Post::query();
        /*検索開始日(from_date)設定*/
        if($request->from_date){
            $query -> where('created_at', '>', $request->from_date);
        }
        /*検索終了日(to_date)設定*/
        if($request->to_date){
            $query -> where('created_at', '<', $request->to_date);
        }
        /*検索単語(word)設定*/
        if($request->words){
            $ary_word = preg_split('/[\s|　]+/', $request->words);
            foreach( $ary_word as $word ){
                $query -> where('title','LIKE','%'.$word.'%')
                    -> orwhere('title','LIKE','%'.$word.'%');
            }
        }
        /*pager設定*/
        $posts = $query->paginate(20);
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
    public function store(UserRequest $request)
    {
        $post = Post::create($request->all());
        $post->save();
        /* FlashMessage追加*/
        \Session::flash('flash_message', '記事を登録しました。');
        /**/
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
     * 記事更新
     */
    // public function update(Request $request, Post $post)
    public function update(UserRequest $request, Post $post)
    {
        $post->update($request->all());
        /* FlashMessage追加*/
        \Session::flash('flash_message', '記事を更新しました。');
        /**/
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
        /* FlashMessage追加*/
        \Session::flash('flash_message', '記事を削除しました。');
        /**/
        return redirect()->route('posts.index');
    }
}

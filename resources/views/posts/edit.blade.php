<!-- edit.php 概要：記事編集画面 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>記事編集</title>
    </head>
      <body>
        <h2>Editing</h2>
          {{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put']) }}
          @include('layouts.form')
          <input type="submit" value="更新">&nbsp;<input type="reset" value="復元">
          {{ Form::close() }}
          <a href="{{ action('PostsController@index') }}">記事一覧画面へ</a>
      </body>
</html>
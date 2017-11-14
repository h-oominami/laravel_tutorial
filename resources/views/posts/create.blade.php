<!-- create.php 概要：記事作成画面 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>記事作成</title>
  </head>
    <body>
      <form action="{{ action('PostsController@store', $post) }}" method="POST">
        @include('layouts.form')
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="登録">&nbsp;<input type="reset" value="クリア"><br>
        <a href="{{ action('PostsController@index') }}">記事一覧画面へ</a>
      </form>
    </body>
</html>
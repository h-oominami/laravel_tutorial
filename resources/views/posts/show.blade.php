<!-- show.php 概要：記事詳細画面 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>記事詳細</title>
  </head>
    <body>
      <h2>記事詳細</h2>
        <th>タイトル</th>
        <th>コンテンツ</th>
          <table border="1" cellspacing="0" cellpadding="1">
            <td>{{$post->title}}</td>
	          <td>{{$post->content}}</td><br>
              {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id])}}
             <td>{{ Form::submit('削除') }}</td>
              {{ Form::close() }}
          </table>
          <a href="{{ action('PostsController@index') }}">記事一覧画面へ</a>      
    </body>
</html>
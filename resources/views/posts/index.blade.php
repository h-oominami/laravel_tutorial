<!-- index.php 概要：記事一覧画面 -->

<!DOCTYPE html>
<html>
  <body>
    <h2>記事一覧</h2>
      <th>タイトル</th><br>
      @foreach ($posts as $post)
        <tr>
          {{ link_to_route('posts.show', $post->title, [$post->id]) }}
            <button class="btn-default btn-sm">
              {{ link_to_route('posts.edit', 'Editing', [$post->id]) }}
            </button><br>
        </tr>
      @endforeach
      <br><a href="{{ action('PostsController@create')}}">記事作成画面へ</a>           
  </body>
</html>

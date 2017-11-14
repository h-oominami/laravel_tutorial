<!-- form.blade.php 概要：画面マスターレイアウト -->

<!DOCTYPE HTML>
<html lang="ja">
  タイトル<br>
  <input type="text" name="title" style="width:100%" value="{{ $post['title'] }}"><br>
  <br>コンテンツ<br>
  <textarea name="content" style="width:100%" rows="30">{{ $post['content'] }}</textarea><br>
</html>

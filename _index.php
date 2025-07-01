<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment Board</title>
</head>
<body>
  <form action="create.php" method='POST'>
    <fieldset>
      <div>
        <label for="nickname">ニックネーム：</label>
        <input type="text" name="nickname" id="nickname" requied>
      </div>
      <div>  
        <label for="comment">コメント</label>
        <textarea name="comment" id="comment" rows="4" cols="40" requeied></textarea>
      </div>
      <button>投稿</button>
    </fieldset>
  </form>
</body>
</html>
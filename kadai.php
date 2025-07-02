<?php
// var_dump($_GET);
// exit();

// DB接続
$dbn = 'mysql:dbname=gs_kadai07_db1;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try { 
  $pdo = new PDO($dbn, $user, $pwd); // PHP Data Object
}catch(PDOException $e) {
  // 連想配列（PHP）→JSON文字列
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// GETパラメータの検証
if(!isset($_GET['kadai_id']) || !is_numeric($_GET['kadai_id'])){
  exit('ParamError');
}
$kadai_id = (int)$_GET['kadai_id'];

// 課題情報取得
$sql = 'SELECT * FROM kadai WHERE id = :kadai_id'; // プレースホルダ
$stmt = $pdo->prepare($sql);
// SQLインジェクション対策　方法① 連想配列で渡す
$stmt->execute([':kadai_id' => $kadai_id]);

// SQLインジェクション対策　方法②
// $stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_INT);
// $stmt->execute();

// idが一致する課題を取得（1件のみなのでfetch）
$kadai = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$kadai) {
  exit('課題が見つかりません');
}

// コメント一覧取得（投稿日降順）
$sql = 'SELECT nickname, comment, commented_at FROM comment WHERE kadai_id=:kadai_id ORDER BY commented_at DESC';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':kadai_id', $kadai_id, PDO::PARAM_INT);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC); // カラム名をキーとした連想配列
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>「<?= htmlspecialchars($kadai['title']) ?>」の掲示板</title>
</head>
<body>
  <h1>「<?= htmlspecialchars($kadai['title']) ?>」の掲示板</h1>
  <h2>コメント一覧</h2>
  <?php if(count($comments) === 0): ?>
    <p>まだコメントはありません</p>
  <?php else: ?>
    <?php foreach($comments as $comment): ?>
      <div class='post'>
        <strong><?= htmlspecialchars($comment['nickname']) ?></strong>
        (<?= htmlspecialchars($comment['commented_at'])?>)<br>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>
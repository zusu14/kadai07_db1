<?php
// var_dump($_POST);
// exit();

// 入力チェック
if (
  !isset($_POST['nickname']) || $_POST['nikcname'] === '' ||
  !isset($_POST['comment']) || $_POST['comment'] === '' ||
  !isset($_POST['kadai_id']) || !is_numeric($_POST['kadai_id'])
){
  exit('ParamError');
}

$nickname = $_POST['nickname'];
$comment = $_POST['comment'];
$kadai_id = (int)$_POST['kadai_id']; // int型にキャスト

// DB接続
$dbn = 'mysql:dbname=gs_kadai07_db1;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try { 
  $pdo = new PDO($dbn, $user, $pwd); // PHP Data Object
}catch(PODException $e) {
  // 連想配列（PHP）→JSON文字列
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO comment(id, nickname, comment, commented_at, kadai_id) VALUES(NULL, :nickname, :comment, now(), :kadai_id)';
$stmt = $pdo->prepare($sql);
try { 
  // SQLインジェクション対策　方法① 連想配列で渡す
  $stmt->execute([
    ':nickname' => $nickname,
    ':comment' => $comment,
    ':kadai_id' => $kadai_id
  ]);
}catch(PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// 掲示板画面へリダイレクト
header("Location: kadai.php?kadai_id=" . $kadai_id); // phpの文字列結合はドット
exit();

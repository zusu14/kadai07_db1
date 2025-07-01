<?php
var_dump($_POST);
// exit();

// POSTデータ確認（NOT NULL, NOT ''）
if (
  !isset($_POST['nickname']) || $_POST['nikcname'] === '' ||
  !isset($_POST['comment']) || $_POST['comment'] === '' ||
  !isset($_POST['kadai_id']) || $_POST['kadai_id'] === ''
){
  exit('ParamError');
}

$nickname = $_POST['nickname'];
$comment = $_POST['comment'];
$kadai_id = $_POST['kadai_id'];

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
$sql = 'INSERT INTO comment(id, nickname, comment, commented_at, kadai_id') VALUES(NULL, :nickname, :comment, now(), :kadai_id);

<?php
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
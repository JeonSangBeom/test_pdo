<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";

$seq = $_GET['seq'];

// 1. 게시글을 삭제하기 위한 sql문
$del_sql = "delete from bbs where seq='$seq'";
$del_stt=$pdo->prepare($del_sql);
$del_stt->execute();

echo
"<script>
  window.alert('글이 정상적으로 삭제되었습니다!');
  location.href='board.php';
</script>";
?>

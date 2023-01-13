<?php
include $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 



//$connect = mysqli_connect("localhost", "root", "", "test_bbs") or die("fail");

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "upload/".$filename;
move_uploaded_file($tmpfile,$folder);


$name    = $_POST['name'];                   //Writer
$pw      = $_POST['pw'];                     //Password
$subject = $_POST['subject'];               //Title
$content = $_POST['content'];  



$sql = "INSERT INTO bbs (name, pw, subject, content, file,  regdate, hit ) 
        values('$name','$pw','$subject','$content', '$o_name', NOW(), 0 )";

$pdo->prepare($sql)->execute();



echo
"<script>
window.alert('등록이 완료되었습니다!');
location.href='board.php';
</script>";






?>

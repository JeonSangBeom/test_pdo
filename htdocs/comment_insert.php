<?php include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; ?>
<?php
//$connect = mysqli_connect("localhost", "root", "", "test_bbs") or die("fail");

$seq = $_GET['seq'];                   //Writer
$content = $_POST['content'];           //Content
//$date = date('Y-m-d H:i:s');            //Date

//exit;

$sql = "INSERT INTO comment (id, name, pw, category, content, regdate, hit ) 
        values('', '','', $seq ,'$content', NOW(), 0 )";

$pdo->prepare($sql)->execute();



echo
"<script>
window.alert('등록이 완료되었습니다!');
location.href='read.php?seq={$_GET['seq']}';
</script>";

?>
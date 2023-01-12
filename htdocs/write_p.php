<?php include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; ?>
<?php
//$connect = mysqli_connect("localhost", "root", "", "test_bbs") or die("fail");

$name = $_POST['name'];                   //Writer
$pw = $_POST['pw'];                     //Password
$subject = $_POST['subject'];               //Title
$content = $_POST['content'];           //Content
//$date = date('Y-m-d H:i:s');            //Date

$URL = 'board.php';                   //return URL


$sql = "INSERT INTO bbs (name, pw, subject, content, regdate, hit ) 
        values('$name','$pw','$subject','$content', NOW(), 0 )";

$pdo->prepare($sql)->execute();



echo
"<script>
window.alert('등록이 완료되었습니다!');
location.href='board.php';
</script>";





//include  __DIR__ . '../board.php';
/*
$result = $st->query($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($con);
*/
?>

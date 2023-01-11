<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>
<?php
//$connect = mysqli_connect("localhost", "root", "", "test_bbs") or die("fail");

$bno = $_POST['bno'];
$name = $_POST['name'];                   //Writer
$pw = $_POST['pw'];                     //Password
$subject = $_POST['subject'];               //Title
$content = $_POST['content'];           //Content
//$date = date('Y-m-d H:i:s');            //Date

$URL = 'board.php';                   //return URL


$query = "UPDATE bbs set name='$name',pw='$pw',subject='$subject',content='$content' where seq=$bno";

$result = $con->query($query);

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
?>
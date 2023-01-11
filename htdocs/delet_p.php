<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>

<?php
$bno = $_GET['bno'];
$pw = $_GET['pw'];

$URL = 'board.php';

$query = "DELET FROM bbs WHERE seq=$bno and pw=$pw";

$result = $con->query($query);
if ($result){
?> <script>
        alert("<?php echo "삭제가 됐습니다." ?>");
        location.replace("<?php echo $URl ?>");
    </script>
<?php
} else {
    echo "실패했습니다.";
}

mysqli_close($con);
?>
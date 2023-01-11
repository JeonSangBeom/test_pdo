<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body{
        width: 100%;
        height: 100%;
        margin: 0 auto;
        
    }
</style>
    <title>Document</title>
</head>
<body>
    <?php 
	    $bno = $_GET['seq'];
	//    $query = "SELECT * FROM bbs WHERE seq=$bno";
    //      //$sql = query("SELECT * FROM bbs WHERE seq=$bno"); 
      //  $res = mysqli_query($con, $query);
      //  $board = mysqli_fetch_array($res);
    ?>
    <h1>회원정보 삭제</h1>
    <form method="get" action="delet_p.php">
        <input type="hidden" name="bno" value=<?php echo $bno;?>>
        <input type="password" name="pw" id="pw" placeholder="비밀번호입력">
        <button>확인</button>
    </form>
</body>
</html>
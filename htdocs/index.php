<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 
session_start();

//echo "userName 값: ".$_SESSION['id']."<br/>"; 
//echo "userPw 값: ".$_SESSION['pass']; 
?>
  
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
    <h1>SB site</h1>
    <form method="get" action="delet_p.php">
            <ul>
             <?php
            if(!isset($_SESSION['id']))
            {
            ?>
             <li><a href="/member/login.php">로그인</a></li> 
             <li> <a href="/member/member.php">회원가입</a></p></li>
             <li class="depth1"><a href="/board.php">  게시판</a></li>
             <?php
            }
            else
            {
            ?>
            <li><p><?=$_SESSION['id']?>님</a> </li>
            <li><a href="/member/logout_p.php">로그아웃</a></p></li>
            <li class="depth1"><a href="/member_info.php">  회원정보관리</a></li>
            <li class="depth1"><a href="/board.php">  게시판</a></li>

            <?php
            }
            ?>
           </ul>
    </form>
</body>
</html>

<script>console.log(document.session)</script>
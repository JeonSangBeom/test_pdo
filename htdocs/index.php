<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 


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
                <li class="depth1"><a href="/project.php">로그인</a></li>
                <li class="depth1"><a href="/board.php">  회원정보관리</a></li>
                <li class="depth1"><a href="/board.php">  게시판</a></li>
            </ul>
    </form>
</body>
</html>
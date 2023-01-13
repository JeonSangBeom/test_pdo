<?php
  include $_SERVER['DOCUMENT_ROOT']."/pdo.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>로 그 인</h1>
    <br>
    <form action="login_p.php" method="post">
      <table border=1>
        <tr>
          <td>아이디</td>
          <td><input type="text" name="id"></td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td><input type="text" name="pass"></td>
        </tr>
      </table>
      <br>
      <input type="submit" value="로그인">
      <input type="button" value="돌아가기" onclick="history.back(-1)">
    </form>
  </body>
</html>
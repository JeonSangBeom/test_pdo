<?php
    include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>회 원 가 입</h1>
    <form action="member_p.php" method="post">
      <br>
      <table border=1>
        <tr>
          <td>아이디</td>
          <td><input type="text" name="id"></td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td><input type="password" name="pass"></td>
        </tr>
        <tr>
          <td>이름</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>이메일</td>
          <td><input type="text" name="email"></td>
        </tr>
      </table>
      <br>
      <input type="submit" value="회원가입">
      <input type="button" value="돌아가기" onclick="history.back(-1)">
    </form>
  </body>
</html>


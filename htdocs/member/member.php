<?php
    include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src='/js/jquery-3.6.0.min.js'></script>
  </head>
  <body>
    <h1>회 원 가 입</h1>
    <form id = "fmt" action="member_p.php" method="post">
      <br>
      <table border=1>
        <tr>
          <td>아이디</td>
          <td><input type="text" id="userid" name="userid"></td>
          <p><input type="button" id="check_button" value="ID 중복 검사" onclick="javascript:checkid();"></p>
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
  <script>
    function checkid(){
    //  let val = $("#fmt").val();
     // console.log(val);

      let formData = new FormData($("#fmt")[0]);


      $.ajax({
                url: "id_check.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                  let val = data.responseText;
                  console.log(val);             
                  if(data.responseText == "yes"){
                    alert("중복");
                  }else{
                    alert("통과");
                  }    
                   
  
                   
                },
                error: function (err) {
                    console.log(err);
                    return;
                }
            });
    }

    
  </script>

</html>


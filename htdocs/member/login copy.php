<?php
  include $_SERVER['DOCUMENT_ROOT']."/pdo.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      
    </style>
    <title></title>
  </head>
  <body>
    <h1>로 그 인</h1>
    <br>
    
    <form  method="post">
      <table border=1>
        <tr class = "cc" >        
          <td>아이디</td>
          <td><input type="text" id="id" name="id"></td>         
          <p><input type="button" id="check_button" value="ID 중복 검사" onclick="checkid();"></p>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td><input type="text" id="pass" name="pass"></td>
        </tr>
      
      </table>
      <br>
      <input type="submit" value="로그인">
      <input type="button" value="돌아가기" onclick="history.back(-1)">
      <button type="button" id="id_ck" name="id_ck" onclick="javascript:mod();" >중복확인</button>
    </form>

<form method="post" action="join_ok.php" autocomplete="off">
    <p>아이디: <input type="text" name="join_id" id="uid" required></p>
    <input type="hidden" name="decide_id" id="decide_id">
    <p><span id="decide" style='color:red;' >ID 중복 여부를 확인해주세요.</span>
    <input type="button" id="check_button" value="ID 중복 검사" onclick="check_id();"></p>
    <p>비밀번호: <input type="password" name="join_pw" required></p>
    <p><input type="submit" id="join_button" value="가입하기" disabled=true></p>
</form>

  </body>
</html>

<script>
  
 function mod() {
        /*if ($("#pass").val() === "") {
            alert("이름을 입력해주세요.");
            $("#pass").focus();
            return false;
        } */  
           // let form = "sss";
            
            let val = $("#id").val();
            console.log(val);
            /*
            $.ajax({
                url: "/id_ck.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    var json = JSON.parse(data);

                    //성공
                    alert(json.msg);
                    if (json.code == 200) {
                        location.reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
            */
        }
        function check_id()   {
           var uid = $("#chuid").val(); 
           let success = " 사용가능한 아이디입니다."; // 2 let error = " 아이디가 중복됩니다."; // 
           
           $.ajax({ 
            url: "../member/check_id", 
            type: "POST", 
            data:{"uid":uid },
            dataType:'json',
            success:function(data){ 
              if(data.responseText == "no"){
                document.getElementById("id").innerHTML = error; 
              } else{ document.getElementById("id").innerHTML = success; 
              } }, 
            });
           }


  function checkid(){
	var userid = document.getElementById("uid").value;
	if(userid)  //userid로 받음
	{
		url = "check.php?userid="+userid;
		window.open(url,"chkid","width=400,height=200");
	} else {
		alert("아이디를 입력하세요.");
	}
}        
</script>
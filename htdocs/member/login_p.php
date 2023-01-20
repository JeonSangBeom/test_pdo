<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 

  session_start();

  $id = $_POST['id'];
  $pass = md5($_POST['pass']);


  // 1. table에 있는 아이디와 패스워드가 맞는지 확인하는 sql문
  $login_sql = "select * from members where id = '$id' and pass = '$pass'";
  $login_stt=$pdo->prepare($login_sql);
  $login_stt->execute();
  //여기닷!!
  $login_row=$login_stt->rowCount();




  if(!$_POST['id'])
  {
    echo
    "<script>
      window.alert('아이디를 입력하세요.');
      history.back(-1);
    </script>";
  }
  else if(!$_POST['pass'])
  {
    echo
    "<script>
      window.alert('비밀번호를 입력하세요.');
      history.back(-1);
    </script>";
  }
  else
  {
    if(!$login_row)
    {
      echo
      "<script>
        window.alert('아이디 또는 비밀번호가 일치하지 않습니다.');
        history.back(-1);
      </script>";
    }
    else
    {
      $_SESSION['id']=$_POST['id'];
      $_SESSION['pass']=$pass;

      echo "<script>location.href='../';</script>";
    }
  }
?>
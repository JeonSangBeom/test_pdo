<?php

include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";


  $id = $_POST['id'];

  // 1. table에서 중복 된 아이디가 있는지 검사하는 sql문
  $check_sql = "select id from members where id='$id'";
  $check_stt = $pdo->prepare($check_sql);
  $check_stt->execute();
  $check_row=$check_stt->fetch();

  if(!$_POST['id'])
  {
    echo
    "<script>
      window.alert('아이디를 입력하세요.');
      history.back(-1);
    </script>";
  }
  // 여기닷! sql문을 사용한 곳!
  else if($check_row['id']==$_POST['id'])
  {
    echo
    "<script>
      window.alert('중복된 아이디가 존재합니다.');
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
  else if(!$_POST['name'])
  {
    echo
    "<script>
      window.alert('이름을 입력하세요.');
      history.back(-1);
    </script>";
  }
  else if(!$_POST['email'])
  {
    echo
    "<script>
      window.alert('이메일을 입력하세요.');
      history.back(-1);
    </script>";
  }
  else
  {
    $member_pass = md5($_POST['pass']);

    // 2. 회원가입에 필요한 정보를 모두 입력했는지 확인 한 후, 테이블에 해당 정보를 입력하는 sql문
    $member_sql = "insert into members(id, pass, name, email)";
    $member_sql .= "values(:id, :pass, :name, :email)";
    $member_stt=$dbo->prepare($member_sql);
    $member_stt->execute(
      array(
        ':id'=>$_POST['id'],
        ':pass'=>$member_pass,
        ':name'=>$_POST['name'],
        ':email'=>$_POST['email']
      )
    );

    echo
    "<script>
      window.alert('회원가입이 완료되었습니다!');
      location.href='list.php';
    </script>";
  }
?>


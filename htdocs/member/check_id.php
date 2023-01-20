<?php
    
    include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 
    
      session_start();
    
      $id = $_POST['id'];
    
    
      $check_sql = "select id from members where id='$id' ";
      $check_stt = $pdo->prepare($check_sql);
      $check_stt->execute();
      $check_row=$check_stt->fetch();
  

      //echo '<pre>';
      //print_r($_POST['id']);
      //echo '</pre>';       
    
    
   if($check_row['id']==$_POST['id'])
  {
    echo
    "<script>
      window.alert('중복된 아이디가 존재합니다.');
      history.back(-1);
    </script>";
    return "no";
  } 

?>
<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 

	$sql = "select * from members where id='{$_POST['userid']}'";
  $login_stt=$pdo->prepare($sql);  
  $login_stt->execute(); 
  $login_row=$login_stt->rowCount();


  if($login_row>0){
    echo "<script>alert('already email!!!');</script>"; 
    
  } 
  /*  echo '{"result":"1"}';
    } else {
        echo '{"result":"0"}';
    }
    */
 ?>
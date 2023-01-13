<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 


    // 1. 글을 수정하는 sql문
    $update_sql = "update bbs set content=:content where seq={$_GET['seq']}";
    $update_stt=$pdo->prepare($update_sql);
    $update_stt->execute(
      array(
        ':content'=>$_POST['content']
      )
    );

    echo
    "<script>
      window.alert('글을 정상적으로 수정하였습니다!');
      location.href='read.php?seq={$_GET['seq']}';
    </script>";
  
?>
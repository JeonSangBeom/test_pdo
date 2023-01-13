<?php
  include $_SERVER['DOCUMENT_ROOT']."/pdo.php";

  // 1. 리스트에서 클릭한 정보를 상세하게 불러오는 sql문
  $read_sql = "select * from bbs where seq = {$_GET['seq']}";
  $read_stt=$pdo->prepare($read_sql);
  $read_stt->execute();
  $read_row=$read_stt->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>
    <h1>내용 조회</h1>
    <table style="min-width: 800px; min-height: 300px; text-align: center; font-size: 25px;" border=1>
      <tr>
        <td>번호</td>
        <td><?=$read_row['seq']?></td>
      </tr>
      <tr>
        <td>제목</td>
        <td><?=$read_row['subject']?></td>
      </tr>
      <tr>
        <td>이름</td>
        <td><?=$read_row['name']?></td>
      </tr>
      <tr>
        <td>내용</td>
        <td><?=$read_row['content']?></td>
      </tr>
      <tr>
        <td>날짜</td>
        <td><?=$read_row['regdate']?></td>
      </tr>
      <tr>
        <td>조회수</td>
        <td><?=$read_row['hit']?></td>
      </tr>
    </table>
   <input type="button" style = "margin-top: 30px;"  value="수정하기" onClick="location.href='../update.php?seq=<?=$_GET['seq']?>'"> 
   <input type="button" style = "margin-top: 30px;"  value="돌아가기" onClick="location.href='../board.php'"> 
  
    <br>
   
<div >
    <form action="comment_insert.php?seq=<?=$_GET['seq']?>" method="post" style = "margin-top: 100px; ">
      <input type="hidden" name="seq" value="">
      <input type="text"  name="content" style=" min-width:500px; height:30px;"></input>
      <input type="submit" value="댓글쓰기" style= "height:30px" >
    </form>

    <table >
<?php
  // 2. 댓글들을 출력하는 sql문
  $comment_sql = "select * from comment where category = {$_GET['seq']} order by seq desc";
  $comment_stt=$pdo->prepare($comment_sql);
  $comment_stt->execute();

  // $_SESSION['id']를 존재 유무에 따른 정보 정리
  if(!isset($_SESSION['id']))
  {
    $id = 'guest';
  }
  else
  {
    $id=$_SESSION['id'];
  }

  /*
  // 3. 삭제와 수정의 권한을 주기 위한 sql문
  $level_sql = "select * from member where id = '$id'";
  $level_stt=$pdo->prepare($level_sql);
  $level_stt->execute();
  $level_row=$level_stt->fetch();

  if(!isset($level_row['level']))
  {
    $level_row['level']=2;
  }
*/

  while($comment_row=$comment_stt->fetch())
  {
    echo "
      <tr>
        <td>번호</td>
        <td>{$comment_row['seq']}</td> 
        <td>내용</td>
        <td>{$comment_row['content']}</td>
        <td>날짜</td>
        <td>{$comment_row['regdate']}<button style=margin-left:20;  onclick=location.href='../comment_update.php?seq={$comment_row['seq']}' >수정</button></td>        
      </tr>";
      
    
  }

  

?>
</table>
</div>
  </center>

 
  </body>
</html>

<?php
/*
    if(!isset($_SESSION['id']))
    {
      $now_id='guest';
    }
    else
    {
      $now_id=$_SESSION['id'];
    }



    // 2. 리스트 테이블에서 이전과 다음으로 넘어가기 위해 num를 순서대로 출력하는 sql문
    $back_sql = "select * from bestboard where num < {$_GET['num']} order by num desc";
    $back_stt=$dbo->prepare($back_sql);
    $back_stt->execute();
    $back_row=$back_stt->fetch();


    // 이전 버튼
    if(isset($back_row['num']))
    {
      echo "<a href='$_SERVER[PHP_SELF]?num={$back_row['num']}'>[◀ 이전]</a>"; // 변수를 괄호 안에 넣어야한다!
    }
    else
    {
      echo "[◀ 이전]";
    }

    $next_sql = "select * from bestboard where num > {$_GET['num']}";
    $next_stt=$dbo->prepare($next_sql);
    $next_stt->execute();
    $next_row=$next_stt->fetch();



    // 다음 버튼
    if(isset($next_row['num']))
    {
      echo "<a href='$_SERVER[PHP_SELF]?num={$next_row['num']}'>[다음 ▶]</a>";
    }
    else
    {
      echo "[다음 ▶]";
    }

    echo "<br><br>";



    // 3. 레벨을 검사하여 관리자인지 아닌지 확인한 후 수정과 삭제 출력 여부를 결정하는 sql문
    $level_sql = "select level from member where id = '$now_id'";
    $level_stt=$dbo->prepare($level_sql);
    $level_stt->execute();
    $level_row=$level_stt->fetch();

    // 로그인이 되어있지 않을 때는 level을 2로 지정
    if(!isset($level_row['level']))
    {
      $level_row['level']=2;
    }

    // 작성자와 로그인된 사용자가 같을 때, 또는 관리자일 때
    if($read_row['name']==$now_id || $level_row['level']==0)
    {
      echo "<a href='edit.php?num={$_GET['num']}'>수정하기</a>
      <a href='del.php?num={$_GET['num']}'>삭제하기</a>";
    }

      echo "<a href='list.php'>리스트가기</a>";

  ?>
    <br><br>

  <?php

    include "comment.php";　// 댓글 파일 include 한 것!



    // 4. 조회수를 늘리는 sql문
    $view_sql = "update bestboard set view=view+1 where num = {$_GET['num']}";
    $view_stt=$dbo->prepare($view_sql);
    $view_stt->execute();
  ?>
  */
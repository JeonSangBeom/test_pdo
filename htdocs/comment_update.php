<?php
   include $_SERVER['DOCUMENT_ROOT']."/pdo.php";

  $seq = $_GET['seq'];

  // 1. 수정을 위해서 전에 작성했던 글의 정보를 불러오는 sql문
  $edit_sql = "select * from comment where seq = '$seq'";
  $edit_stt=$pdo->prepare($edit_sql);
  $edit_stt->execute();
  $edit_row=$edit_stt->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <center>
        <h1>수 정 하 기</h1>
</head>

<body>
    <form action="comment_update_p.php?seq=<?=$_GET['seq']?>" method="post">
        <table>
            <tr>
                <td> 내용</td>
                <td><textarea name="content" rows="8" cols="80"><?=$edit_row['content']?></textarea></td>
            </tr>

        </table>
        <br>
        <input type="submit" value="수정하기">
        <input type="button" value="돌아가기" onclick="history.back(-1)">
        <input type="button" value="삭제하기" onClick="location.href='../delet_p.php?seq=<?=$_GET['seq']?>'"> s
    </form>
    </center>
</body>

</html>
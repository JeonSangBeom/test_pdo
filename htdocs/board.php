<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
    body{
        margin: 0 450px;
    }
    td{
        text-align: center;
    }
    .right{
        display: flex;
        justify-content: right;        
    }
</style>
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="100">제목</th>
                <th width="50">글쓴이</th>
                <th width="50">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
        //$db_host="localhost"; 
       // $db_user="root";
       // $db_password="1234";
       // $db_name="test_bbs";
       // $con=mysqli_connect($db_host, $db_user, $db_password, $db_name);
       

       
        
   
           // $sql = 'SELECT `joketext` FROM `joke`';
            //$result = $pdo->query($sql);         
         
          //  $stmt = $pdo -> prepare("SELECT * FROM bbs order by seq desc ");
            //$stmt -> bindValue(":seq", $bno);
           // $stmt -> execute();
      
         // $bbs = $stmt -> fetch(PDO::FETCH_ASSOC); 
        //  while($bbs = mysqli_fetch_array( $stmt)){
             // { 
                //title이 30을 넘어서면 ...표시
             //   $title=str_replace($bbs["subject"],mb_substr($bbs["subject"],0,30,"utf-8")."...",$bbs["subject"]);
             // }

             $result = "";
try {
    $statement = $pdo->query("select * from bbs");
    
    while($record = $statement->fetch(PDO::FETCH_ASSOC)){
        $result .= "<tr>";
        foreach($record as $column){
            $result .= "<td>" . $column . "</td>";
        }
        $result .= "</tr>";
    }
} catch(PDOException $e){
    $result = "#ERR:" . $e->getMessage();
}
$pdo = null;
?>
       
      <tbody>
        <!--<tr>
          <td width="70"><?php echo $record['seq']; ?></td>
          <td width="120"><a href="info.php?seq=<?php echo $record["seq"];?>"><?php echo $record['subject'];?><a></td>
          <td width="500"><?php echo $record['name'];?></td>
          <td width="100"><?php echo $record['regdate'];?></td>
          <td width="100"><?php echo $record['hit']; ?></td>
        </tr>
-->
<?php echo $result; ?>
      </tbody>
      <?php//}  ?>
    </table>
    <div  class="right">
        <button><a href="write.php">입력</a></button>       
    </div>
  </div>
</body>
</html>
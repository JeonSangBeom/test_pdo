<?php include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";?>

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
        <tbody>
        <?php
          /*
             $result = "";
              try {
                  $statement = $pdo->query("select * from bbs");
                  
                  while($record = $statement->fetchall(PDO::FETCH_ASSOC)){
                      $result .= "<tr>";
                      foreach($record as $column){
                        
                       $result .=
                       /*
                                  "<td>" . $result[$seq] . "</td>";
                                  "<td>" . $subject . "</td>";        
                                  "<td>" . $name . "</td>";        
                                  "<td>" . $regdate . "</td>";        
                                  "<td>" . $hit . "</td>";      
                                  
                       $result .= "<td>" . $column . "</td>";  
                      }
                      $result .= "</tr>";
                  }
              } catch(PDOException $e){
                  $result = "#ERR:" . $e->getMessage();
              }
              $pdo = null;
              */
              $group = "REDVELVET";


              $stmt = $pdo -> prepare("SELECT * FROM bbs");
              //$stmt -> bindValue(":group", $group);
              $stmt -> execute();
          
          
              //$result = $stmt -> fetchAll();

              $row = $stmt -> fetch(PDO::FETCH_ASSOC);

              
              echo "<pre>";
              print_r($row);
              echo "</pre>";

?>
       
      
        <?php
        <!--<tr>
          <td width="70"><?php echo $record['seq']; ?></td>
          <td width="120"><a href="info.php?seq=<?php echo $record["seq"];?>"><?php echo $record['subject'];?><a></td>
          <td width="500"><?php echo $record['name'];?></td>
          <td width="100"><?php echo $record['regdate'];?></td>
          <td width="100"><?php echo $record['hit']; ?></td>
        </tr>
--
         ?>
<?php echo $result; ?>


      </tbody>
    </table>
    <div  class="right">
        <button><a href="write.php">입력</a></button>       
    </div>
  </div>
</body>
</html>
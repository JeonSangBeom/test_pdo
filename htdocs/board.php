 <?php
 include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";

  // 페이징에 필요한 변수 11개
  // $_GET['page'], $list_size, $page_size, $first
  // $total_list, $total_page, $row
  // $start_page, $end_page, $back, $next
  if(!isset($_GET['page']))
  {
    $_GET['page']=1;
  }

  $list_size = 2;
  $page_size = 2;

  $first = ($_GET['page']*$list_size)-$list_size;




  // 1. 리스트에 출력하기 위한 sql문
  $list_sql = "select * from bbs ";
  $list_stt=$pdo->prepare($list_sql);
  $list_stt->execute();
?>

  <center>
  <h1>게 시 판</h1>
  <form action="search.php" method="get">
    <select name="select">
      <option value="all">전체</option>
      <option value="title">제목</option>
      <option value="name">작성자</option>
      <option value="content">내용</option>
      <option value="title_content">제목+내용</option>
    </select>
    <input type="text" name="search">
    <input type="submit" value="검색">
  </form>

  <table  style =" min-width:800; text-align:center;  margin-top:15px; margin-bottom:15px" border=1 >
    <tr>
      <td>번호</td>
      <td>제목</td>
      <td>작성자</td>
      <td>날짜</td>
      <td>내용</td>
    </tr>

<?php
  while($list_row=$list_stt->fetch())
  {
?>
    <tr>
      <td><a href='update.php?seq=<?=$list_row['seq']?>'><?=$list_row['seq']?></a></td>
      <td><a href='update.php?seq=<?=$list_row['seq']?>'><?=$list_row['subject']?></a></td>
      <td><?=$list_row['name']?></td>
      <td><?=$list_row['regdate']?></td>
      <td><?=$list_row['content']?></td>
    </tr>
   
<?php
  }
  
  echo "</table>";
  ?>
  <div  class="right" style = " display:flex; justify-content: center;">
        <button style = " min-width:100; height: 50px;"><a href="write.php">입력</a></button>       
  </div>
  
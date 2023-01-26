<?php 
  include $_SERVER['DOCUMENT_ROOT']."/pdo.php";


  if(!isset($_GET['page']))
  {
    $_GET['page']=1;
  }

  $search_type       = $_GET['search_type'];
  $search_text       = $_GET['search_text'];

  if(isset($_GET['search_type']) && isset($_GET['search_text'])){
    $search_type       = $_GET['search_type'];
    $search_text       = $_GET['search_text'];
  }else{
    $search_type       = '';
    $search_text       = '';
  }


  $arrValue  = array();
  $list_size = 5;
  $page_size = 5;
  $where ='';

  $first = ($_GET['page']*$list_size)-$list_size; //공식 뿌릴 갯수 사이즈와 


  //검색
  //$category = $_GET['category'];
  //$search_text = $_GET['search'];


  

  // 1. 리스트에 출력하기 위한 sql문
  $list_sql = "select * from bbs where $search_type like '%$search_text%'
  order by seq desc limit $first, $list_size";
  //$first 부터 $list_size 갯수만큼
  $list_stt=$pdo->prepare($list_sql);
  $list_stt->execute();




  //세션 실행
  session_start();
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 
<!-- 18.10.11 검색 추가 -->
<?php
 
  /* 검색 변수 */
  $search_type = $_GET['search_type'];
  $search_text = $_GET['search_text'];
?>
 <center>
  <h1>게 시 판</h1>
  <form method="get" action="/search.php">
    <select name="search_type">
      <option value="all" <?php echo ($search_type == 'all') ? 'selected="selected"' : '';?>>전체</option>
      <option value="subject" <?php echo ($search_type == 'subject') ? 'selected="selected"' : '';?>>제목</option>
      <option value="name" <?php echo ($search_type == 'name') ? 'selected="selected"' : '';?>>이름</option>      
    </select>
    <input type="text" name="search_text">
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
      <td><?=$list_row['seq']?></a></td>
      <td><a href='read.php?seq=<?=$list_row['seq']?>'><?=$list_row['subject']?></a></td>
      <td><?=$list_row['name']?></td>
      <td><?=$list_row['regdate']?></td>
      <td><?=$list_row['content']?></td>
    </tr>
   
<?php
  }
  
  echo "</table>";
   // 2. 총 페이지를 구하기 위한 sql문
   $total_sql = "select count(*) from bbs where $search_type like '%$search_text%' 
                  order by seq desc limit $first, $list_size";
   $total_stt=$pdo->prepare($total_sql);
   $total_stt->execute();
   $total_row=$total_stt->fetch();
 
   $total_list = $total_row['count(*)'];
   $total_page = ceil($total_list/$list_size);
   $row = ceil($_GET['page']/$page_size);
 
   $start_page=(($row-1)*$page_size)+1;
   
   if($start_page<=0)
   {
     $start_page = 1;
   }
 
   $end_page=($start_page+$page_size)-1;
 
   if($total_page<$end_page)
   {
     $end_page=$total_page;
   }
 
   if($_GET['page']!=1) // 페이징 버튼은 $_GET['page'] 기준으로!
   {
     $back=$_GET['page']-$page_size;
 
     if($back<=0) // echo로 버튼을 찍기 전에 꼭 제한사항을 둘 것!
     {
       $back=1;
     }
 
     echo "<a href='$_SERVER[PHP_SELF]?page=$back'>◀</a>";
 
   }
 
   for($i=$start_page; $i<=$end_page; $i++)
   {
     if($_GET['page']!=$i) // !==가 아니라 !=이다!
     {
       echo "<a href='$_SERVER[PHP_SELF]?page=$i'>";
     }
 
     echo " [$i] ";
 
     if($_GET['page']!=$i)
     {
       echo "</a>";
     }
   }
 
   if($_GET['page']!=$total_page)
   {
     $next=$_GET['page']+$page_size;
 
     if($total_page<$next)
     {
       $next=$total_page;
     }
 
     echo "<a href='$_SERVER[PHP_SELF]?page=$next'>▶</a>";
   }
  ?>
 <?php
    if(isset($_SESSION['id']))
            {
            ?>
            <div  class="right" style = " display:flex; justify-content: center; margin-top:20px">
              <button style = " min-width:100; height: 50px;"><a href="write.php">입력</a></button>       
            </div>
            <?php
            }            
            
            ?>


<script>

</script>
 <?php
 include  $_SERVER['DOCUMENT_ROOT']."/pdo.php";

  // 페이징에 필요한 변수 11개
  // $_GET['page'](가져올 페이지/뿌려질), $list_size(화면에 뿌려질 리스트), $page_size(페이지 갯수), $first
  // $total_list(총 게실글 수), $total_page(총 페이지 수), $row(현재 자신이 위치한 블럭의 수)
  // $start_page(현재 블록에서 가장 첫 번째 페이지), $end_page(현재 블록에서 마지막 페이지), $back, $next (다음 페이지나 이전 페이지 이동시 사용)
  if(!isset($_GET['page']))
  {
    $_GET['page']=1;
  }
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


  if (!empty($search_type) && !empty($search_text)) {
    if ($search_type == 'all') {
        //제목 + 내용
        $where = "
            AND
                (
                    title LIKE :search_text OR
                    name LIKE :search_text
                )
        ";
    } else {
        $where = " AND {$search_type} LIKE :search_text";
    }
    $arrValue[':search_text'] = "%{$search_text}%";
}

  // 1. 리스트에 출력하기 위한 sql문
  $list_sql = "select * from bbs
  order by seq desc limit $first, $list_size";
  //$first 부터 $list_size 갯수만큼
  $list_stt=$pdo->prepare($list_sql);
  $list_stt->execute();




  //세션 실행
  session_start();

//echo "userName 값: ".$_SESSION['id']."<br/>"; 
//echo "userPw 값: ".$_SESSION['pass']; 
?>

  <center>
  <h1>게 시 판</h1>
  <form method="get" action="/search.php">
    <select name="search_type">
      <option value="all" <?php echo ($search_type == 'all') ? 'selected="selected"' : '';?> >전체</option>
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
   $total_sql = "select count(*) from bbs ";
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
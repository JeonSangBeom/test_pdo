<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>회원정보 수정</h1>
    <?php
		$bno = $_GET['seq']; /* bno함수에 idx값을 받아와 넣음*/
		
		$stmt = $pdo -> prepare("SELECT * FROM bbs WHERE seq = :seq");
    	$stmt -> bindValue(":seq", $bno);
    	$stmt -> execute();

		$row = $stmt -> fetch(PDO::FETCH_ASSOC); 

	?>
<!-- 글 불러오기 -->
<div>
	<h2><?php echo $row['subject']; ?></h2>
		<div id="user_info">
		이름: <?php echo $row['name']; ?> </br> 조회:<?php echo $row['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div>
				<h4>내용</h3>
			<?php echo $row['content']; ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div>
		<ul>
			<li><a href="board.php">[목록으로]</a></li>
			<li><a href="update.php?seq=<?php echo $row['seq']; ?>">[수정]</a></li>
			<li><a href="delet.php?seq=<?php echo $row['seq']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>
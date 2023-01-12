<?php

    namespace sb;

    use PDO;
    use PDOException;

    $dbHost = "127.0.0.1";    // 호스트 주소(localhost, 120.0.0.1)
    $dbName = "test_bbs";      // 데이타 베이스(DataBase) 이름
    $dbUser = "root";         // DB 아이디
    $dbPass = "1234";         // DB 패스워드
    $dbChar = "utf8";         // 문자 인코딩
    try
    {
    // PDO 객체 생성 & DB 접속
    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName};charset={$dbChar}", $dbUser, $dbPass);
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "서버와의 연결 성공!";
}
catch(PDOException $ex)
{
    echo "서버와의 연결 실패! : ".$ex->getMessage()."<br>";
}
/*
    // 쿼리를 담은 PDOStatement 객체 생성
    $stmt = $pdo->prepare("SELECT * FROM bbs ");
 
    // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
    //$stmt->bindValue(":name", "나연");
 
    // PDOStatement 객체가 가진 쿼리를 실행
    $stmt->execute();
 
    // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
    $row = $stmt->fetch();
    
    

    echo "<pre>";
    print_r($row);
    echo "</pre>";
  */  
?>



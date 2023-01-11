<?php include  $_SERVER['DOCUMENT_ROOT']."/index.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
    <title>게시판</title>
</head>
<body>
<?php 
	$bno = $_GET['seq'];
	$query = "SELECT * FROM bbs WHERE seq=$bno";
        //$sql = query("SELECT * FROM bbs WHERE seq=$bno"); 
    $res = mysqli_query($con, $query);
    $board = mysqli_fetch_array($res);
?>
<form method="post" action="update_p.php">
        <!-- method : POST!!! (GET X) -->
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
						<input type="hidden" name="bno" value=<?php echo $board['seq'];?>>
                        <tr>
                            <td>작성자</td>
                            <td><input type="text" name="name" size=30 value="<?php echo $board['name'];?>"></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="subject" size=70 value="<?php echo $board['subject'];?>"> </td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15 ></textarea></td>
                        </tr>

                        <tr>
                            <td>비밀번호</td>
                            <td><input type="password" name="pw" size=15 maxlength=15></td>
                        </tr>                       
                    </table>
                    
                    <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="수정">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
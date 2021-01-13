<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../layout/header.php'?>
</head>
<body>
    <?php 
        $board_title = $_POST["title"];
        $board_writer = $_POST["writer"];
        $board_contents = $_POST["contents"];
        
        $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
        mysqli_select_db($s,"test_db");

        $no_max = mysqli_query($s, "SELECT max(no)+1 as max_no FROM tb_board");
        $re = mysqli_fetch_array($no_max);
        $max_no = $re["max_no"];

        $sql = "INSERT INTO tb_board (no, title, contents, hits, writer, write_date) 
                VALUES('".$max_no."','".$board_title."','".$board_contents."',0 ,'".$board_writer."', now())";
        $result = mysqli_query($s, $sql);
        
        header("Location:boardList.php");
    ?>
</body>
</html>
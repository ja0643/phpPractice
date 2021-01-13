<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../layout/header.php'?>
</head>
<body>
    <?php 
        $board_no = $_POST["no"];
        $board_title = $_POST["title"];
        $board_writer = $_POST["writer"];
        $board_contents = $_POST["contents"];
        
        $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
        mysqli_select_db($s,"test_db");

        $sql = "UPDATE tb_board SET title='".$board_title."', contents='".$board_contents."', editor='".$board_writer."', edit_date=now() WHERE no='".$board_no."'";
                
        $result = mysqli_query($s, $sql);
        
        header("Location:boardList.php");
    ?>
</body>
</html>
<?php include '../layout/header.php'?>
<?php 
    $board_no = $_POST["no"];
    $board_title = $_POST["title"];
    $board_writer = $_POST["writer"];
    $board_contents = $_POST["contents"];
    
    $sql = "UPDATE tb_board SET title='".$board_title."', contents='".$board_contents."', editor='".$board_writer."', edit_date=now() WHERE no='".$board_no."'";
            
    $result = mysqli_query($s, $sql);
    
    header("Location:boardList.php");
?>

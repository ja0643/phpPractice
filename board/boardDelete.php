<?php include '../layout/header.php'?>
<?php 
    $board_no = $_POST["no"];
    
    $sql = "DELETE FROM tb_board WHERE no='".$board_no."'";
                
    $result = mysqli_query($s, $sql);
    
    header("Location:boardList.php");
?>

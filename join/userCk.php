
<?php
    $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
    mysqli_select_db($s,"test_db");

    $id = $_POST['id'];
    $sql = "SELECT count(*) FROM tb_user WHERE user_id='".$id."'";
    $result = mysqli_query($s, $sql);
    $rows = mysqli_num_rows($result);

    if($rows > 0){
        $data = mysqli_fetch_array($result);
    }
    
    if($data[0] == 0){
        echo json_encode(array('res'=>'success'));
        //echo "사용가능한 ID입니다.";
    }
    else{
        echo json_encode(array('res'=>'fail'));
        //echo "사용중인 ID입니다.";
    }
?>

<?php include '../layout/header.php'?>
<?php
    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_user where user_id='".$id."'";
    $result = mysqli_query($s, $sql);

    $conn = mysqli_fetch_array($result);

    $hashed_pw = $conn['password'];

    //비밀번호 검증 password_verify(로그인에서 입력한 비밀번호, db에 있는 비밀번호)
    $passwordResult = password_verify($password, $hashed_pw);

    //로그인 성공
    if($passwordResult == true){
        //세션에 id저장
        session_start();

        $_SESSION['user_id'] = $conn['user_id'];
        $_SESSION['user_name'] = $conn['user_name'];
        print_r($_SESSION);
       
?>

    <script>
        alert("로그인에 성공하였습니다.");
        location.href='../index.php';
    </script>

<?php
//로그인 실패
}else{
?>
    <script>
        alert("로그인에 실패하였습니다.");
        location.href='login.php';
    </script>
<?php  
}
?>
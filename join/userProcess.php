<?php include '../layout/header.php'?>
<?php
    $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
    mysqli_select_db($s,"test_db");

    $name = $_POST['name'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    //비밀번호를 암호화 시킴 password_hash($password,PASSWORD_DEFAULT)
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $phone3 = $_POST['phone3'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];

    $phone = $phone1.'-'.$phone2.'-'.$phone3;
    $email = $email1.'@'.$email2;

    $max_no_sql = "SELECT max(user_no)+1 as user_no from tb_user";
    $max_no = mysqli_query($s, $max_no_sql);
    $re = mysqli_fetch_array($max_no);
    $no = $re['user_no'];
    echo "no : ".$no;

    $sql = "INSERT INTO tb_user (user_no, user_id, password, user_name, phone, email, reg_date)
                VALUES('".$no."', '".$id."','".$hashedPassword."','".$name."','".$phone."','".$email."', now())";

    $result = mysqli_query($s, $sql);

    if($result == false){
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요";
        echo mysqli_error($conn);
    }else{
        ?>
    <script>
        alert("회원가입이 완료되었습니다.");
        location.href="../index.php"

    </script>

<?php
    }
?>

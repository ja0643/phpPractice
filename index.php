<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <?php
    session_start();
    ?>
    <script>
    function logOut(){
        if(confirm("로그아웃하시겠습니까?")){
            location.href="login/logOutProcess.php";
        }
    }

    </script>
    <style>
        body{overflow: hidden;}
        a{color: #000;}
        .btn_wrap{width: 100%; height: 100vh; position: relative;}
        .btn_wrap div{position:absolute; top:50%; left:50%; transform: translate(-50%, -50%); text-align: center;}
        .btn_wrap a{display: inline-block; width: 200px; height: 200px; text-align: center; vertical-align: middle; background-color: #CFCFCF; line-height: 200px; font-size: 20px;}
        .btn_wrap a:hover{background-color: #126DCB; border: none; color: #fff; font-weight: 700;}
    </style>
</head>
<body>
    <div class="btn_wrap">
        <div>   

        <?php 
            if(isset($_SESSION['user_id'])){
                echo "<h4>".$_SESSION['user_name']."님 환영합니다.</h4>";
                echo "<a href='javascript:logOut();'>로그아웃</a>";
            }else{
                echo "<h4>로그인을 해주세요</h4>";
                echo "<a href='join/userRegist.php'>회원가입</a> ";
                echo "<a href='login/login.php'>로그인</a>";
            }
        ?>
            <a href="board/boardList.php">게시판</a>
        </div>
    </div>
</body>
</html>


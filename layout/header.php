<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/common.css">
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    
    <style>
        img{margin: 20px 0 0 20px;}
    </style>
    <?php
    $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
    mysqli_select_db($s,"test_db");
    
    session_start();
    ?>
</head>
<body>
    <a href="/study/index.php"><img src="../img/icon/house.png" alt=""></a>
</body>
</html>

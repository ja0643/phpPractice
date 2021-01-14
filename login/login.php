<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <?php include '../layout/header.php'?>
    <style>
        h2{text-align: center;}
        .wrap{width: 400px; background-color: #eee; padding: 40px 20px 50px;}
        table{width: 80%; margin: 10px auto;}
        table input{width: 170px;}
        .btn_wrap{text-align: center; float: none;}
        a.btn{padding: 10px 58px;}
    </style>
    <script>
        function login(){

            if($("#id").val() == ''){
                alert("아이디를 입력해주세요.");
                $("#id").focus();
                return;
            }

            if($("#password").val() == ''){
                alert("비밀번호를 입력해주세요.");
                $("#password").focus();
                return;
            }

            var form = document.flogin;
            form.submit();
        }
    
    </script>
</head>
<body>
    <div class="wrap">
        <h2>로그인</h2>
        <form action="loginProcess.php" method="post" name="flogin">
            <table>
                <caption>로그인</caption>
                <colgroup>
                    <col width="30%">
                    <col width="*">
                </colgroup>

                <tbody>
                    <tr>
                        <th><label for="id">아이디</label></th>
                        <td><input type="text" id="id" name="id"></td>
                    </tr>
                    <tr>
                        <th><label for="password">비밀번호</label></th>
                        <td><input type="password" id="password" name="password"></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn_wrap">
                <a href="javascript:login();" class="btn save">로그인</a>
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 입력</title>
    <?php include '../layout/header.php'?>
    <style>
        
        h2{text-align: center;}
        table > tbody th, table > tbody td{padding: 4px 0;}
        table > tbody th {text-align: left;}
       
    </style>
    <script>

        function userRegist(){
            
            var id = $("#id");
            var name = $("#name");
            var password = $("#password");
            var passwordCk = $("#passwordCk");
            var phone1 = $("#phone1");
            var phone2 = $("#phone1");
            var phone3 = $("#phone1");
            var email1 = $("#email1");
            var email2 = $("#email2");
            
            if(name.val() == ''){
                alert("이름을 입력해주세요.");
                name.focus();
                return;
            }
            if(id.val() == ''){
                alert("아이디를 입력해주세요.");
                id.focus();
                return;
            }
            if(password.val() != passwordCk.val()){
                alert("비밀번호를 확인해주세요.");
                password.val('');
                passwordCk.val('');
                password.focus();
                return;
            }
            if(phone1.val() == '' || phone2.val() == '' || phone3.val() == ''){
                alert("휴대폰번호를 입력해주세요.");
                phone2.focus();
                return;
            }
            if(email1.val() == '' || email2.val() == ''){
                alert("이메일을 입력해주세요.");
                email1.focus();
                return;
            }

            var form = document.fuser;
            if(confirm("가입하시겠습니까?")){
                form.submit();
            }
        }

    </script>
</head>
<body>
    
    <div class="wrap">
        <h2>회원가입 정보입력</h2>
        <form action="userProcess.php" method="post" name="fuser">
            <table>
                <caption>회원 정보입력</caption>
                <colgroup>
                    <col width="20%">
                    <col width="*">
                </colgroup>

                <tbody>
                    <tr>
                        <th><label for="name">이름</label></th>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <th><label for="id">아이디</label></th>
                        <td><input type="text" id="id" name="id"></td>
                    </tr>
                    <tr>
                        <th><label for="password">비밀번호</label></th>
                        <td><input type="password" id="password" name="password"></td>
                    </tr>
                    <tr>
                        <th><label for="passwordCk">비밀번호 확인</label></th>
                        <td><input type="password" id="passwordCk" name="passwordCk" placeholder="비밀번호를 다시한번 입력해주세요"></td>
                    </tr>
                    <tr>
                        <th>휴대폰번호</th>
                        <td>
                            <label for="phone1" class="hidden">휴대폰번호 첫번째자리</label>
                            <select name="phone1" id="phone1">
                                <option value="">선택</option>
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="012">012</option>
                            </select> - 
                            <label for="phone2" class="hidden">휴대폰번호 두번째자리</label>
                            <input type="text" id="phone2" name="phone2"> - 
                            <input type="text" id="phone3" name="phone3">
                            <label for="phone3" class="hidden">휴대폰번호 세번째자리</label>
                        </td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td>
                            <label for="email"></label>
                            <label for="email1" class="hidden">이메일 앞자리</label>
                            <input type="text" id="email1" name="email1"> @
                            <input type="text" id="email2" name="email2">
                            <label for="email2" class="hidden">이메일 앞자리</label>
                        </td>
                    </tr>
                </tbody>
            </table> 

            <a href="javascript:userRegist();" class="btn save">회원가입</a>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 등록</title>
    <?php include '../layout/header.php'?>
    <script>
           
        function boardInsert(){
            
            if($("#title").val() == ''){
                alert("제목을 입력하세요");
                return;
            }
            if($("#writer").val() == ''){
                alert("작성자를 입력하세요");
                return;
            }
            if($("#contents").val() == ''){
                alert("내용을 입력하세요");
                return;
            }

            if(confirm("저장하시겠습니까?")){
                var form = document.frm1;
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="wrap">
        <form action="boardInsert.php" method="post" name="frm1">
            <table class="write">
                <colgroup>
                    <col width="30%">
                    <col width="*">
                </colgroup>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td><input type="text" name="title" id="title"></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td>
                            <?php
                                if(isset($_SESSION['user_id'])){
                                    echo "<input type='text' name='writer' id='writer' value='".$_SESSION['user_name']."' readonly>";
                                }else{
                                    echo "<input type='text' name='writer' id='writer'>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><textarea name="contents" id="contents" cols="30" rows="10"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <a href="javascript:boardInsert()" class="btn save">저장</a>
            <a href="boardList.php" class="btn list">목록</a>
        </form>
    </div>
</body>
</html>
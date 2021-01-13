<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 수정</title>
    <?php include '../layout/header.php'?>

    <script>
        function boardUpdate(){
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
<?php
    $s = mysqli_connect("127.0.0.1", "root", "qawsedrf12#$") or die("실패입니다.");
    mysqli_select_db($s,"test_db");
    
    $no = $_POST["no"];
    $result = mysqli_query($s, "SELECT no, category, title, contents, writer, hits, write_date FROM tb_board WHERE no='".$no."'");

    $con = mysqli_fetch_array($result);

?>
    <div class="wrap">
        <form action="boardUpdate.php" method="post" name="frm1">
        <input type="hidden" name="no" id="no" value="<?php echo $con['no'] ?>">
            <table class="write">
                <colgroup>
                    <col width="30%">
                    <col width="*">
                </colgroup>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td><input type="text" name="title" value="<?php echo $con['title'] ?>"></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><input type="text" name="writer" id="writer" value="<?php echo $con['writer'] ?>"></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><textarea name="contents" id="contents" cols="30" rows="10"><?php echo $con['contents'] ?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <a href="javascript:boardUpdate();" class="btn save">수정</a>
            <a href="boardList.php" class="btn list">목록</a>
        </form>
    </div>
</body>
</html>
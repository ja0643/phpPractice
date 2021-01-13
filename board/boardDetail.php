<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 상세</title>
    <?php include '../layout/header.php'?>
    
    <script>
        function boardModify(){
            var form = document.frm1;
            form.submit();
        }

        function boardDelete(){
            if(confirm("삭제하시겠습니까?")){
                var form = document.frm1;
                form.action="boardDelete.php";
                form.submit();
            }
        }
    </script>
</head>
<body>
<?php
    
    $no = $_GET["no"];
    $result = mysqli_query($s, "SELECT no, category, title, contents, writer, hits, write_date FROM tb_board WHERE no='".$no."'");

    $con = mysqli_fetch_array($result);

    //조회수 증가
    $plus = $con['hits'] + 1;
    $add_hit = mysqli_query($s, "UPDATE tb_board SET hits='".$plus."' WHERE no='".$no."'");

?>
    <div class="wrap">
        <form action="boardModify.php" method="post" name="frm1"> 
        <input type="hidden" name="no" id="no" value="<?php echo $con['no'] ?>">
            <table class="view">
                <colgroup>
                    <col width="30%">
                    <col width="*">
                </colgroup>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td><?php echo $con['title'] ?></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><?php echo $con['writer'] ?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?php echo $con['contents'] ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn_wrap">
                <?php 
                    if(isset($_SESSION['user_id'])){
                        if($_SESSION['user_name'] == $con['writer']){
                            echo "<a href='javascript:boardModify();' class='btn save'>수정</a> ";
                            echo "<a href='javascript:boardDelete();' class='btn del'>삭제</a>";
                        }
                    }
                ?>
                <a href="boardList.php" class="btn list">목록</a>
            </div>
        </form>
    </div>
</body>
</html>
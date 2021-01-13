<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 목록</title>
    <?php include '../layout/header.php'?>

    <style>
               
        .paging{padding: 20px 0 10px; text-align: center;}
        .paging a{border: 1px solid #e9e9e9;  text-align: center; width: 24px; height:26px; margin: 0 2px; padding-top: 3px; vertical-align: middle; display: inline-block;}
        .paging a.on, .paging a:hover{background-color: #126DCB; color: #fff; }
    </style>
</head>
<body>
<?php
    //페이징
    $current_page = 1;
    if (isset($_GET["current_page"])) {
        $current_page = $_GET["current_page"];
    }

    $list_count = mysqli_query($s, "SELECT count(*) as cnt FROM tb_board");
    if($row_count = mysqli_fetch_array($list_count)){
        $total_row_num = $row_count["cnt"];
    }

    $rowPerPage = 5;   //페이지당 보여줄 게시물 행의 수
    $block = 10;   //페이지당 보여줄 페이징 개수
    $begin = 0; 
    
    $now_block = ceil($current_page / $block);  //현재 리스트의 블럭 (1-10까지가 1블럭)

    $begin = ($current_page-1) * $rowPerPage;   

    $page_num = ceil($total_row_num / $rowPerPage); //총 페이지

    //총 블록(전체 데이터 행수 / 페이지당 보여줄 페이징 수) 블록이 10개 이므로 block_num이 1이면 페이징 개수는 10개
    $block_num = ceil($page_num / $block); 
    
    $current_block = 1; //현재 블럭

    $start_page = ($current_block - 1) * $block + 1;    //시작 페이지 

    $end_page = $start_page + $block - 1;   //마지막 페이지

    $total_page = ceil($total_row_num / $rowPerPage);

    if($end_page > $total_page){
        $end_page = $total_page;
    }

    $total_block = ceil($total_page / $rowPerPage);
    $limit = ($current_page-1)*$rowPerPage;
    
    $sql1 = "SET @row_num=0;";
    $page_sql = "SELECT (@row_num:=@row_num+1) AS rownum, no, category, title, contents, hits, writer, date_format(write_date,'%Y-%m-%d') as write_date FROM tb_board ORDER BY rownum DESC LIMIT ".$limit.",".$rowPerPage."";
    
    mysqli_query($s, $sql1);
    $result = mysqli_query($s, $page_sql);


?>
<div class="wrap">
    <p>총 게시글 수 : <?php echo $total_row_num; ?></p>
    <table class="list">
        <colgroup>
            <col width="7%">
            <col width="*">
            <col width="14%">
            <col width="16%">
            <col width="10%">
        </colgroup>

        <thead>
            <tr>
                <th>NO</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
                <th>조회수</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td class="first tac">
                    <?php 
                        echo $row["rownum"]; 
                    ?>
                </td>
                <td>
                    <a href="boardDetail.php?no=<?php echo $row["no"];  ?>">
                        <?php 
                            echo $row["title"]; 
                        ?>
                    </a>
                </td>
                <td class="tac">
                    <?php 
                        echo $row["writer"]; 
                    ?>
                </td>
                <td class="tac">
                    <?php 
                        echo $row["write_date"]; 
                    ?>
                </td>
                <td class="last tac">
                    <?php 
                        echo $row["hits"]; 
                    ?>
                </td>
            </tr>
        <?php 
            }
        ?>
        </tbody>
    </table>
    <div class="paging">
            <?php
                if($current_page > 1){
                    echo "<a href='boardList.php?current_page=".($current_page-1)."'><</a>";
                }
        
                for($i = $start_page; $i <= $end_page; $i++){
                    
                    if($current_page == $i){
                        echo "<a href='#' class='on'>".$i."</a>";
                    }else{
                        echo "<a href='boardList.php?current_page=".$i."'>".$i."</a>";
                    }
                }
        
                if($current_page < $end_page){
                    echo "<a href='boardList.php?current_page=".($current_page+1)."'>></a>";
                }

            ?>
           
    </div>
    <div class="btn_wrap">
        <?php
        if(isset($_SESSION['user_id'])){
            echo "<a href='boardWrite.php' class='btn save'>글쓰기</a>";
        }     
        ?>
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="message_box">
	    <h3 class="title">
<?php
	$mode = $_GET["mode"]; // GET 방식으로 데이터 전달받기
	$num  = $_GET["num"];

	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from message where num=$num"; // 레코드 가져오기
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$send_id    = $row["send_id"];
	$rv_id      = $row["rv_id"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];

	$content = str_replace(" ", "&nbsp;", $content); // 쪽지 내용의 공백과 줄 바꿈 처리
	$content = str_replace("\n", "<br>", $content);

	if ($mode=="send") // 수신자 이름 가져오기
		$result2 = mysqli_query($con, "select name from members where id='$rv_id'");
	else
		$result2 = mysqli_query($con, "select name from members where id='$send_id'");

	$record = mysqli_fetch_array($result2);
	$msg_name = $record["name"];

	if ($mode=="send") //페이지 제목 출력  	
	    echo "송신 쪽지함 > 내용보기";
	else
		echo "수신 쪽지함 > 내용보기";
?>
		</h3>
	    <ul id="view_content">
			<li>
                            <span class="col1"><b>제목 :</b> <?=$subject?></span> <!-- 쪽지 제목 출력 -->
				<span class="col2"><?=$msg_name?> | <?=$regist_day?></span> <!-- 이름과 보낸 일시 출력 -->
			</li>
			<li>
				<?=$content?> <!-- 쪽지 내용 출력 -->
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li> <!-- 하단 버튼 클릭 -->
				<li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
				<li><button onclick="location.href='message_response_form.php?num=<?=$num?>'">답변 쪽지</button></li>
				<li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
		</ul>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>

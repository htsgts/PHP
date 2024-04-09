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
	    <h3>
<?php
 		if (isset($_GET["page"])) //GET 방식으로 페이지 번호 전달받기
			$page = $_GET["page"];
		else
			$page = 1;

		$mode = $_GET["mode"]; // GET 방식으로 모드 전달받기

		if ($mode=="send")
			echo "송신 쪽지함 > 목록보기";
		else
			echo "수신 쪽지함 > 목록보기";
?>
		</h3>
	    <div>
	    	<ul id="message">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">
<?php						
						if ($mode=="send")
							echo "받은이";
						else
							echo "보낸이";
?>
					</span>
					<span class="col4">등록일</span>
				</li>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sample");

	if ($mode=="send") // DB에서 송신 또는 수신 쪽지 가져오기
		$sql = "select * from message where send_id='$userid' order by num desc";
	else
		$sql = "select * from message where rv_id='$userid' order by num desc";

	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 10; // 한페이지에 표시되는 행의 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      // 화면에 표시할 시작 레코드 설정
	$number = $total_record - $start;  // 쪽지 번호의 초깃값 설정
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) // 반복 루프 설정
   {
      mysqli_data_seek($result, $i);  // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result); // 하나의 레코드 가져오기
	  $num    = $row["num"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];

	  if ($mode=="send") // 보낸이/받는이의 아이디와 이름 가져오기
	  	$msg_id = $row["rv_id"];
	  else
	  	$msg_id = $row["send_id"];
	  
	  $result2 = mysqli_query($con, "select name from members where id='$msg_id'");
	  $record = mysqli_fetch_array($result2);
	  $msg_name     = $record["name"];	  
?>
				<li>
                                    <span class="col1"><?=$number?></span> <!--쪽지 목록의 항목 출력  -->
					<span class="col2"><a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>"><?=$subject?></a></span>
					<span class="col3"><?=$msg_name?>(<?=$msg_id?>)</span>
					<span class="col4"><?=$regist_day?></span>
				</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	// 페이지 번호 표시
	{
		$new_page = $page-1;
		echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li> <a href='message_box.php?mode=$mode&page=$i'> $i </a> <li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
                            <li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li> <!-- 버튼 삽입 -->
				<li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
				<li><button onclick="location.href='message_form.php'">쪽지 보내기</button></li>
			</ul>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
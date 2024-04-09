<meta charset='utf-8'>
<?php
    $send_id = $_GET["send_id"]; // 
    $rv_id = $_POST['rv_id'];
    $subject = $_POST['subject'];
    $content = $_POST['content']; // 쪽지 보내기 페이지에서 사용자가 입력한 데이터를 GET과 POST방식으로 전달받음
	$subject = htmlspecialchars($subject, ENT_QUOTES); //쪽지의 제목에 특수 문자가 있다면 html 특수기호로 변환
	$content = htmlspecialchars($content, ENT_QUOTES); //쪽지의 내용에 특수 문자가 있다면 html 특수기호로 변환
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	if(!$send_id) { // 송신 아이디가 설정되지 않은 경우
		echo("
			<script>
			alert('로그인 후 이용해 주세요! '); 
			history.go(-1)
			</script>
			");
		exit;
	}

	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // 수신 아이디의 유효 여부 검사
	$sql = "select * from members where id='$rv_id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);

	if($num_record) //수신 아이디가 유효한 경우
	{
		$sql = "insert into message (send_id, rv_id, subject, content,  regist_day) ";
		$sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	} else { //수신 아이디가 유효하지 않은 경우
		echo("
			<script>
			alert('수신 아이디가 잘못 되었습니다!');
			history.go(-1)
			</script>
			");
		exit;
	}

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'message_box.php?mode=send'; 
	   </script>
	";
        //송신 쪽지함으로 이동
?>

  

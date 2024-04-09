<meta charset='utf-8'>

<?php
	$num = $_GET["num"]; // GET 방식으로 데이터 전달받기
	$mode = $_GET["mode"];        
	$con = mysqli_connect("localhost", "user1", "12345", "sample");      
	$sql = "delete from message where num=$num"; // 쪽지 삭제하기
	mysqli_query($con, $sql);
	mysqli_close($con);                // DB 연결 끊기
	if($mode == "send") // 이동할 url 설정
		$url = "message_box.php?mode=send"; 
	else
		$url = "message_box.php?mode=rv";
	echo "
	<script>
		location.href = '$url'; 
	</script>
	";
        //페이지 이동
?>

  

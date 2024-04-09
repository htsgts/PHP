<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
  function check_input() { //쪽지 보내기 버튼 클릭시 호출되는 함수
  	  if (!document.message_form.rv_id.value)
      {
          alert("수신 아이디를 입력하세요!");
          document.message_form.rv_id.focus();
          return;
      }
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.message_form.content.focus();
          return;
      }
      document.message_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="message_box">
	    <h3 id="write_title">
	    		쪽지 보내기
		</h3>
		<ul class="top_buttons">
				<li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li> <!-- 수신 쪽지함 링크 삽입-->
				<li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li> <!-- 송신 쪽지함 링크 삽입-->
                </ul>
	    <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>"> <!-- message_insert.php로 이동-->
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">보내는 사람 : </span> 
					<span class="col2"><?=$userid?></span> <!-- '보내는 사람:' 오른쪽에 $userid를 삽입-->
				</li>	
				<li>
                                    <span class="col1">수신 아이디 : </span>
					<span class="col2"><input name="rv_id" type="text"></span> <!-- '수신 아이디:' 오른쪽에 있는 입력 창. 
                                                                name속성의 rv_id는 이 창에 입력된 데이터를 mesag_insert.php 파일에 POST 방식으로 전달-->
				</li>	 
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span><!-- '제목:' 오른쪽에 있는 입력 창. 
                                                                name속성의 subject는 입력된 제목을 mesag_insert.php 파일에 POST 방식으로 전달-->
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2"><textarea name="content"></textarea></span><!-- '내용:' 오른쪽에 있는 입력 창. 
                                                                name속성의 content는 입력된 내용을 mesag_insert.php 파일에 POST 방식으로 전달-->
	    		</li>
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button><!-- 쪽지 보내기 페이지 하단의 <보내기>를 클릭하면 chek_input( )함수를 호출-->
	    	</div>	    	
	    </form>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>

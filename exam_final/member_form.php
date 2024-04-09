<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/members.css">
<script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }
      if (!document.member_form.age.value) {
          alert("나이를 입력하세요!");    
          document.member_form.age.focus();
          return;
      }
      if (!document.member_form.phone.value) {
          alert("전화번호를 입력하세요!");    
          document.member_form.phone.focus();
          return;
      }
      if (!document.member_form.sex.value) {
          alert("성별을 입력하세요!");    
          document.member_form.sex.focus();
          return;
      }
      if (!document.member_form.address.value) {
          alert("주소를 입력하세요!");    
          document.member_form.address.focus();
          return;
      }
      if (!document.member_form.image.value) {
          alert("대표이미지를 입력하세요!");    
          document.member_form.image.focus();
          return;
      }
      if (!document.member_form.level.value) {
          alert("회원 등급을 입력하세요!");    
          document.member_form.level.focus();
          return;
      }
      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }
      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }
      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }
      document.member_form.submit();
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.age.value = "";
      document.member_form.phone.value = "";  
      document.member_form.sex.value = "";
      document.member_form.address.value = "";
      document.member_form.intro.value = "";
      document.member_form.image.value = "";
      document.member_form.music.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.level.value = "";
      document.member_form.id.focus();
      return;
   }
   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">나이</div>
				        <div class="col2">
							<input type="number" name="age" min="1">
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">전화번호</div>
				        <div class="col2">
							<input type="text" name="phone" >
				        </div>                 
			       	</div>
                                
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">성별</div>
				        <div class="col2">
                                            <input type="radio" name="sex" value="male" />남
                                            <input type="radio" name="sex" value="female" />여
                                                        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address" >
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">자기소개</div>
				        <div class="col2">
							<input type="text" name="intro" >
				        </div>                 
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">대표 이미지</div>
				        <div class="col2">
							<input type="text" name="image" >
				        </div>
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">뮤지션 여부</div>
				        <div class="col2">
							<input type="radio" name="music" value="yes">네
                                                        <input type="radio" name="music" value="no">아니요
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" >@<input 
							       type="text" name="email2" >
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">회원 등급(관리자는 1, 뮤지션 회원은 2, 일반회원은 나머지)</div>
				        <div class="col2">
							<input type="number" name="level" >
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>


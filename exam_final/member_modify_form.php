<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/members.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<?php    
   	$con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $age = $row["age"];
    $phone = $row["phone"];
    $sex = $row["sex"];
    $address = $row["address"];
    $intro = $row["intro"];
    $image = $row["image"];
    $music  = $row["music"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];
    
    $level  = $row["level"];
    
    mysqli_close($con);
?>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$userid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">나이</div>
				        <div class="col2">
							<input type="number" name="age" value="<?=$age?>">
				        </div>                 
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">전화번호</div>
				        <div class="col2">
							<input type="text" name="phone" value="<?=$phone?>">
				        </div>                 
			       	</div>
                                
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">성별</div>
				        <div class="col2">
							<input type="radio" name="sex"
                                                        <?php if (isset($sex) && $sex=="female") echo "checked";?>
                                                            value="female">여
                                                            <input type="radio" name="gender"
                                                        <?php if (isset($sex) && $sex=="male") echo "checked";?>
                                                            value="male">남
				        </div>                 
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address" value="<?=$address?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">자기소개</div>
				        <div class="col2">
							<input type="text" name="intro" value="<?=$intro?>">
				        </div>                 
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">대표 이미지</div>
				        <div class="col2">
							<input type="text" name="image" value="<?=$image?>">
				        </div>
			       	</div>
                                <div class="clear"></div>

			       	<div class="form">
				        <div class="col1">뮤지션 여부</div>
				        <div class="col2">
							<input type="radio" name="music"
                                                        <?php if (isset($music) && $music=="yes") echo "checked";?>
                                                            value="yes">네
                                                            <input type="radio" name="music"
                                                        <?php if (isset($music) && $music=="no") echo "checked";?>
                                                            value="no">아니요
				        </div>                 
			       	</div>
                                
                                
                                <div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
							       type="text" name="email2" value="<?=$email2?>">
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">회원 등급(관리자는 1, 뮤지션 회원은 2, 일반회원은 나머지)</div>
				        <div class="col2">
							<input type="number" name="level" value="<?=$level?>">
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


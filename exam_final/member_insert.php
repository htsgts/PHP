<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $intro = $_POST["intro"];
    $image = $_POST["image"];
    $music  = $_POST["music"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    $level  = $_POST["level"];
              
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into members(id, pass, name, age, phone, sex, address, , intro, image, music, email, regist_day, level, point) ";
	$sql .= "values('$id', '$pass', '$name','$age', '$phone', '$sex', '$address', '$intro', '$image','$music', '$email', '$regist_day', '$level', 0)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   

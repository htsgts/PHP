<?php
    $id = $_GET["id"];
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
    $level  = $_POST["level"];
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update members set pass='$pass', name='$name',age ='$age',phone ='$phone',sex ='$sex',"
            . "address ='$address',hobby ='$hobby',intro ='$intro',interest='$interest',image ='$image',music ='$music' ,email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   

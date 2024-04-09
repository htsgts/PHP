<?php
session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $userlevel != 1 && $userlevel != 1)
    {
        echo("
            <script>
            alert('관리자나 뮤지션 회원이 아닙니다! 뮤지션 게시판 수정은 관리자나 뮤지션 회원만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }    
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update board_music set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list_music.php?page=$page';
	      </script>
	  ";
?>

   

<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 공연 공지 게시판 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }
    
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board_show where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board_show where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list_show.php?page=$page';
	     </script>
	   ";
?>


<?php
    require_once("./db_con.php"); 
    $reserveclass=$_POST["Class"];
    $uname=$_POST["Name"];
    $userphone=$_POST["phone"];


    $insert_sql = "INSERT INTO reserve (Class,Name,phone) VALUES ('$reserveclass','$uname','$userphone')";
    if (mysqli_query($conn,$insert_sql)){
        $CNT = "SET @CNT=0";
        $conn->query($CNT);
        $Auto_Increment = "UPDATE reserve SET No = @CNT:=@CNT+1";
        $conn->query($Auto_Increment);
        echo "<script>alert(\"정상적으로 예약이 완료되었습니다.\");</script>";
	    echo "<script>location.replace('../yy.html');</script>"; /* 지정한 위치로 돌아가기 */
        exit;

    } else { 
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
	    echo "<script>location.replace('../yy.html');</script>"; /* 지정한 위치로 돌아가기 */
        exit;
    }
?>

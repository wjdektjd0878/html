<?php
    require_once("./db_con.php"); 
    $userid=$_POST["id"];
    $userpw=$_POST["pw"];
    $userpw2=$_POST["pw2"];
    $userphone=$_POST["phone"];
    $usermail=$_POST["mail"];

    if ( $userpw != $userpw2 ){
        echo "<script>alert(\"패스워드가 일치하지 않습니다.\");</script>";
	    echo "<script>window.history.back();</script>"; /* 이전으로 돌아가라 */
        exit;
    }
    
    $id_check_sql = "SELECT * FROM member WHERE id='$userid'";
    $result = $conn->query($id_check_sql);

   if($result->num_rows==1)
    {
        echo "<script>alert(\"이미 사용중인 ID입니다.\");</script>";
	    echo "<script>window.history.back();</script>";
        exit;
    }

    $insert_sql = "INSERT INTO member (ID,PW,Phone,Mail) VALUES ('$userid',password('$userpw'),'$userphone','$usermail')";

    if (mysqli_query($conn,$insert_sql)){
        $CNT = "SET @CNT=0";
        mysqli_query($conn,$CNT);
        $Auto_Increment = "UPDATE member SET No = @CNT:=@CNT+1";
        mysqli_query($conn,$Auto_Increment); /* 30-33 순서 재배열 ex) 12345에서 3이 사라지면 1245기 때문에 이 것을 다시 1234로 재배열 시켜준다.*/
        echo "<script>alert(\"정상적으로 회원가입이 완료되었습니다.\");</script>";
	    echo "<script>location.replace('../index.html');</script>"; /* 지정한 위치로 돌아가기 */
        exit;

    } else { 
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('../index.html');</script>";
        exit;
    }
?>

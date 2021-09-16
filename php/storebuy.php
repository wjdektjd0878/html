<?php
    require_once("./db_con.php"); 
    $Prod=$_POST["proname"];
    $Count=$_POST["count"];
    $Address=$_POST["address"];
    $Name=$_POST["name"];
    $Phone=$_POST["phone"];


    /*create table store(No int auto_increment primary key, Prod varchar(50) not null,  
    Count int not null, Address varchar(500) not null, Name varchar(50) not null, Phone varchar(50) not null);
    */
    $insert_sql = "INSERT INTO store (Prod,Count,Address,Name,Phone) VALUES ('$Prod','$Count','$Address','$Name','$Phone')";
    if (mysqli_query($conn,$insert_sql)){
        $CNT = "SET @CNT=0";
        $conn->query($CNT);
        $Auto_Increment = "UPDATE reserve SET No = @CNT:=@CNT+1";
        $conn->query($Auto_Increment);
        echo "<script>alert(\"정상적으로 구매가 완료되었습니다.\");</script>";
	    echo "<script>location.replace('../storedetail.html');</script>";
        exit;

    } else { 
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
	    echo "<script>location.replace('../storedetail.html');</script>";
        exit;
    }
?>
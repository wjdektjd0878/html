<!DOCTYPE html>
<html>
<head>
    <title>CLOUD WEB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google WEB Font URL : https://fonts.google.com/?subset=korean&selection.family=Nanum+Gothic -->
    <!-- Nanum 고딕체중 마음에 드는거 선택 후 해당 링크를 HTML 코드에 삽입 -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
    .navbar {
        font-size: 15px;
        margin-bottom: 0;
        border-radius: 0;
    }
    .carousel-inner > .item > img {
        width:1200px;
        height:300px;
    }
    .modal-content {
        font-size: 15px; 
        margin: 0;
        padding: 0;
    }
    .collapse>.nav>li>a {
            color: black;
    }
    .collapse>.nav>li>a:hover {
        color: white;
        background-color: black;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
    </style>

</head>

<body style="font-family: 'Nanum Gothic', sans-serif;">

    <!-- Navigation Bar Container -->
    <div class="container">
    <div class="row">
        <div class="col-sm-12">   
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #ffff;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="/index_auth.html">
                        <img style="max-width:80px; margin-top: -5px;" src="../images/logo2.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse " id="MyNav" style="color:black">
                <ul class="nav navbar-nav">
                    <li><a href="../class.html">클래스</a></li>
                    <li><a href="../store.html">스토어</a></li>
                    <li><a href="#">이벤트</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">고객센터</a>
                        <ul class="dropdown-menu">
                            <li><a href="./board.php">공지사항</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">1:1 문의</a></li>
                        </ul>
                    </li>
    
                    <form class="navbar-form navbar-left" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </ul>
    
                <ul class="nav navbar-nav navbar-right">
                <li><a href="./php/logout.php"><span class="glyphicon glyphicon-log-out"></span> 로그아웃</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </div>
    </div>
    <br><br>
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
    
            <div class="carousel-inner">
                <div class="item">
                    <img src="./images/carousel_1.jpg" alt="Laptop_1">
                    <div class="carousel-caption">
                    </div>
                </div>
    
                <div class="item active">
                    <img src="./images/main.png" alt="Laptop_2">
                    <div class="carousel-caption">
                    </div>
                </div>
    
                <div class="item">
                    <img src="./images/carousel_3.jpg" alt="Laptop_3">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
    
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
    
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span> 
            </a>
        </div>
        </div>
    <br><br>

    <!-- Board_Read -->
    <?php
        require_once("./db_con.php");
        $page = $_GET["page"];
        $Board_content_sql = "SELECT * FROM board WHERE No='$page'";
        $result = $conn->query($Board_content_sql);
        $board_data = $result->fetch_assoc();
    ?>

    <div class="container">
        <h1>고객 센터</h1><br>

        <blockquote>
        <div class="row">
            <div class="col-sm-12">
            <p style="font-size:13pt;">[ 제 목 ] : <code style="font-family: 'Nanum Gothic', sans-serif;"><?php echo $board_data['Title'];?></code></p><br>
            <pre style="font-family: 'Nanum Gothic', sans-serif; font-size:13pt; line-height:200%; background-color:white;"><?php echo $board_data['Content']; ?></pre><br>
            날 짜 :  <code style="font-family: 'Nanum Gothic', sans-serif;"><?php echo $board_data['Date']; ?></code>
            </div>   
        </div>
        </blockquote>

    </div>
    <br><br><br>
    
    <!-- 고객센터 Container -->
    <div id="contact" class="container">
    <h3>QUESTION</h3><br>
    <div class="row">
  
    <div class="col-md-4">
        <p><span class="glyphicon glyphicon-map-marker"></span> Seoul, KR</p>
        <p><span class="glyphicon glyphicon-phone"></span> Phone: +82 1544-0000</p>
        <p><span class="glyphicon glyphicon-envelope"></span> Email: cloud@cloud.com</p>
    </div>


    <!-- footer Container -->
    <footer class="container text-center">
        <p><span>Cloud System Test Site<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>


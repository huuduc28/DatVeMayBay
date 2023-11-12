<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Chi tiết bài viết</title>
    <link rel="icon" href="../assests/imgs/logo.png">
    <style>
        #imgpost{
            margin-left: 5%;
            margin-bottom: 50px;
            
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container" >
            <a class="navbar-brand" href="../view/flightManager.php">
            <img src="../assests/imgs/logo.png" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
            FlightTeam Air</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <!-- <a class="nav-link" href="#">Admin</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item">
                        <a id="countItemCart" class="nav-link" href=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="row">
            <div class="col-lg-4 col-md-10 col-lg-12">
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-10 col-lg-12" >
                <h1>Chi tiết bài viết:</h1>
                <div id="mainposter"></div><br>
            </div>   

        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        get_post();
    });
    function get_post(){
        <?php
        if(!isset($_GET['idPost'])|| !isset($_GET['idPost'])){
            $_GET['idPost'] = 'idPost';
        }
        ?>
        $.ajax({
        url: "../controller/PosterController.php?idPost=<?php echo $_GET['idPost']?>&action=getinforPost",
        dataType: 'json',
            success: function (data) { 
                show_post(data);
            },
            error: function (data) {
            }
        })
    }
    
    function show_post(data) {
        let doanhthu = 0;
        let veban = 0;
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let mainposst =    `
            <h1>`+row.namePosst+`</h1>
            <a style ="margin-left: 80%;">Ngày đăng: `+row.datePost+`</a>
                <img id="imgpost" src = "`+row.imgPost+`" style="width:90% ;height:70%; margin-top:2%"><br>
                <a">`+row.datelpost+`</a><br>    
            `
            $("#mainposter").append(mainposst);
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="icon" href="../assests/imgs/logo.png">
    <title>Document</title>
    <style>
        :root {
            --main-color: white;
        }
        .list-group-item{
            background-color: white;
        }
        .list-group-item:hover{
            background-color:rgb(213, 184, 184);
        }
        body{
            background-color:rgb(245, 245, 245);
        }     
        #addticket{
            margin-top: 1%;
            margin-bottom: 1%;
        }
        form{
            margin-top: 2%;
            margin-bottom: 2%;
        }
        #doanhthu{
            font-size:large;
            color: red;
            font-style:oblique;
        }
        #veban{
            font-size:large;
            font-style:oblique;
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
                        <a class="nav-link" href="#">Admin</a>
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
            <div class="col-lg-2">
            <img src = "/FlightTeam/assests/imgs/logo.png" style="width:100% ;height:80% ;margin-top:15%">
            </div>
            <div class="col-lg-4 col-md-10 col-lg-9">
                <h1 style ="margin-top: 4%">Thống kê doanh thu<img src ="/FlightTeam/assests/imgs/bieudo.jpg" style="width:5% ;height:5% "></h1>
                <form action="/FlightTeam/view/revenue.php">
                    <label for="datein">Từ ngày:</label>
                    <input type="date" id="datein" name="datein">
                    <label for="dateout" style = "margin-left:2%">Đến ngày:</label>
                    <input type="date" id="dateout" name="dateout">
                    <input type="submit" class="btn btn-danger " value="Thống kê" style = "margin-left:2%">
                    <a href="/FlightTeam/view/flightManager.php" class="btn btn-danger " style = "margin-left:1%">Trở về</a>
                </form>   
            </div>      
        </div>

        <div class="row">
            <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-10 col-lg-9">
                    <table id="list-ticket" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Mã đặt chỗ</td>
                                <td>Tên khách hàng</td>
                                <td>Ngày đặt vé</td>
                                <td>Loại vé</td>
                                <td>Ngày thanh toán</td>
                                <td>Hình thức thanh toán</td>
                                <td>Tổng tiền</td>
                            </tr>  
                        </thead>
                <div id="mainView"></div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><label style="font-size:large">Số lượng vé bán:</label> <a id ='veban'></a></div>
            <div class="col-lg-12"><label style="font-size:large">Tổng doanh thu: </label> <a id ='doanhthu'></a></div><br>
    </div>
</body>
</html> 

<script>
    $(document).ready(function () {
        get_revenue();
    });
    function get_revenue(){
        <?php
        if(!isset($_GET['dateout'])|| !isset($_GET['dateout'])){
            $_GET['dateout'] = '';
            $_GET['dateout'] = '';
        }
        ?>
        $.ajax({
        url: "../controller/FlightManagerControler.php?datein=<?php echo $_GET['datein']?>&dateout=<?php echo $_GET['dateout']?>",
        dataType: 'json',
            success: function (data) { 
                show_revenue(data);
            },
            error: function (data) {
            }
        })
    }
    function show_revenue(data) {
        let doanhthu = 0;
        let veban = 0;
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table = 
            `<tbody>
                <tr>
                    <td>`+row.idBooking+`</td>
                    <td>`+row.nameCustomer+`</td>
                    <td>`+row.bookingDate+`</td>
                    <td>`+row.ticketType+`</td>
                    <td>`+row.paymentdate+`</td>
                    <td>`+row.payMethods+`</td>
                    <td>`+row.priceTicket+`</td>
                </tr>
            </tbody>
            </table>`
            $("#list-ticket").append(table);
            doanhthu += parseInt(row.priceTicket);
            veban += 1;
        }
        function formatMoney(number) {
            return  number.toLocaleString('en-VN')+'đ';
        }
        document.getElementById('doanhthu').innerHTML = formatMoney(doanhthu);
        document.getElementById('veban').innerHTML = veban;
    }
</script>

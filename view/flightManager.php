<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="icon" href="../assests/imgs/logo.png">
    <title>Trang chủ - Admin</title>
    <style>
        :root {
            --main-color: white;
        }

        #danhmuc {
            background-color: var(--main-color);
            text-align: center;
            border: 1px solid white;
        }

        .list-group-item {
            background-color: white;
        }

        .list-group-item:hover {
            background-color: rgb(213, 184, 184);
        }

        body {
            background-color: white;
        }

        #addticket {
            margin-top: 1%;
            margin-bottom: 1%;
        }
    </style>

    <script>
        $(window).bind("load", function () {
            jQuery("#status").fadeOut();
            jQuery("#loader").fadeOut();
        });
    </script>
</head>

<body>
    <div id='status'></div>
    <div id='loader'></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../view/home.php">
                <img src="../assests/imgs/logo.png" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
                    FlightTeam Air</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Admin
                            </a>
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
                <div id="danhmuc">
                    <img src = "../assests/imgs/logo.png" style="width:100% ;height:100% ;">
                    <div class="list-group">
                        <a  class='list-group-item' onclick="get_all_tickets()" >Thông tin vé máy bay</a>
                        <a class='list-group-item' onclick="get_history_tickets()" >Lịch sử mua vé</a>
                        <a  class='list-group-item' href="revenue.php" style="color: black;" >doanh thu</a>
                        <a  class='list-group-item' onclick="get_flight()" >Quản lý chuyến bay</a>
                        <a  class='list-group-item' href="clientManager.php"style="color: black;">Quản lý khách hàng</a>
                        <a  class='list-group-item' onclick="get_all_Post()">Quản lý bài viết</a>
                    </div>
                </div>
            </div>
            <div  class="col-md-12 col-lg-9">
                <div id="mainView"></div>
            </div>
        </div>
</body>

</html>
<script>
    $(document).ready(function () {
        get_all_tickets();
    });
    // lấy dữ  liệu cho quản lý vé máy bay
    function get_all_tickets() {
        $.ajax({
            url: "../controller/FlightManagerControler.php?action=getAllTicket",
            dataType: 'json',
            success: function (data) {
                show_tickets(data);
            },
            error: function (data) {
            }
        })
    }
    function show_tickets(data) {
        let tablemain = ` 
            <div id ="tableTicket">
                <h1 style ="margin-top: 4%">Thông tin vé máy bay
                <img src = "/FlightTeam/assests/imgs/anhMap.jpg" style="width:5% ;height:5% ;">
                </h1>
                    <table id="list-ticket" class="table table-bordered" style ="margin-top: 2%">
                    <thead>
                        <tr class="header">
                            <th>Mã đặt chỗ</th>
                            <th>vị trí ghế</th>
                            <th>Cổng vào</th>
                            <th>Loại vé</th>
                            <th>Mã chuyến bay</th>
                            <th>Tên máy bay</th>
                            <th>Ngày đi</th>
                            <th>Ngày đến</th>
                            <th>Giá vé</th>
                        </tr>  
                    </thead>
                    </table>
                </div>`
        $('#tableHis').remove();
        $('#tablePost').remove();
        $('#tableTicket').remove();
        $('#tableFly').remove();
        $("#mainView").append(tablemain);
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table = `
                <tbody>
                    <tr>
                        <td style="width:15%">`+ row.idBooking + `<img src = "/FlightTeam/assests/imgs/ticket.png" style="width:40% ;height:40%; margin-left:10%"></td>
                        <td>`+ row.seatPosition + `</td>
                        <td>`+ row.enntranceGate + `</td>
                        <td>`+ row.ticketType + `</td>
                        <td style="width:10%">`+ row.idFlight + `<img src = "/FlightTeam/assests/imgs/logo.png" style="width:50% ;height:50% ;"></td>
                        <td>`+ row.airName + `</td>
                        <td>`+ row.flightDate + `</td>
                        <td>`+ row.landingDay + `</td>
                        <td  style="color:red;">`+ row.priceTicket + `</td>
                    </tr>
                </tbody>
                </table>`
            $("#list-ticket").append(table);
        }

    }
    // lấy dữ  liệu cho quản lý vé đã bán

    function get_history_tickets() {
        $.ajax({
            url: "../controller/FlightManagerControler.php?action=gethistoryTicket",
            dataType: 'json',
            success: function (data) {
                show_history_tickets(data);
            },
            error: function (data) {
            }
        })
    }

    function show_history_tickets(data) {
        let tablemain = `
            <div id ="tableHis">
            <h1 style ="margin-top: 4%">Lịch sử mua vé            
            <img src = "/FlightTeam/assests/imgs/history.jpg" style="width:5% ;height:5% ;">
            </h1>
            <table id="list-history-ticket" class="table table-bordered"style ="margin-top: 2%">
                <thead>
                <tr>
                    <th>Mã đặt chỗ</th>
                    <th>Số điện thoại</th>
                    <th>Tên khách hàng</th>
                    <th>Mã chuyến bay</th>
                    <th>Mã giao dịch</th>
                    <th>Người thanh toán</th>
                    <th>Thanh toán</th>
                    <th>Ngày giao dịch</th>
                    <th>Tổng tiền</th>
                </tr>
                </thead>
            </div>`
        $('#tablePost').remove();
        $('#tableHis').remove();
        $('#tableTicket').remove();
        $('#tableFly').remove();
        $("#mainView").append(tablemain);
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table =
                `<tbody>
                    <tr>
                        <td>`+ row.idBooking + `</td>
                        <td>`+ row.customePhoneNumber + `</td>
                        <td>`+ row.nameCustomer + `</td>
                        <td>`+ row.idFlight + `</td>
                        <td>`+ row.idpay + `</td>
                        <td>`+ row.payerName + `</td>
                        <td>`+ row.payMethods + `</td>
                        <td>`+ row.paymentdate + `</td>
                        <td>`+ row.priceTicket + `</td>
                    </tr>
                    </tbody>
                </table>`
            $("#list-history-ticket").append(table);
        }

    }
    //Quản lý chuyến bay
    function get_flight() {
        $.ajax({
            url: "../controller/FlightManagerControler.php?action=getflight",
            dataType: 'json',
            success: function (data) {
                show_flight(data);
            },
            error: function (data) {
            }
        })
    }

    function show_flight(data) {
        let tablemain = `
            <div id ="tableFly">
            <h1 style ="margin-top: 4%">Quản lý chuyến bay
            <img src = "/FlightTeam/assests/imgs/anhMap.jpg" style="width:5% ;height:5% ;">
            </h1>
                <a href="../view/addFlight.php" id="addticket" class="btn btn-danger mt-10">Thêm</a> <img src = "/FlightTeam/assests/imgs/iconfly.png" style="width:3% ;height:3% ;">
                <table id ="list-getflight" class="table table-hover" style ="margin-top: 1% ">
                <thead>
                <tr>
                    <th>Mã chuyến bay</th>
                    <th>Tên Máy bay</th>
                    <th>Ngày đi</th>
                    <th>Ngày đến</th>
                    <th>Mã sân bay</th>
                    <th></th>
                </tr>
                </thead>
                </div>`
        $('#tablePost').remove();
        $('#tableHis').remove();
        $('#tableTicket').remove();
        $('#tableFly').remove();
        $("#mainView").append(tablemain);
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table =
                `<tbody>
                    <tr>
                        <td style="width:15%">`+ row.idFlight + `<img src = "/FlightTeam/assests/imgs/logo.png" style="width:50% ;height:50% ;"></td>
                        <td>`+ row.airName + `</td>
                        <td>`+ row.flightDate + `</td>
                        <td>`+ row.landingDay + `</td>
                        <td>`+ row.Iddepartureair + `</td>
                        <td><a href="../view/editFlight.php?idFlight=` + row.idFlight + `" class="btn btn-primary">Sửa</a></td>
                    </tr>
                </body>
                </table>`
            $("#list-getflight").append(table);
        }
    }
    function get_all_Post() {
        $.ajax({
            url: "../controller/PosterController.php?action=getAllPost",
            dataType: 'json',
            success: function (data) {
                show_Post(data);
            },
            error: function (data) {
            }
        })
    }
    function show_Post(data) {
        let tablemain = ` 
            <div id ="tablePost">
                <h1 style ="margin-top: 4%">Thông tin bài viết
                <img src = "/FlightTeam/assests/imgs/internet.jpg" style="width:5% ;height:5% ;"><br>
                <a href="../view/formAddPost.php" id="addticket" class="btn btn-danger mt-10">Thêm bài viết</a>
                </h1>
                    <table id="list-Post" class="table table-bordered" style ="margin-top: 2%;text-align: center;">
                    <thead>
                        <tr class="header">
                            <th>Mã Bài viết</th>
                            <th>Tên bài viết</th>
                            <th>Ngày đăng</th>
                            <th>Hình ảnh</th>
                            <th></th>
                        </tr>  
                    </thead>
                    </table>
                </div>`
        $('#tablePost').remove();
        $('#tableHis').remove();
        $('#tableTicket').remove();
        $('#tableFly').remove();
        $("#mainView").append(tablemain);

        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table = `
                <tbody>
                    <tr>
                        <td>`+ row.idPost+`</td>
                        <td>`+ row.namePosst +`</td>
                        <td>`+ row.datePost + `</td>
                        <td><img src = "`+row.imgPost+`" style = "width:200px ; height:100px ;"></td>
                        <td><a href ='../view/morePost.php?idPost=`+row.idPost+`&action=getinforPost'>Xem thêm</a></td>
                        
                    </tr>
                </tbody>
                </table>`
            $("#list-Post").append(table);
        }

    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" href="../assests/imgs/logo.png">
    <title>Document</title>
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

    form {
        margin-top: 2%;
    }

    label {
        font-style: inherit;
    }

    button {
        margin-top: 1%;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../view/flightManager.php">FlightTeam Air</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../view/flightManager.php">Home
                            <span class="sr-only">(current)</span>
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
    <div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="col-sm-12 col-md-12 col-lg-11">
                    <h3 style="margin-top: 2%;">Thêm chuyến bay</h3>
                    <form action="../controller/FlightManagerControler.php?action=addFlight" method="post">
                        <label>Mã chuyến bay</label><br>    
                        <input type="text" class="form-control" name="machuyenbay"><br>
                        <label>Tên máy bay</label><br>
                        <select class="form-select" aria-label="Default select example" name="tenmaybay">
                            <option value="Boeing 777">Boeing 777</option>
                            <option value="Airbus A330">Airbus A330</option>
                            <option value="Fokker 70">Fokker 70</option>
                            <option value="ATR 72">ATR 72</option>
                        </select>
                        <label>Ngày khởi hành</label><br>
                        <input type="date" class="form-control" name="ngaydi"><br>
                        <label>Ngày đến</label><br>
                        <input type="date" class="form-control" name="ngayden"><br>
                        <label>Mã sân bay đi</label><br>
                        <select id="list-air" class="form-select" aria-label="Default select example" name="masanbaydi">
                        </select>
                        <label>Mã sân bay đến</label><br>
                        <select id="list-air2" class="form-select" aria-label="Default select example" name="masanbayden">
                        </select>
                        <button type="sumit" class="btn btn-primary">Thêm chuyến bay</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="../assests/imgs/posterlogin.png" class="img-fluid" alt="" style="margin-top: 1%;">
            </div>
        </div>
    </div>

    </div>
</body>

</html>
<script>
    $(document).ready(function () {
        get_all_Air();
    });
    function get_all_Air() {
        $.ajax({
        url: "../controller/FlightManagerControler.php?action=getAir",
        dataType: 'json',
            success: function (data) { 
                show_Air(data);
            },
            error: function (data) {
            }
        })
    }
    function show_Air(data) {
        for (let i = 0; i < data.data.length; i++) {
            let row = data.data[i];
            let table =  `
            <option value="`+row.idAir+`">`+row.idAir+`</option>`
            $("#list-air").append(table);
            $("#list-air2").append(table);
        }
          
    }

</script>
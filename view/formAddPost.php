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
    <title>Thêm bài viết</title>
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
        <div class="col-lg-1"></div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="col-sm-1 col-md-10 col-lg-10">
                    <h3 style="margin-top: 2%;">Thêm Bài viết</h3>
                    <form action="../model/addPoster.php" method="post" enctype="multipart/form-data">
                        <label>Mã bài viết</label><br>    
                        <input type="text" class="form-control" name="mabaiviet"><br>
                        <label>Mã hình ảnh</label><br>    
                        <input type="text" class="form-control" name="mahinhanh"><br>
                        <label>Tên Bài viết</label><br>
                        <input type="text" class="form-control" name="tenbaiviet"><br>
                        <label>Ngày Đăng</label><br>
                        <input type="date" class="form-control" name="ngaydang"><br>
                        <label>Nội dung</label><br>
                        <textarea id="noidung" name="noidung" rows="4" cols="50"></textarea>
                        <label>Hình ảnh</label><br>
                        <input type="file" class="form-control" name="photo" id="fileSelect"><br>
                        <button type="sumit" class="btn btn-primary" name="submit">Thêm bài viết</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="../assests/imgs/posterlogin.png" class="img-fluid" alt="" style="margin-top: 1%;">
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
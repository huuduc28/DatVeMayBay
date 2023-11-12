<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
    table {
        border-collapse: collapse;
        border: 1px solid black;
        text-align: center;
	    vertical-align: middle;

    }

    
    th, td {
        border: 1px solid black;
        padding: 8px;
        background-color: aliceblue;
    }

    thead, th  {
        width: 1%;
        background-color: #333;
        color: white;
    }

    thead {
        background-color: #333;
        color: white;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 2%;
    }   

    .caption {
        font-weight: bold;
        font-size: 10px;
        text-align: left;
        color: #333;
        margin-bottom: 16px;
    }


    .wrap_search{

        margin-top: 5% ;
        margin-bottom: 1%;
        margin-left: 4%
    }
    body {
      /* opacity: 0.9; */
      background-image: url(../assests/imgs/background-signup.jfif);
      background-size: cover;
 
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
<div class="container">
    <div class="row" id="seach">
    <div class="col-sm-1 col-md-2 col-lg-3"></div>
    <div class="col-sm-7 col-md-9 col-lg-7">
            <div class="wrap_search" style="margin-top:5% ">
                <form action=""  method="get">
                    <input class="form-control" name ="search" type="text" placeholder="Nhập mã vé của bạn" >
                    <button type="submit"class="btn btn-success" style="margin-top:2% ">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php 
    require_once("../model/connection.php");
    $conn = connection::connectToDatabase ();
    if(isset( $_GET["search"])) {
        $idT = $_GET['search'];
        $sql = "SELECT * FROM vemaybay where madatcho = '$idT'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "
            <div class='row'>
                <div class='col-sm-1 col-md-2 col-lg-1'></div>
                    <div class='col-sm-7 col-md-9 col-lg-10'>
                        <table> 
                        <thead>
                                <tr class= 'caption'>
                                    <th>Mã đặt chỗ </th> 
                                    <th>Họ tên khách hàng</th>  
                                    <th>Ngày sinh khách hàng</th> 
                                    <th>Cccd / passport</th>  
                                    <th>Loại khách hàng</th>  
                                    <th>Vị trí ghế</th>  
                                    <th>Cổng vào</th>  
                                    <th>Số túi xách / hành lý</th>
                                    <th>Tổng giá vé</th>
                                    <th>Loại vé</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày đặt</th>
                                </tr>
                        </thead>
                    </div>
            </div>
            "
            ;

            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["madatcho"]. "</td><td>" . $row["hotenkhachhang"]. "</td><td> " . $row["ngaysinhkhachhang"]. "</td><td>" . 
                $row["cccd_passport"]. "</td><td>" . $row["loaikhachhang"]. "</td><td>"  . $row["vitrighe"]. "</td><td>" . $row["congvao"]. "</td><td>" . 
                $row["sohangly_tuixach"]. "</td><td>" . $row["tonggiave"]. "</td><td>". $row["loaive"]. "</td><td>" . $row["tinhtrang"]. "</td><td>"
                . $row["ngaydat"]. "</td>  </tr>" ;
            }
            echo "</table>";
        } else {
            echo '<script>alert("Sai mã vé hoặc Mã vé không tồn tại")</script>';
        }
}
    $conn->close();
?>


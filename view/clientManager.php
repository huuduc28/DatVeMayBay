<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop bán hàng NetaShop</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <img src="../assests/imgs/logo.png" alt="Avatar Logo" style="width:70px;" class="rounded-pill"> 
                <a class="navbar-brand" href="flightManager.php">FlightTeam Air</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Admin
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
    <!-- Main content -->
    <div class="container">
        <h1 style="margin-top: 3%;">Danh sách Khách hàng</h1>

        <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        // include_once(__DIR__ . 'dbconnect.php');
        require_once("../model/connection.php");
        $conn = connection::connectToDatabase ();

        // 2. Chuẩn bị câu truy vấn $sql
        $sql = "select * from `khachhang`";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);

        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'sdt' => $row['sdt'],
                'matkhau' => $row['matkhau'],
                'danhxung' => $row['danhxung'],
                'hoten' => $row['hoten'],
                'ngaysinh' => $row['ngaysinh'],
                'cccd_passport' => $row['cccd_passport'],
                'quoctich' => $row['quoctich'],
                'email' => $row['email'],
                'gioitinh' => $row['gioitinh'],
            );
            $rowNum++;
        }
        ?>
        <table class="table table-borderd" style="margin-bottom: 1%;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Số điện thoại</th>
                    <th>Danh xưng</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>CCCD/Passport</th>
                    <th>Quốc tịch</th>
                    <th>Email</th>
                    <th>Giới tính</th>
                    <th></th>   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['rowNum']; ?></td>
                        <td><?php echo $row['sdt']; ?></td>
                        <td><?php echo $row['danhxung']; ?></td>
                        <td><?php echo $row['hoten']; ?></td>
                        <td><?php echo $row['ngaysinh']; ?></td>
                        <td><?php echo $row['cccd_passport']; ?></td>
                        <td><?php echo $row['quoctich']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gioitinh']; ?></td>
                        <td>
                            <!-- Button Sửa -->
                            <a href="editManager.php?sdt=<?php echo $row['sdt']; ?>" id="btnUpdate" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Button Xóa -->
                            <a href="deleteManager.php?sdt=<?php echo $row['sdt']; ?>" id="btnDelete" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wsdtth=device-wsdtth, initial-scale=1.0">
    <title>Flyteam</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    require_once("../model/connection.php");
    $conn = connection::connectToDatabase ();

    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $sdt = $_GET['sdt'];
    $sqlSelect = "SELECT * FROM `khachhang` WHERE sdt=$sdt;";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($row)) {
        echo "Giá trị sdt: $sdt không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    
    <!-- Main content -->
    <div class="container">
        <h1 style="margin-top: 2%;">Cập nhật thông tin khách hàng</h1>

        <form name="frmEdit" sdt="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="number" name="sdt" sdt="sdt" class="form-control" value="<?php echo $row['sdt'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="text" name="matkhau" id="matkhau" class="form-control" value="<?php echo $row['matkhau'] ?>"  /></td>
                </tr>
                <tr>
                    <td>Danh xưng</td>
                    <td><input type="text" name="danhxung" id="danhxung" class="form-control" value="<?php echo $row['danhxung'] ?>" /></td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><input type="text" name="hoten"    id="hoten"    class="form-control" value="<?php echo $row['hoten'] ?>" ></input></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="ngaysinh" id="ngaysinh" class="form-control" value="<?php echo $row['ngaysinh'] ?>" /></td>
                </tr>
                <tr>
                    <td>Cccd / passport </td>
                    <td><input type="text" name="cccd_passport" id="cccd_passport" class="form-control" value="<?php echo $row['cccd_passport'] ?>" /></td>
                </tr>
                <tr>
                    <td>Quốc tịch</td>
                    <td><input type="text" name="quoctich" id="quoctich" class="form-control" value="<?php echo $row['quoctich'] ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>" /></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td><input type="text" name="gioitinh" id="gioitinh" class="form-control" value="<?php echo $row['gioitinh'] ?>" /></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <?php
    // 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $sdt = $_POST['sdt'];
        $matkhau = $_POST['matkhau'];
        $danhxung = $_POST['danhxung'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'] ; 
        $cccd_passport = $_POST['cccd_passport'] ; 
        $quoctich = $_POST['quoctich'] ; 
        $email = $_POST['email'] ; 
        $gioitinh = $_POST['gioitinh'] ; 

        // Câu lệnh UPDATE
        $sql = "UPDATE khachhang SET sdt='$sdt', matkhau='$matkhau', danhxung='$danhxung', hoten='$hoten' , ngaysinh='$ngaysinh'    
                , cccd_passport='$cccd_passport', quoctich='$quoctich' , email='$email' , gioitinh='$gioitinh'    WHERE sdt=$sdt;";

        // Thực thi UPDATE
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:clientManager.php');
    }
    ?>

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
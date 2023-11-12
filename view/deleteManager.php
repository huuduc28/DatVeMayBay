<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
require_once("../model/connection.php");
$conn = connection::connectToDatabase ();

// 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$sdt = $_GET['sdt'];
$sql = "DELETE FROM `khachhang` WHERE sdt=$sdt;";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

// 4. Đóng kết nối

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:clientManager.php');
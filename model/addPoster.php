<?php
if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed))
                die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");

            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize)
                die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");

            if (in_array($filetype, $allowed)) {
                if (file_exists("../assests/imgs/" . $filename)) {
                    echo $filename . " đã tồn tại.";
                } else {
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../assests/imgs/" . $filename);
                    echo "Tệp của bạn đã đăng tải thành công";
                }
            } else {
                echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại.";
            }
        } else {
            echo "Error: " . $_FILES["photo"]["error"];
        }
    }

        require_once ('connection.php'); 
        $conn = connection::connectToDatabase ();

        $pid = $_POST['mabaiviet'];
        $idm = $_POST['mahinhanh'];
        $namepost = $_POST['tenbaiviet'];
        $dateposst = $_POST['ngaydang'];
        $note = $_POST['noidung'];
        $imgpost = "../assests/imgs/" . $filename;
        $sql = "INSERT INTO `baiviet`(`mabaiviet`, `tenbaiviet`, `chitietbai`, `ngaydang`) 
        VALUES ('$pid','$namepost','$note','$dateposst')";
        $result = $conn -> query ($sql);
        $sql2 = "INSERT INTO `banner`(`mabanner`, `anhbanner`, `tendangnhap`, `mabaiviet`) 
        VALUES ('$idm','$imgpost','admin','$pid')";
        $result = $conn -> query ($sql2);
        header("Location:../view/flightManager.php");
}
?>
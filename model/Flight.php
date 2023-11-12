<?php
    require_once ('connection.php');    
    class Flight{
        public static function getAllTicket() {
            $conn = connection::connectToDatabase ();
            //tạo câu truy vấn lấy dữ kiệu của vé máy bay
            $sql = "SELECT vb.madatcho,vb.vitrighe,vb.congvao,vb.tonggiave,vb.loaive,cb.machuyenbay,cb.tenmaybay,cb.ngaydi,cb.ngayden
            FROM vemaybay as vb, chuyenbay as cb
            WHERE vb.machuyenbay = cb.machuyenbay";

            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idBooking"=> $r["madatcho"],"seatPosition"=> $r["vitrighe"],"enntranceGate"=>$r["congvao"],"ticketType"=>$r['loaive'],
                "idFlight"=>$r["machuyenbay"],"airName"=>$r["tenmaybay"],"flightDate"=>$r["ngaydi"],"landingDay"=>$r["ngayden"],"priceTicket"=>$r["tonggiave"]];
            }
            return $data;
        }

        public static function getHistoryTicket(){
            $conn = connection::connectToDatabase ();
            //tạo câu truy vấn lấy dữ liệu lịch sử bán vé
            $sql = "SELECT * FROM vemaybay,thanhtoan WHERE vemaybay.magiaodich = thanhtoan.magiaodich";

            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idBooking"=> $r["madatcho"],"customePhoneNumber"=> $r["sodienthoaikhachdangnhap"],"nameCustomer"=> $r["hotenkhachhang"],
                "customerBirthday"=> $r["ngaysinhkhachhang"],"cccd_passport"=>$r["cccd_passport"],"typeCustomer"=>$r['loaikhachhang'],
                "seatPosition"=>$r["vitrighe"],"enntranceGate"=>$r["congvao"],"baggageNumber"=>$r["sohangly_tuixach"],"bookingDate"=>$r["ngaydat"],
                "idFlight"=>$r["machuyenbay"],"idpay"=>$r["magiaodich"],"payerName"=>$r["tenkhachhang"],"payMethods"=>$r["phuongthucthanhtoan"],
                "paymentdate"=>$r["ngaygiaodich"],"priceTicket"=>$r["tonggiave"]];
            }
            return $data;
        }
        public static function getRevenue($datein,$dateout){
            $conn = connection::connectToDatabase ();
              //tạo câu truy vấn lấy dữ liệu doanh thu
            $sql = "SELECT *FROM vemaybay,thanhtoan WHERE vemaybay.magiaodich = thanhtoan.magiaodich and ngaydat >= '$datein' AND ngaydat <= '$dateout'";

            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idBooking"=> $r["madatcho"],"customePhoneNumber"=> $r["sodienthoaikhachdangnhap"],"nameCustomer"=> $r["hotenkhachhang"],
                "customerBirthday"=> $r["ngaysinhkhachhang"],"cccd_passport"=>$r["cccd_passport"],"typeCustomer"=>$r['loaikhachhang'],
                "seatPosition"=>$r["vitrighe"],"enntranceGate"=>$r["congvao"],"baggageNumber"=>$r["sohangly_tuixach"],"bookingDate"=>$r["ngaydat"],
                "idFlight"=>$r["machuyenbay"],"idpay"=>$r["magiaodich"],"payerName"=>$r["tenkhachhang"],"payMethods"=>$r["phuongthucthanhtoan"],
                "paymentdate"=>$r["ngaygiaodich"],"priceTicket"=>$r["tonggiave"],"ticketType"=>$r["loaive"]];
            }
            return $data;
        }
        public static function getInforHistory($idBooking){
            //tạo câu truy vấn chi tiết lịch sử mua vé
            $conn = connection::connectToDatabase ();
            $sql = "SELECT * FROM vemaybay,thanhtoan WHERE vemaybay.magiaodich = thanhtoan.magiaodich and madatcho = '$idBooking'";

            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idBooking"=> $r["madatcho"],"customePhoneNumber"=> $r["sodienthoaikhachdangnhap"],"nameCustomer"=> $r["hotenkhachhang"],
                "customerBirthday"=> $r["ngaysinhkhachhang"],"cccd_passport"=>$r["cccd_passport"],"typeCustomer"=>$r['loaikhachhang'],
                "seatPosition"=>$r["vitrighe"],"enntranceGate"=>$r["congvao"],"baggageNumber"=>$r["sohangly_tuixach"],"bookingDate"=>$r["ngaydat"],
                "idFlight"=>$r["machuyenbay"],"idpay"=>$r["magiaodich"],"payerName"=>$r["tenkhachhang"],"payMethods"=>$r["phuongthucthanhtoan"],
                "paymentdate"=>$r["ngaygiaodich"],"priceTicket"=>$r["tonggiave"]];
            }
            return $data;
        }

        public static function getflight(){
            $conn = connection::connectToDatabase ();
          //tạo câu truy vấn lấy dữ liệu các chuyến bay
            $sql = "SELECT * FROM chitietchuyenbay,chuyenbay WHERE chitietchuyenbay.machuyenbay = chuyenbay.machuyenbay";
            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idFlight"=> $r["machuyenbay"],"airName"=> $r["tenmaybay"],"flightDate"=>$r["ngaydi"],"landingDay"=>$r["ngayden"],"Iddepartureair"=>$r["masanbay"]];
            }
            return $data;
        }

        public static function addflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair,$IdArrivalAir){
            $conn = connection::connectToDatabase ();
                //thêm dữ liệu cho các bảng liên quan đến chuyến bay
            $sql = "INSERT INTO `chuyenbay`(`machuyenbay`, `tenmaybay`, `ngaydi`, `ngayden`) 
            VALUES ('$idFlight','$airName','$flightDate','$landingDay')";
            $result = $conn -> query ($sql);
            $sql2 = "INSERT INTO `chitietchuyenbay`(`masanbay`, `machuyenbay`) 
            VALUES ('$Iddepartureair','$idFlight')";
            $result = $conn -> query ($sql2);

            $sql3 = "INSERT INTO `chitietchuyenbay`(`masanbay`, `machuyenbay`) 
            VALUES ('$IdArrivalAir','$idFlight')";
            $result = $conn -> query ($sql3);
        }

        public static function editflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair){
            $conn = connection::connectToDatabase ();
            $sql = "UPDATE `chuyenbay` SET `tenmaybay`='$airName',`ngaydi`='$flightDate',`ngayden`='$landingDay'
            WHERE machuyenbay = '$idFlight'";
            $result = $conn -> query ($sql);
            $sql2 = "UPDATE `chitietchuyenbay` SET `masanbay`='$Iddepartureair'  WHERE machuyenbay = '$idFlight'";
            $result = $conn -> query ($sql2);
        }


        public static function searchFlight ($startPlace, $endDate, $startDate) {
            $conn = connection::connectToDatabase();
            // tìm kiếm chuyến bay
            $sql = "SELECT * FROM CHUYENBAY WHERE date(ngaydi) = '$startPlace'";
            $rel = $conn->query($sql);

            $data = [];
            while ($r = $rel ->fetch_assoc()) {
            $masanbay = Flight::getMaSanBay($r["machuyenbay"]);
            if (count($masanbay) == 0) {
                $masanbay[0] = "";
                $masanbay[1] = "";
            }
            $data[] = ["machuyenbay" => $r["machuyenbay"], "tenmaybay" => $r["tenmaybay"], "ngayden" => $r["ngayden"], "masanbaydi" => $masanbay[0], "masanbayden" => $masanbay[1]];
            }
            return $data;
        }

        public static function getMaSanBay ($machuyenbay) {
            // lấy mã sân bay đi và sân bay đến
            $conn = connection::connectToDatabase ();
            $sql = "SELECT * FROM `chitietchuyenbay` WHERE MACHUYENBAY = '$machuyenbay' LIMIT 2";
            $rel = $conn->query($sql);
            $data = array();
            $i = 0;
            while ($vari = $rel-> fetch_array()) {
                $data[$i] = $vari["masanbay"];
                $i = $i + 1;
            }
            return $data;
        }
        public static function getAir(){
            // lấy mã của các sân bay
            $conn = connection::connectToDatabase ();

            $sql = "SELECT * FROM `sanbay`";

            $result = $conn -> query ($sql);
            $data = [];
            while ($r = $result -> fetch_assoc ()) {
                $data[] = ["idAir"=> $r["masanbay"],"nameCity"=> $r["thanhpho"]];
            }
            return $data;
        }
    }
    
?>

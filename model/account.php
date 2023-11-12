<?php
    require_once("connection.php");
    class account {
        private $phone;
        private $password;

        public function __construct ($phone, $password) {
            $this->phone = $phone;
            $this->password = $password;
        }

        //Check whether the sign up phone number is duplicate
        public static function checkDuplicatePhone ($phone) {
            $conn = connection::connectToDatabase ();
            $result = mysqli_query($conn, "SELECT * FROM KHACHHANG WHERE sdt = '$phone'");
            if (mysqli_num_rows($result) != 0) {
                return true;
            }
            return false;
        }
        public static function checkSignIn($phone, $password) {
            $conn = connection::connectToDatabase ();
            $rs1 = mysqli_query($conn, "SELECT * FROM khachhang WHERE sdt = '$phone' and matkhau = '$password' ");
            $rs2 = mysqli_query($conn, "SELECT * FROM nhanvien WHERE tendangnhap = '$phone' and matkhau = '$password' ");
        
            if (mysqli_num_rows($rs1) == 1 || mysqli_num_rows($rs2) == 1 ) {
                if (mysqli_num_rows($rs1) == 1){
                    return 1;
                }else {
                    return 2;
                }
            } else{
                return 0;
              }
           
    }
        public static function sendOTP ($phone) {
            require("SpeedSMSAPI.php"); // API của nhà cung cấp speed SMS
            //Init class SpeedSMSAPI and param is api access token
            $smsAPI = new SpeedSMSAPI("zcbZz2sPB1M5vPR5QSSQhmBT1Q77FoqE");
            $phones = [$phone]; //Receiver (String type)
            $type = 5;
            /*
                sms_type có các giá trị như sau:
                2: tin nhắn gửi bằng đầu số ngẫu nhiên
                3: tin nhắn gửi bằng brandname
                4: tin nhắn gửi bằng brandname mặc định (Verify hoặc Notify)
                5: tin nhắn gửi bằng app android
            */
            $sender = "51c00adf2323732b"; //sender is device Id of android app 
            // In this case, I send by my android phone with phone number is: 0397995835
            $OTP = mt_rand(0, 999999);
            $OTP = account::add0Digit($OTP);
            session_start();
            $_SESSION["OTP"] = $OTP;
            $content = "Ma OTP xac thuc dang ky tai khoan cua ban la: $OTP";
            // $response = $smsAPI->sendSMS($phones, $content, $type, $sender); //Send OTP
        }

        //In case, the random number has less than 6 digits, we must add 0 digits before that number.
        // Eg: OTP = 23 -> 000023
        public static function add0Digit ($num) {
            $len = strlen((string)$num);
            for ($i = 0; $i < (6-$len); $i++) {
                $num = "0" . $num;
            }
            return $num;
        }

        //Check whether OTP is correct
        public static function verifyOTP ($otp) {
            session_start();
            if ($_SESSION["OTP"] == $otp)
                return true;
            return false;
        }

        //Sign up the account
        public static function createAccount ($phone, $password, $fullname, $dateofbirth, $passport, $national, $email) {
            $conn = connection::connectToDatabase ();
            $sql = "INSERT INTO `KHACHHANG` (sdt, matkhau, hoten, ngaysinh, cccd_passport, quoctich, email) VALUES ('$phone', '$password', '$fullname', '$dateofbirth', '$passport', '$national', '$email')";

            $result = $conn->query($sql);
            return $result;
        }
        
    }
?>
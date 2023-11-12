<?php
require_once('../model/Flight.php');
    session_start ();
    class FlightManagerControler {
        public static function invoke () {
            $result = Flight::getAllTicket();
            die (json_encode (array('code' => 0, 'data' => $result)));
        }
      
        public static function getflight() {
            $result = Flight:: getflight();
            die (json_encode (array('code' => 0, 'data' => $result)));
        }

        public static function historyTicket () {
            $result = Flight::getHistoryTicket();
            die (json_encode (array('code' => 0, 'data' => $result)));
        }
        public static function getRevenue($datein,$dateout) {
            $result = Flight::getRevenue($datein,$dateout);
            die (json_encode (array('code' => 0, 'data' => $result)));
        }
        public static function getInforHistory($idBooking) {
            $result = Flight::getInforHistory($idBooking);
            die (json_encode (array('code' => 0, 'data' => $result)));
        }
        public static function addflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair,$IdArrivalAir) {
            Flight::addflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair,$IdArrivalAir);
        }
        public static function editflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair){
            Flight::editflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair);
        }
        public static function getAir(){
            $result = Flight::getAir();
            die (json_encode (array('code' => 0, 'data' => $result)));
        }

    }

    $tikCtr = new FlightManagerControler();

    if (isset($_GET['action']) && $_GET['action'] == "getAllTicket") {
        $tikCtr -> invoke ();
    }
    if (isset($_GET['action']) && $_GET['action'] == "getflight") {
        $tikCtr -> getflight();
    }
    if (isset($_GET['action']) && $_GET['action'] == "gethistoryTicket") {
        $tikCtr -> historyTicket ();
    }
    if (isset($_GET['datein']) && $_GET['dateout']) {
        $tikCtr -> getRevenue($_GET['datein'],$_GET['dateout']);
    }
    if (isset($_GET['action']) && $_GET['action'] == "getInforHistory") {
        $idBooking = $_GET['idbooking'];
        $tikCtr -> getInforHistory($idBooking);
    }

    if (isset($_GET['action']) && $_GET['action'] == "addFlight") {
        $idFlight = $_POST['machuyenbay']; 
        $airName = $_POST['tenmaybay'];
        $flightDate = $_POST['ngaydi'];
        $landingDay = $_POST['ngayden'];
        $Iddepartureair = $_POST['masanbaydi'];
        $IdArrivalAir = $_POST['masanbayden'];
        if($idFlight==''||$airName==''||$flightDate==''|| $landingDay==''||$Iddepartureair==''||$IdArrivalAir ==''){
            echo '<script>alert("Vui lòng nhập đủ thông tin")</script>';
        }
        if($Iddepartureair ==  $IdArrivalAir){
            echo '<script>alert("Mã sân bay đi phải khác mã sân bay đến")</script>';
        }
        else{
            $tikCtr -> addflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair,$IdArrivalAir);
            header('location:../view/flightManager.php');
        }
        
    }
    if (isset($_GET['action']) && $_GET['action'] == "editFlight") {
        $idFlight = $_POST['machuyenbay']; 
        $airName = $_POST['tenmaybay'];
        $flightDate = $_POST['ngaydi'];
        $landingDay = $_POST['ngayden'];
        $Iddepartureair = $_POST['masanbaydi'];
        $$IdArrivalAir = $_POST['masanbayden'];
        if($idFlight==''||$airName==''||$flightDate==''|| $landingDay==''||$Iddepartureair==''||$IdArrivalAir==''){
            echo '<script>alert("Vui lòng nhập đủ thông tin")</script>';
        }
        if($Iddepartureair ==  $IdEndAir){
            echo '<script>alert("Mã sân bay đi phải khác mã sân bay đến")</script>';
        }else{
            $tikCtr -> editflight($idFlight,$airName,$flightDate,$landingDay,$Iddepartureair);
            header('location:/FlightTeam/view/flightManager.php');
        }
    }
    if (isset($_GET['action']) && $_GET['action'] == "getAir") {
        $tikCtr -> getAir();
    }

?>

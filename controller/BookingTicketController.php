<?php
require_once("../model/account.php");
require_once("../model/FLight.php");
class BookingTicketController
{
// public function 
    public static function searchFlight ($startPlace, $endPlace,  $startDate) {
        $result = Flight::searchFlight($startPlace, $endPlace, $startDate);
        die (json_encode (array('code' => 0, 'data' => $result)));
    }
}


$bookCtr = new BookingTicketController();
session_start();
$_SESSION['startPlace'] = 'HAN';
$_SESSION['endPlace'] = "2";
$_SESSION['typeTicket'] = "2";
$_SESSION['startDate'] = "2022-11-11";
$_SESSION['Numpassenger'] = "";
if (isset($_GET['action']) && isset($_GET['action']) == "searchFlight") {
    if (isset($_SESSION['startPlace']) && isset($_SESSION['endPlace']) && isset($_SESSION['typeTicket']) && isset($_SESSION['startDate']) && isset($_SESSION['Numpassenger'])) {
        $endDate = "";
        if (isset($_SESSION['endDate'])) {
            $time = strtotime($_SESSION['endDate']);
            if ($time) {
                $endDate = date('Y/m/d', $time);
            }
        }
        $bookCtr->searchFlight($_SESSION['startPlace'], $_SESSION['endPlace'], $_SESSION['startDate']);
    }
    else { 
        die (json_encode(array('code' => 1)));
    }
}
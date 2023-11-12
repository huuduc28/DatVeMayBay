<?php
require_once("../model/account.php");
class AccountController {
    // public function 

    public static function checkDuplPhone ($phone) {
        return account::checkDuplicatePhone($phone);
    } 
    public static function checkSignin ($phone, $password) {
        return account::checkSignIn ($phone, $password);
    }
    public static function sendOTP ($phone) {
        try {
            account::sendOTP($phone);
            die("success");
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage().  "\n");
        }
    }

    public static function verifyOTP ($otp) {
        die(account::verifyOTP($otp) ? "true" : "false");
    }

    public static function createAccount ($phone, $password, $fullname, $dateofbirth, $passport, $national, $email) {
        $rel = account::createAccount($phone, $password, $fullname, $dateofbirth, $passport, $national, $email);
    }
}

$accContrl = new AccountController();
if (isset($_POST['phone']) && isset($_POST['password']) ){
    $signin = $accContrl->checkSignIn($_POST['phone'], $_POST['password']);
    if ($signin == 1){
        die($signin == 1 ? "true" : "false");
    }
    if ($signin == 2){
        die($signin == 2 ? "0" : "1");
    }
}
if (isset($_POST['phone'])) {
    $rel = $accContrl->checkDuplPhone($_POST['phone']);
    if ($rel == false) {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            session_start();
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone'] = $_POST['phone'];
        }
    }
    die($rel ? "true" : "false");
}

if (isset($_POST['phone_verify'])) {
    $accContrl->sendOTP($_POST['phone_verify']);
}

if (isset($_POST['verify_OTP'])) {
    $accContrl->verifyOTP($_POST['verify_OTP']);
}

if (isset($_POST['saveAcc'])) {
    if (isset($_POST['password'])) {
        $date = "";
        $passport = "";
        $nation = "";
        session_start();
        if (isset($_POST['dateOfBirth'])) {
            $time = strtotime($_POST['dateOfBirth']);
            if ($time) {
                $date = date('Y/m/d', $time);
            }
        }
     
        if (isset($_POST['passport'])) {
            $passport = $_POST['passport'];
        }

        if (isset($_POST['nationality'])) {
            $nation = $_POST['nationality'];
        }
        echo $accContrl->createAccount ($_SESSION['phone'], $_POST['password'], $_SESSION['name'], $date, $passport, $nation, $_SESSION['email']);
        echo " <script> location.href = '../view/signin.php'; </script>";
    }
}
?>
<?php
// $num = mt_rand(0, 999999);
// function add0Digit ($num) {
//     $len = strlen((string)$num);
//     for ($i = 0; $i < (6-$len); $i++) {
//         $num = "0" . $num;
//     }
//     return $num;
// }
// echo add0Digit($num);

session_start();
$_SESSION['num'] = mt_rand(0, 999999);
echo $_SESSION['num'];
?>
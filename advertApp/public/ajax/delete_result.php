<?php 

require $_SERVER["DOCUMENT_ROOT"].'/advertApp/boot/boot.php';

use Classes\Advertisment;

session_start();

$userName=$_SESSION['UserData']['Username'];
$advId = $_POST['advId'];

$advert = new Advertisment();

$deleteAdd = $advert->removeAdvert($advId, $userName);

?>
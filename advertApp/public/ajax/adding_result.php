<?php 

require $_SERVER["DOCUMENT_ROOT"].'/advertApp/boot/boot.php';

use Classes\Advertisment;

session_start();

$valid = FALSE;

$userName=$_SESSION['UserData']['Username'];
$price = $_REQUEST['price'];
$area = $_REQUEST['area'];
$availableFor = $_REQUEST['availableFor'];
$squareMeters = $_REQUEST['squareMeters'];


$advert = new Advertisment();

// add an advert 

$addAdvert = $advert->addAdvert($userName, $price, $area, $availableFor, $squareMeters);

?>

<div class="advert">
	<div class="advert-text">
		<p><?php echo $_REQUEST['area'];?>, <?php echo $_REQUEST['availableFor'];?>, 
		<?php echo $_REQUEST['price'];?> ευρώ, <?php echo $_REQUEST['squareMeters'];?> τ.μ.</p>
	</div>
	<div class="delete-container">
		<button type="button" class="delete-btn" id="<?php echo $userAd['adv_id'];?>"><i class="far fa-trash-alt"></i> Διαγραφή</button>
	</div>
</div>

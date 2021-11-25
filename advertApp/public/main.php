<?php 

require $_SERVER["DOCUMENT_ROOT"].'/advertApp/boot/boot.php';

session_start(); 
if(!isset($_SESSION['UserData']['Username'])){
	header("location:index.php");
	exit;
}

use Classes\Advertisment;

//REQUEST PARAMETERS
$userName= $_SESSION['UserData']['Username'];
$price = '';
$area = '';
$availableFor = '';
$squareMeters = '';

if(isset($_REQUEST['price'])) {
	if ((intval($_REQUEST['price']) < 50) || (intval($_REQUEST['price']) > 5000000)) {
	$price = '';
	} else {
	$price = $_REQUEST['price'];
	}
}

if(isset($_REQUEST['squareMeters'])) {
	if ((intval($_REQUEST['squareMeters']) < 20) || (intval($_REQUEST['squareMeters']) > 1000)) {
	$squareMeters = '';
	} else {
	$squareMeters = $_REQUEST['squareMeters'];
	}
}

// GET ADVERTS BY USER
$advert = new Advertisment();
$allAdverts = $advert->getAdvert($userName);


?>		


<!DOCTYPE html>
<html>

	<head>
		<meta name="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="robots" content="noindex,nofollow">
	    <title>Σύστημα Διαχείρισης Αγγελιών</title>
	    <link href="styles.css" type="text/css" rel="stylesheet">
	    <link href="assets/CSS/all.min.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="assets/scripts/addAnAdvert.js"></script>
	    <script src="assets/scripts/deleteAnAdvert.js"></script>
	    <script src="assets/scripts/formValidation.js"></script>
	</head>

	<body>
		<div id="container">

			<!-- APPLICATION HEADER-->
			<div class="header">
				<p>Σύστημα διαχείρισης αγγελιών (καλώς ήλθες <?php echo $userName ?>)
				<span id="Logout"> <a href="logout.php"><i class="fas fa-sign-out-alt"> Αποσύνδεση</i></a></span></p>
			</div>
			<div class="main-content">

				<!-- ADVERT ADVERT DATA FORM - LEFT SIDE -->
				<div class="left-aside">
					<div class="form-container">
						<form id="advForm" class="advForm" name="advForm" autocomplete="off" method="post" action="reAdvert.php">
							<div class="form-group">
								<div class="label-container">
									<label for="price">Τιμή:</label>
								</div>
								<div class="form-control success">
									<input id="price" class="form-field" type="text" name="price" autocomplete="off" 
									pattern="^[0-9]*$" onkeypress="return isNumber(event)" required >
			                    	<small>Error message</small>
			                    </div>
			            	</div>
			            	<div class="form-group">
			            		<div class="label-container">
			            			<label for="area">Περιοχή:</label>
			            		</div>
								<div class="form-control">
									<select id="area" class="area" name="area" required>
										<option value="" selected="true" hidden="true"></option>
										<option value="Αθήνα">Αθήνα</option>
										<option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
										<option value="Πάτρα">Πάτρα</option>
										<option value="Ηράκλειο">Ηράκλειο</option>
									</select>
			                    	<small>Error message</small>
			                    </div>
			            	</div>
			            	<div class="form-group">
			            		<div class="label-container">
			            			<label for="availableFor">Διαθεσιμότητα:</label>
			            		</div>
								<div class="form-control">
									<select id="availableFor" class="availableFor" name="availableFor" required>
										<option value="" selected="true" hidden="true"></option>
										<option value="Ενοικίαση">Eνοικίαση</option>
										<option value="Πώληση">Πώληση</option>
									</select>
			                    	<small>Error message</small>
			                    </div>
			            	</div>
			            	<div class="form-group">
			            		<div class="label-container">
									<label for="squareMeters">Τετραγωνικά:</label>
								</div>
								<div class="form-control">
									<input id="squareMeters" class="form-field" type="text" name="squareMeters" autocomplete="off" 
									pattern="^[0-9]*$" onkeypress="return isNumber(event)" required>
			                    	<small>Error message</small>
			                    </div>
			            	</div>
			            	<div class="form-group">
			            		<button id="add-btn" class="form-field" type="submit">Προσθήκη</button>
			        		</div>
						</form>
					</div>
				</div>

				<!--RIGHT SIDE ADVERT LIST-->
				<div class="right-content">
					<h4>Λίστα αγγελιών</h4>
					<div class="ad-container" id="adContainer">
						<?php 
	                        foreach ($allAdverts as $userAd) {
	                    ?>
						<div class="advert">
							<div class="advert-text">
								<p><?php echo $userAd['area'];?>, <?php echo $userAd['available_for'];?>, 
								<?php echo $userAd['price'];?> ευρώ, <?php echo $userAd['square_meters'];?> τ.μ.</p>
							</div>
							<div class="delete-container">
								<button type="button" class="delete-btn" id="<?php echo $userAd['adv_id'];?>"><i class="far fa-trash-alt"></i> Διαγραφή</button>
							</div>
						</div>
						<?php        
	                        }
	                    ?>
	                </div>
				</div>
			</div>

			<!-- APPLICATION FOOTER -->
			<div class="footer">
				<p>All rights reserved</p>
			</div>

		</div>
	</body>
</html>
<?php 

require $_SERVER["DOCUMENT_ROOT"].'/advertApp/boot/boot.php';

// START SESSION
session_start();

$check = 1;

// CHECK LOGIN FORM SUBMITTED
if(isset($_POST['Submit'])){

	$users = array('Kostas' => 'password','John' => '12345678');

	$userName = isset($_POST['username']) ? $_POST['username'] : '';

	$pwd = isset($_POST['password']) ? $_POST['password'] : '';

	if (isset($users[$userName]) && $users[$userName] == $pwd){

		$check = 1;
		$_SESSION['UserData']['Username'] = $userName;
		$check = true;
		header("location:main.php");
		exit;
	} else {
		$check = 0;
	}
}	 


?>

<!DOCTYPE html>
<html>

	<head>
		<meta name="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="robots" content="noindex,nofollow">
	    <title>Eίσοδος στο σύστημα</title>
	    <link href="styles.css" type="text/css" rel="stylesheet">
	    <link href="assets/CSS/all.min.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="assets/scripts/formValidation.js"></script>


	</head>

	<body>
		
		<div id="container">

			<!-- APPLICATION  HEADER-->
			<div class="index-header">
				<p>Σύστημα διαχείρισης αγγελιών</p>
			</div>

			<div class="main-content">

			<!-- Real Estate Application Login Form - USER NOT LOGGED IN -->
				<div class="log-form">
					<h4>Είσοδος στο σύστημα</h4>
					<div class="error-message" style="visibility:<?php echo $check == '0'? 'none' : 'hidden'; ?>">
						<p>Μη έγκυρο όνομα χρήστη ή κωδικός πρόσβασης!</p>
					</div>
					<form id="loginForm" class="loginForm" name="loginForm" autocomplete="off" method="post" action="">
						<div class="form-group">
							<div class="label-container">
								<label for="username">Όνομα:</label>
							</div>
							<div class="form-control">
								<input id="username" class="form-field" type="text" name="username" autocomplete="off" >
		                    </div>
		            	</div>
		            	<div class="form-group">
		            		<div class="label-container">
		            			<label for="password">Κωδικός:</label>
		            		</div>
		            		<div class="form-control">
		                		<input id="password" class="form-field" type="password" name="password" autocomplete="off">
		            		</div>       
		       			</div>
		       			<div class="form-group">
		            		<input name="Submit" id="submit-btn" class="form-field" type="submit" value="Σύνδεση">
		        		</div>

					</form>
				</div>
			</div>

			<!-- APPLICATION FOOTER -->
			<div class="footer">
				<p>All rights reserved</p>
			</div>

		</div>

	</body>
</html>






				
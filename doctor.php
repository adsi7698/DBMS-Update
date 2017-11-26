<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SABS - Doctor Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap and jQuery standard library files --><!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!-- CAUTION: DO NOT EDIT THESE FILES -->
	<!-- Offline version of the above files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>

	<?php

	if(isset($_GET['cancel']) && $_GET['cancel'] == 'error') {
		echo '
			<script>
				$(document).ready(function(){
					$("#errorCancelModal").modal();
				});
			</script>';
	}

    if(isset($_GET['cancel']) && $_GET['cancel'] == 'success') {
		echo '
			<script>
				$(document).ready(function(){
					$("#successfulCancelModal").modal();
				});
			</script>';
	}

	if (isset($_SESSION['doctorLogin']) && $_SESSION['doctorLogin']) {

		//display doctor logged in modal
		echo '
			<script>
				$(document).ready(function(){
					$("#doctorLoggedInModal").modal();
				});
			</script>';
		$_SESSION['doctorLogin'] = 0;
	}

	if (isset($_SESSION['doctorLogout']) && $_SESSION['doctorLogout']) {

		//display doctor logged out modal
		echo '
			<script>
				$(document).ready(function(){
					$("#doctorLoggedOutModal").modal();
				});
			</script>';
		$_SESSION['doctorLogout'] = 0;
	}

	?>

	<style>
		.bg-1 {
			background-color: #1abc9c; /* Green */
			color: #ffffff;}

		.bg-2 {
			background-color: #99ffcc; /* Green */
			color: #ffffff;}

		.bg-3 {
			background-color: #80ffff; /* Green */
			color:black;}
	</style>

</head>
<body>
	<!-- Error Cancel  Modal -->
	<div id="errorCancelModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Error!</h3>
				</div>
				<div class="modal-body">
					<h4>Error in Cancelling appointment!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>


	<!-- Successful Cancel  Modal -->
	<div id="successfulCancelModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Success!</h3>
				</div>
				<div class="modal-body">
					<h4>Appointment Cancelled!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Doctor Logged In Modal -->
	<div id="doctorLoggedInModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Welcome!</h3>
				</div>
				<div class="modal-body">
					<h4>You are logged in!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Doctor Logged Out Modal -->
	<div id="doctorLoggedOutModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Bye!</h3>
				</div>
				<div class="modal-body">
					<h4>You are logged out!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Bootstrap Navigation Bar Top -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarTop">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="doctor.php">Smart Appointment Booking System</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbarTop">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">For Patients</a></li>
					<li class="navbar-text"> </li>
					<li class="active"><a href="doctor.php">For Doctors</a></li>
					<li class="navbar-text"> </li>

					<?php

					if (isset($_SESSION['doctorID'])) {

						//logged in
						echo '
							<li><a href="doctor/profile.php">My Profile</a></li>
							<li class="navbar-text"> </li>
							<li><a href="includes/doctor-logout.php">Log Out</a></li>';
					}
                    else {

						//not logged in
						echo '
							<li><a href="doctor/login.php">Log In</a></li>
							<li class="navbar-text"> </li>
							<li><a href="doctor/signup.php">Sign Up</a></li>';
					}

					?>

					<li class="navbar-text"> </li>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-inverse" style="margin-bottom: 0;"></nav>

	<div class="row bg-1">
    <div class="col-xs-12 col-sm-6 cushion-left text-container">
          <h1 class="h1 col-xs-12 clear-left"><strong><basefont><em>SABS</em></basefont></strong></h1>
          <div class="clearfix"></div>
        <h2 class="h2 col-xs-11 clear-left">Get hold of the smart & effortless appointment management system and deliver better patient care! </h2>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
        <div class="text h3 col-xs-12 col-sm-12 clear-left"> Take your practice to new heights where you don't just get new patients but also enhance your credibility.<br> Manage your practice efficiently, engage with patients to offer them a premium experience, or increase your visibility online.</div>
      <div class="clearfix"></div>
    </div>
     <div class="desktop image-container  col-xs-12 col-sm-6 cushion-right
       screenshot-sticky-wrap ">
        <img class=" desktop" alt="SABS"
        title="SABS for doctors" src= "https://www.practo.com/providers/static/images/pages/doctors/banner.png"/>
    </div>
  </div>

<hr>
<div class="row bg-2">
    <div class="col-xs-12 col-sm-6  text-container">
          <h1 class="h1 col-xs-12 clear-left"><strong><basefont><em>SABS PROFILE</em></basefont></strong></h1>
        <h2 class="h2 col-xs-11 clear-left">HELP PATIENTS TO FIND THEIR DOCTOR</h2>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
        <div class="text h3 col-xs-12 col-sm-12 clear-left"> Be a part of the digital revolution happening in healthcare in India. Inform patients about your expertise, experience, educational qualifications etc and let your patients get to know you better.</div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
      <br>
      <br>
      <div class="text-left">
      <a href="doctor/signup.php" class="btn btn-default  btn-lg">Sign up</a>
      </div>

    </div>

     <div class="desktop image-container  col-xs-12 col-sm-6 cushion-right
       screenshot-sticky-wrap ">
        <img class=" desktop" alt="SABS"
        title="SABS for doctors" src= "images/doc1.jpg"/>
    </div>
  </div>
 
<hr>
<div class="row ">
    <div class="col-xs-12 col-sm-6  text-container">
          <h1 class="h1 col-xs-12 clear-left text-primary"><strong><basefont><em>SABS Consult</em></basefont></strong></h1>
        <h2 class="h2 col-xs-11 clear-left text-primary">STAY CONNECTED TO YOUR PATIENTS 24X7! </h2>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
        <div class="text h3 col-xs-12 col-sm-12 clear-left text-info"> ~ Paperless medical records and appointment management that saves you a lot of time and energy.<br><br>~ View patients' details even when they are not in the clinic.<br><br>~ Confirm or cancel an appointment according to your convenience. </div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>

    </div>

     <div class="desktop image-container  col-xs-12 col-sm-6 cushion-right
       screenshot-sticky-wrap ">
        <img class=" desktop" alt="SABS"
        title="SABS for doctors" src= "images/doc.jpg"/>
    </div>
  </div>
 
<hr>
<div class="row bg-3">
    <div class="col-xs-12 col-sm-6  text-container">
          <h1 class="h1 col-xs-12 clear-left "><strong><basefont><em>HEALTH FEEDS</em></basefont></strong></h1>
        <h3 class="h2 col-xs-11 clear-left">EDUCATE AND CREATE AWARENESS</h3>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
        <div class="text h3 col-xs-12 col-sm-12 clear-left"> Share your knowledge and experience with the patients and help them heal at home. Post health tips daily to educate and inspire people to lead a healthier lifestyle and strengthen people's trust in you.</div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>

    </div>

     <div class="desktop image-container  col-xs-12 col-sm-6 cushion-right
       screenshot-sticky-wrap ">
        <img class=" desktop" alt="SABS"
        title="SABS for doctors" src= "images/healthfeed.jpg" width="600" />
    </div>
  </div>

	<?php
		include_once 'includes/footer.php';
	?>

</body>
</html>

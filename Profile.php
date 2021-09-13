<?php
require('php/Main/session.php');
require('php/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		@media only screen and (max-width: 620px) {
		  /* For mobile phones: */
		 * {
		    width: 100%;
		  }
		}
	</style>
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom2.js"></script>
</head>
<?php	confirm_logged_in();	?>

<?php        
$sql = "SELECT * FROM `user_tb` WHERE `userID` ='" . $_SESSION['MEMBER_ID']."';";
$result = mysqli_query($conn, $sql);

if ($result){
	$numrows = mysqli_num_rows($result);
	if ($numrows == 1) {
		$found_user  = mysqli_fetch_array($result);
	} else {
	?>    <script type="text/javascript">
		alert("Get Data Failed! Contact Your administrator.");
		</script>
	<?php
	}
 } else {
 die("Table Query failed: " );
}

?>


<body>
<div id="overlayForMassage" class="overlayMsg">
	<div class="overlayBox">
		<h2 id="overlayContent" class="">This is the overlay content.</h2>
	</div>
</div>
<!--preloading-->
<!-- <div id="preloader">
    <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div> -->
<!--end of preloading-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
			<div class="navbar-header logo">
			    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				    <span class="sr-only">Toggle navigation</span>
				    <div id="nav-icon1">
						<span></span>
						<span></span>
						<span></span>
					</div>
			    </div>
			    <a href="Home.html"><img class="logo" src="images/logo1.png" alt="" width="350" height="100"></a>
		    </div>
			<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav flex-child-menu menu-left">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li><a href="index.php">Home</a></li>
					<li class="dropdown first">
						<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
						My selections <i class="fa fa-angle-down" aria-hidden="true"></i>
						</a>
						<ul class="dropdown-menu level1">
							<li><a href="SuggestedMovies.php">Best Movies for me</a></li>
							<li><a href="SelectedMovies.php">My Favourit Movies</a></li>
							<li class="it-last"><a href="RejectedMovies.php">Rejected Movies</a></li>
						</ul>
					</li>
					<li class="dropdown first">
						<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
						Community <i class="fa fa-angle-down" aria-hidden="true"></i>
						</a>
						<ul class="dropdown-menu level1">
							<li><a href="userfavoritegrid.html">Users Feedback</a></li>
							<li class="it-last"><a href="userfavoritelist.html">User favorite list</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav flex-child-menu menu-right">
					<li class="dropdown first">
						<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
						Profile <i class="fa fa-angle-down" aria-hidden="true"></i>
						</a>
						<ul class="dropdown-menu level1">
							<li><a href="Profile.php">My Profile</a></li>
							<li class="it-last"><a href="php/Main/LogOut.php">Sign Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
	    </nav>
	    
	</div>
</header>
<!-- END | Header -->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>User Profile</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-9 col-sm-push-1">
				<div class="form-style-1 user-pro" action="#">
					<div class="user-information">
						<div class="user-img">
							<img id="output" src="<?php echo $_SESSION['IMG_URL']; ?>" alt="Avatar" style="vertical-align:middle; width:100px; height:100px; border-radius:50%;"><br>
							<input type="file" accept="image/jpeg, image/png" name="fileToUpload"  onchange="updateDP(event);" id="saveProfileImg" style="display: none;">
							<label for="saveProfileImg" class="redbtn" id="upload_link" style="cursor: pointer;color: white;">Upload Image</label>
						</div>
					</div>
					<br>
					<h4>User Details :</h4>
					<div class="row">
						<div class="col-md-12 form-it">
							<label class="col-md-3">Name : </label>
							<labelData class="col-md-6"><?php echo $found_user['fName'].' '.$found_user['lName'] ?></labelData>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-it">
							<label class="col-md-3">Email Address : </label>
							<labelData class="col-md-6"><?php echo $found_user['email'] ?></labelData>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-it">
							<label class="col-md-3">Telephone : </label>
							<labelData class="col-md-6"><?php echo $found_user['tpNo'] ?></labelData>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-it">
							<label class="col-md-3">Country : </label>
							<labelData class="col-md-6"><?php echo $found_user['Country'] ?></labelData>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-it">
							<label class="col-md-3">Date Of Birth : </label>
							<labelData class="col-md-6"><?php echo $found_user['dob'] ?></labelData>
						</div>
					</div>
					<br>
					<h4>You Can Change Account Details Below...</h4>
					<div class="user-information">
						<label>Change Password</label>
						<div class="row">
							<div class="col-md-11">
								<div class="col-md-10">
									<input type="Password" placeholder="Old Password" name="old_password" id="old_password" />
								</div>
								<div class="col-md-10">
									<input type="Password" placeholder="New Password" name="new_password" id="new_password" />
								</div>
								<div class="col-md-10">
									<input type="Password" placeholder="Confirm Password" name="con_newpassword" id="con_newpassword" />
								</div>
							</div>
							<div class="col-md-1">
								<input id="savePassword" type="submit" class="savepw" onClick="return updatePW();" value="✓" />
							</div>
						</div>
						<br>
						<div id="message"></div>
						<label>Change Telephone Number</label>
						<div class="row">
							<div class="col-md-11">
								<div class="col-md-12">
									<input type="text" placeholder="eg:- 0711234567" name="newtpno" id="updatetpno" >
								</div>
							</div>
							<div class="col-md-1">
								<input id="saveTP" class="savepw" type="submit" name="savetpno" onClick="return updateTP();" value="✓">
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                 <a href="index.php"><img class="logo" src="images/logo1.png" alt=""></a>
                 <p>BestMovie.com<br>
                 Polpala, Olaganduwa, Alawwa.</p>
                <p>Call us: <a href="#">(+94) 711 234 5678</a></p>
            </div>
            <div class="flex-child-ft item1">
                <h4>Profile</h4>
                <ul>
                    <li><a href="#">My Profile</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item2"></div>
            <div class="flex-child-ft item3"></div>
            <div class="flex-child-ft item4">
                <h4>About</h4>
                <ul>
                    <li><a href="#">About Us</a></li> 
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item5"></div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->

</body>
<script src="js/custom.js"></script>

<!-- userfavoritelist14:04-->
</html>
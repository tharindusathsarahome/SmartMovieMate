
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<style>


@media only screen and (max-width: 620px) {
  /* For mobile phones: */
 * {
    width: 100%;
  }
}
	</style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body >
<div style="width:auto;height:auto;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-10 p-b-40">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-50">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="images/avatar-01.jpg" alt="AVATAR" style="max-width:100%;height:auto;">
					</span><br><br>
						<h4>Enter Your Favourite Movies Below...</h4>
						<div>
							<div>
								
								<label><div id="numberI">Film List : 10 Remaining...</div></label>
								<br>
								
						    <div id="filterChipsContainer" class="chip-group" style="display:inline-flex;">
						    </div><br><br>

						    <div class="col-sm-9 col-md-6 col-lg-8" style="display:inline-flex;">
						      <input class="form-control form-control-lg inputtxt"  style="width:290px" list="nameList" name="movieList" aria-labelledby="addFilterBtn" id="addFilterTxt" type="text" placeholder="Add Movie..." />&nbsp;&nbsp;
						      <button class="login100-form-btn btn" type="button" aria-label="Add filter" id="addFilterBtn" value="new" onclick="selectData();" >Add</button>
						    </div><br><br><br>
							<div class="col-md-10" style="position:relative;margin-top:-45px;">
							 <div class="list-group" id="show-list" >
							 </div>	
							</div>

							</div>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" id="subbut"  >
								ADD MOVIE
							</button>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="saveData"></div>
<div id="res"></div>
<script src="js/min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	






</body>
</html>
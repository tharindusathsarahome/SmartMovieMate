<?php require('php/Main/session.php');?>

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
	<style>
		@media only screen and (max-width: 620px) {
		  *{
		    width: 100%;
		  }
		}
	</style>
</head>
<?php	confirm_logged_in();	?>

<body>
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
			    <a href="index.php"><img class="logo" src="images/logo1.png" alt="" width="350" height="100"></a>
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
							<li><a href="#">Users Feedback</a></li>
							<li class="it-last"><a href="#">User favorite list</a></li>
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
					<h1>Your New Suggested Movies</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single userfav_list">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-3">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="<?php echo $_SESSION['IMG_URL']; ?>" alt="Avatar" style="vertical-align:middle; width:120px; height:120px; border-radius:50%;"><br></a>
						<!-- <a href="#" class="redbtn">Change avatar</a> -->
						<ul>
							<li><a href="Profile.php">My Profile</a></li>
						</ul>
					</div>

					<div class="user-fav">
						<p>My Places</p>
						<ul>
							<li class="active"><a href="SuggestedMovies.php">> New Suggessions</a></li>
							<li><a href="SelectedMovies.php">&nbsp My Selected Movies</a></li>
							<li><a href="RejectedMovies.php">&nbsp My Rejected Movies</a></li>
							<li><a href="#">&nbsp My Feedback</a></li>
							<li><a href="#">&nbsp Community</a></li>
						</ul>
					</div>
				</div>
			</div>


				<div class="col-md-9">
				<!-- <div class="topbar-filter user">
					<p>Found <span>1,608 movies</span> in total</p>
					<label>Sort by:</label>
					<select>
						<option value="range">-- Choose option --</option>
						<option value="saab">-- Choose option 2--</option>
					</select>
					<a href="userfavoritelist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
					<a  href="userfavoritegrid.html" class="grid"><i class="ion-grid "></i></a>
				</div> -->
			<!-- FILTER BOX >> it should set to left corner -->
				<div class="flex-wrap-movielist user-fav-list">

				<div class="movie-item-style-2">
						<img src="images/uploads/mv1.jpg" alt="">
						<div class="mv-item-infor">
							<h6><a href="moviesingle.php">oblivion <span>(2012)</span></a></h6>
							<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							<p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
							<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
							<p>Director: <a href="#">Joss Whedon</a></p>
							<p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
						</div>
					</div>
					
					<div class="movie-item-style-2">
						<img src="images/uploads/mv2.jpg" alt="">
						<div class="mv-item-infor">
							<h6><a href="moviesingle.php">into the wild <span>(2014)</span></a></h6>
							<p class="rate"><i class="ion-android-star"></i><span>7.8</span> /10</p>
							<p class="describe">As Steve Rogers struggles to embrace his role in the modern world, he teams up with a fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle a new threat...</p>
							<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
							<p>Director: <a href="#">Anthony Russo,</a><a href="#">Joe Russo</a></p>
							<p>Stars: <a href="#">Chris Evans,</a> <a href="#">Samuel L. Jackson,</a> <a href="#">  Scarlett Johansson</a></p>
						</div>
					</div>
					
					<div class="movie-item-style-2">
						<img src="images/uploads/mv1.jpg" alt="">
						<div class="mv-item-infor">
							<h6><a href="moviesingle.php">oblivion <span>(2012)</span></a></h6>
							<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							<p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
							<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
							<p>Director: <a href="#">Joss Whedon</a></p>
							<p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
						</div>
					</div>
					
					<div class="movie-item-style-2">
						<img src="images/uploads/mv2.jpg" alt="">
						<div class="mv-item-infor">
							<h6><a href="moviesingle.php">into the wild <span>(2014)</span></a></h6>
							<p class="rate"><i class="ion-android-star"></i><span>7.8</span> /10</p>
							<p class="describe">As Steve Rogers struggles to embrace his role in the modern world, he teams up with a fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle a new threat...</p>
							<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
							<p>Director: <a href="#">Anthony Russo,</a><a href="#">Joe Russo</a></p>
							<p>Stars: <a href="#">Chris Evans,</a> <a href="#">Samuel L. Jackson,</a> <a href="#">  Scarlett Johansson</a></p>
						</div>
					</div>
					
				</div>		
<!-- 				<div class="topbar-filter">
					<label>Movies per page:</label>
					<select>
						<option value="range">5 Movies</option>
						<option value="saab">10 Movies</option>
					</select>
					
					<div class="pagination2">
						<span>Page 1 of 2:</span>
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">...</a>
						<a href="#">78</a>
						<a href="#">79</a>
						<a href="#"><i class="ion-arrow-right-b"></i></a>
					</div>
				</div> -->
			<!-- FILTER BOX >> it should set to left corner -->
			</div>

                <!-- <div class="col-md-7">
                    <div class="ads">
                        <img src="images/uploads/ads3.png" alt="">
                    </div>
                </div> -->
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

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- userfavoritelist14:04-->
</html>
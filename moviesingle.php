
<?php 
require('php/Main/session.php');
require('php/imdbphp/bootstrap.php');
require('php/dbconn.php');

// if (isset ($_GET["mid"])) {
  $config = new \Imdb\Config();
  $config->language = 'en-US,en';
  $movObj = new \Imdb\Title(preg_replace('/MOV_/i', '', $_GET["M_ID"]),$config);

  confirm_logged_in();

  if(isset($_GET['M_ID'])){
	  $mov_id= $_GET['M_ID'];

	  $sql = "SELECT * FROM trailer_tb 
	  INNER JOIN sinahasub_tb 
	  ON trailer_tb.movie_tb_movieID=sinahasub_tb.movie_tb_movieID 
	  INNER JOIN download_tb 
	  ON trailer_tb.movie_tb_movieID=download_tb.movie_tb_movieID 
	  WHERE trailer_tb.movie_tb_movieID='$mov_id'";

	  $movie = mysqli_fetch_array($conn->query($sql));
  }else{
	  echo '<script>alert("DataBase Not Connected!")</script>';
  }
  
  $sql = "SELECT * FROM selectedmovie_tb WHERE userID='".$_SESSION['MEMBER_ID']."' AND movieID='$mov_id'";
  $move_found_f = (mysqli_fetch_array($conn->query($sql)) ? true : false); 

  $json_f=json_encode(["isFound"=>$move_found_f,"table"=>"1","movieID"=>$mov_id]); 

  $sql = "SELECT * FROM rejectedmovie_tb WHERE userID='".$_SESSION['MEMBER_ID']."' AND movieID='$mov_id'";
  $move_found_r = (mysqli_fetch_array($conn->query($sql)) ? true : false); 

  $json_r=json_encode(["isFound"=>$move_found_r,"table"=>"0","movieID"=>$mov_id]); 	      		    
  
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title><?php echo $movObj->title().' ('.$movObj->year().')' ?></title>
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
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom2.js"></script>
</head>

<body >

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

<div class="hero mv-single-hero">
	<div class="container">
	</div>
</div>

<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="movie-img <--sticky-sb-->">
					<?php
						if (($photo_url = $movObj->photo_localurl() ) != FALSE) {
							echo '<img src="'.$photo_url.'" alt="Cover">';
						} else {
							echo "No photo available";
						}
					?>
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div id="btn-trailer"><a href="<?php echo $movie['trailerURL'] ?>" class="item item-1 redbtn"><i class="ion-play"></i>Trailer</a></div>
							<div id="btn-trailer"><a href="<?php echo $movie['trailerURL'] ?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
						<div class="btn-transform transform-vertical yellow">
							<div id="btn-subtitle"><a href="<?php echo $movie['webUrl'] ?>" class="item item-1 yellowbtn"><i class="ion-card"></i>Subtitle</a></div>
							<div id="btn-subtitle"><a href="<?php echo $movie['webUrl'] ?>" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
						</div>
						<div class="btn-transform transform-vertical yellow">
							<div id="btn-download"><a href="<?php echo $movie['websiteUrl'] ?>" class="item item-1 yellowbtn"><i class="ion-card"></i>Download</a></div>
							<div id="btn-download"><a href="<?php echo $movie['websiteUrl'] ?>" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
						</div> 
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd"><?php echo $movObj->title() ?><span> <?php echo $movObj->year() ?> </span></h1>
					<div class="social-btn">

						<a  href="#" class="parent-btn<?php echo ($move_found_f)?" remove_favorite": (($move_found_r)?" to_favorite": " add_to_favorite"); ?>" id="add_to_favorite" onclick="return favourite();">
						<i class="ion-android-star"></i></a><div id="favouriteJ" style="display:none"><?php echo $json_f ?></div>

						<a href="#" class="parent-btn<?php echo ($move_found_r)?" remove_rejected": (($move_found_f)?" to_rejected": " add_to_rejected"); ?>" id="add_to_rejected" onclick="return rejected();">
						<i class="ion-trash-a"></i></a><div id="rejectedJ" style="display:none"><?php echo $json_r ?></div>

						<!-- <div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
							</div>
						</div>		 -->
					</div>

					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span><?php echo (!empty($movObj->rating())) ? $movObj->rating() : '0'; ?></span> /10<br>
								<span class="rv">
									<?php
										$ratv = $movObj->votes();
										if (!empty($ratv)) {
											echo $ratv." Votes";
										}
									?>
								</span>
							</p>
						</div>
						<div class="rate-star">
							<p>IMDB Rating:  </p>
							<?php
								for ($x = 0; $x < round($movObj->rating()); $x++) {
									echo "<i class='ion-ios-star'></i>";
								}
								for ($x = 0; $x < (10-round($movObj->rating())); $x++) {
									echo "<i class='ion-ios-star-outline'></i>";
								}
							?>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links-2 tabs-mv">
								<li class="active"><a href="#overview">Overview</a></li>
								<li><a href="#reviews"> Reviews</a></li>                    
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-9 col-sm-12 col-xs-12">
											<?php
											$plot = $movObj->plot();
											if (!empty($plot)) {
												foreach($plot as $p) { 
													echo "<p>".$p."</p>"; 
												}
											}
											?>
											<div class="title-hd-sm">
												<h4>cast</h4>
												<!-- <a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a> -->
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">
												<?php
												$cast = $movObj->cast();	
												if (!empty($cast)) {
													for ($x = 0; $x < 5; $x++) {	
														$person = new \Imdb\Person($cast[$x]["imdb"],$config);
														?>
														<div class="cast-it">
															<div class="cast-left">
																<?php
																	if (($photo_url = $person->photo_localurl() ) != FALSE) {
																		echo '<img src="'.$photo_url.'" width="10%" height="10%" alt="Cover">';
																	} else {
																		echo "No photo available";
																	}
																?>
																<a href="#"><?php echo $cast[$x]["name"] ?></a>
															</div>
															<p>...  <?php echo $cast[$x]["role"] ?></p>
														</div>
													<?php
													}
												}
												?>
											</div>
						            	</div>
						            	<div class="col-md-3 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Director: </h6>
												<?php
												$director = $movObj->director();
												if (!empty($director)) {
													for ($x = 0; $x < 5; $x++) { 
														if (isset($director[$x])) {
															echo "<p><a>".$director[$x]["name"]."</a></p>"; 
														} else {
															break;
														}
													}
												}
												?>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Writers: </h6>
												<?php
												$write = $movObj->writing();
												if (!empty($write)) {
													for ($x = 0; $x < 4; $x++) { 
														if(isset($write[$x])) {
															echo "<p><a>".$write[$x]["name"]."</a></p>"; 
														} else {
															break;
														}
													}
												}
												?>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Produced By: </h6>
												<?php
												$produce = $movObj->producer();
												if (!empty($produce)) {
													for ($x = 0; $x < 4; $x++) { 
														if(isset($produce[$x])) {
															echo "<p><a>".$produce[$x]["name"]."</a></p>"; 
														} else {
															break;
														}
													}
												}
												?>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Music: </h6>
												<?php
												$compose = $movObj->composer();
												if (!empty($compose)) {
													for ($x = 0; $x < 4; $x++) { 
														if(isset($compose[$x])) {
															echo "<p><a>".$compose[$x]["name"]."</a></p>"; 
														} else {
															break;
														}
													}
												}
												?>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Genres:</h6><p>
												<?php
												$genre = $movObj->genres();
												if (!empty($genre)) {
													for ($x = 0; $x < 5; $x++) { 
														if(isset($genre[$x])) {
															echo "<a>".$genre[$x].", </a>"; 
														} else {
															break;
														}
													}
												}
												?></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
												<?php
												$runtime = $movObj->runtime();
												if (!empty($runtime)) {
													echo "<p><a>".$runtime." Min</a></p>";
												}
												?>
						            		</div>
						            		<div class="sb-it">
						            			<h6>MMPA Rating:</h6>
												<?php
												$mpaa = $movObj->mpaa();
												if (!empty($mpaa)) {
													foreach ($mpaa as $key=>$mpaa) { 
														if($key == "United States") {
															echo "<p><a>".$mpaa."</a></p>"; 
														} else {
															continue;
														}
													}
												}
												?>
						            		</div>
						            	</div>
						            </div>
						        </div>

						        <div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>Write Review Here...</h3>
						       	 				<h2><?php echo $movObj->title() ?></h2>
							            	</div>
							            	<a href="#" class="redbtn">Write Review</a>
						            	</div>
						            	<div class="topbar-filter">
											<p>Found <span>1 reviews</span> in total</p>
											<!-- <label>Filter by:</label>
											<select>
												<option value="popularity">Popularity Descending</option>
												<option value="popularity">Popularity Ascending</option>
												<option value="rating">Rating Descending</option>
												<option value="rating">Rating Ascending</option>
												<option value="date">Release date Descending</option>
												<option value="date">Release date Ascending</option>
											</select> -->
										</div>
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="images/uploads/userava1.jpg" alt="">
												<div>
													<h3>Best Marvel movie in my opinion</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														17 December 2016 by <a href="#"> hawaiipierson</a>
													</p>
												</div>
											</div>
											<p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
										</div>
										<!-- <div class="topbar-filter">
											<label>Reviews per page:</label>
											<select>
												<option value="range">5 Reviews</option>
												<option value="saab">10 Reviews</option>
											</select>
											<div class="pagination2">
												<span>Page 1 of 6:</span>
												<a class="active" href="#">1</a>
												<a href="#">2</a>
												<a href="#">3</a>
												<a href="#">4</a>
												<a href="#">5</a>
												<a href="#">6</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div> -->
						            </div>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
            <!-- <div class="col-md-2">
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
            </div>
            <div class="flex-child-ft item2">
                 <p>BestMovie.com<br>
                 Dilanka Kasun, IBM (PVL)LTD, Ahangama.<br>
                 Tharindu Sathsara, Nasa Institute, Alawwa.<br>
                 Kavindu Damsith, Damsith International SPA, Galathara.<br>
                 </p>
                <p>Call us: <a href="#">(+94) 711 234 5678</a></p>
            </div>
        </div>
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                <h4>Profile</h4>
                <ul>
                    <li><a href="#">My Profile</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item2">
                <h4>About</h4>
                <ul>
                    <li><a href="#">About Us</a></li> 
                    <li><a href="#">Facebook</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item3">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Facebook</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item4">
                <h4>Help</h4>
                <ul>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
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
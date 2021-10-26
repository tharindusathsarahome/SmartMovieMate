<?php
require('php/Main/session.php');
$today_date = date("Y/m/d");
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>BestMovie.com</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">
    <link rel="shortcut icon" type="image/png" href="images/lg_.png">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <link rel="stylesheet" href="css/googleapis.css">
    <link rel="stylesheet" href="css/font-awesome.min_2.css">
    <!-- <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/NewPlugin.css">
    

<!-- <script src="js/custom2.js"></script> -->
</head>


<body>
    <!--preloading-->
 <!--    <div id="preloader">
			<section class="wrapper">
			  <div class="spinner">
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
			  </div>
			</section>
    </div> -->
    <!--end of preloading-->

    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <?php if(strpos("$_SERVER[REQUEST_URI]", "signup=none")) { ?>
                <h3>Sign In First</h3>
            <?php } else {?>
                <h3>Login To BestMovie.com</h3>
            <?php }?>
            <form role="form" method="post" action="php/Main/processlogin.php">
                <div class="row">
                    <label for="username">
                    Enter Phone Number or Email:
                    <input type="text" placeholder="E-mail" name="email" type="email" required="required" autofocus>
                </label>
                </div>

                <div class="row">
                    <label for="password">
                    Enter Password:
                    <input type="password" placeholder="Password" name="password" id="password" required="required">
                </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <div>
                            <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                        </div>
                        <a href="#">Forget password ?</a>
                    </div>
                </div>
                <div class="row">
                    <button name="btnlogin" type="submit">Login</button>
                </div>
            </form>

        </div>
    </div>
    <!--end of login form popup-->

<div id="overlayForSelectMovie" class="overlayMsg">
	<div class="login-content">
		<h3>Registration Completed!</h3>
		<h4>To increase the accuracy of suggestions, <br> enter your favorite movies below ...</h4>
		<form role="form">
			<div class="row">
				<div style="min-height:60px;" id="filterChipsContainer" class="chip-group" ></div>
			</div>
			<div class="row">
				<label><div id="numberI">Film List : 10 Remaining</div></label>
			</div>
			<div class="row">
				<input list="nameList" name="movieList" aria-labelledby="addFilterBtn" id="addFilterTxt" type="text" placeholder="Add Movie..." />
				<button style="width:15%;" type="button" aria-label="Add filter" id="addFilterBtn" value="new" onclick="selectData();" >Add</button>
			</div>
			<div class="row">
				<div class="list-group" id="show-list" ></div>	
			</div>
            <div id="saveData" style="display: none;"></div>
            <div id="res"></div>
			<div class="row">
				<button id="subbut">Add Selected Movies</button>
			</div>
		</form>
	</div>
</div>

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <div class="navbar-header">
            <!-- data-target="#bs-example-navbar-collapse-1" -->
               <div class="navbar-toggle" data-toggle="collapse" >
                    <span class="sr-only"></span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
               <div>
               <a href="index.php"><img class="logo" src="images/logo1.png" alt="" width="350" height="100"></a>
               </div>
                
            </div>
            <div class="navbar-collapse flex-parent collapse" id="bs-example-navbar-collapse-1">
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
                <?php if (logged_in()) { ?>
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
                <?php } ?>
                <?php if (!logged_in()) { ?>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    <li class="loginLink"><a id="LogInBtn" href="#">LOG In</a></li>
                    <li><a href="Register.php">sign up</a></li>
                </ul>
                <?php } ?>
            </div>
        </nav>
        <!-- top search form -->
        <div class="top-search">
            <input type="text" class="search_1" placeholder="Search Any Movie or TV series">
            <input type="text" class="search_2" placeholder="Search">
        </div>
    </div>
</header>
<!-- END | Header -->

<?php if(strpos("$_SERVER[REQUEST_URI]", "signup=none")) { ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#LogInBtn").click();
            });
        </script>
<?php } ?>
<?php if(strpos("$_SERVER[REQUEST_URI]", "signup=first")) { ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                $('.container').addClass('smaller');
                $('#overlayForSelectMovie').addClass('activeMsg');
            });
        </script>
<?php } ?>
        
    <div class="slider movie-items">
        <div class="container">

            <?php if (logged_in()) { ?>
                <div class="headder">Hi, <?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></div>
            <?php } ?>

            <div class="row">
                <!-- <div class="social-link">
                    <p>Follow us: </p>
                    <a href="#"><i class="ion-social-facebook"></i></a>
                    <a href="#"><i class="ion-social-twitter"></i></a>
                    <a href="#"><i class="ion-social-googleplus"></i></a>
                    <a href="#"><i class="ion-social-youtube"></i></a>
                </div> -->

                <div class="slick-multiItemSlider">
                    <div class="movie-item">
                        <a href="moviesingle.php?M_ID=MOV_0848228">
                            <div class="mv-img">
                                <img src="images/uploads/mv-item2.jpg" alt="" width="285" height="437">
                            </div>
                        </a>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#">Sci-fi</a></span>
                            </div>
                            <h6><a href="#">Interstellar</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <a href="moviesingle.php?M_ID=MOV_0293429">
                            <div class="mv-img">
                                <img src="images/uploads/slider1.jpg" alt="" width="285" height="437">
                            </div>
                        </a>
                        <div class="title-in">
                            <div class="cate">
                                <span class="yell"><a href="#">action</a></span>
                            </div>
                            <h6><a href="#">The revenant</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <a href="moviesingle.php?M_ID=MOV_0848228">
                            <div class="mv-img">
                                <img src="images/uploads/slider2.jpg" alt="" width="285" height="437">
                            </div>
                        </a>
                        <div class="title-in">
                            <div class="cate">
                                <span class="green"><a href="#">comedy</a></span>
                            </div>
                            <h6><a href="#">Die hard</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider4.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#">Sci-fi</a></span>
                            </div>
                            <h6><a href="#">The walk</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider3.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="yell"><a href="#">New</a></span>
                            </div>
                            <h6><a href="#">The revenant</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" movie-items">
        <div class="container">
            <div class="row ipad-width">
                <!-- <div class="col-md-2">
                    <div class="ads"></div>
                </div> -->
                <div >
                    <div class="title-hd">
                        <h2>Latest Movies</h2>
                        <a href="#" class="viewall display_block">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <div id="latestMoviesFilter">
                           <div  class="filtertabLg filterTabsLg">
                           <ul class='tab-links'>
                            <li class='active'><a href='#tab1' name='Lmovies_pop'>Popular</a></li>
                            <li><a href='#tab2' name='Lmovies_topR'> Top rated</a></li>
                            <li><a href='#tab3' name='Lmovies_most'> Most reviewed</a></li>
                           </ul>
                           </div>
                            <div class="filterTabsSm">
                                <hr>
                                <div class="filter_view">
                                    <select class="tab-links" id="selectFilter" onchange="selectFilterSmall();">
                                    <option value="Lmovies_pop">Popular</option>
                                    <option value="Lmovies_topR" >Top rated</option>
                                    <option value="Lmovies_most">Most reviewed</option>
                                    </select>
                                <a href="#" class="display_nblock">View all <i class="ion-ios-arrow-right"></i></a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">            
                                <div class="slick-multiItemSlider_m" id='latestMovies'>
                                    <!-- Load From tabSelect -->
                                </div>
                              </div>
                        </div>
                        </div>
                    </div>
                    <div class="title-hd" style="margin-top:60px;">
                        <h2 >lastest tv series</h2>
                        <a href="#" class="viewall display_block">View all <i class="ion-ios-arrow-right"></i></a>
                       </div>
                    <div class="tabs">
                        <div id="latestTvSeriesFilter">
                        <div  class="filtertabLg filterTabsLg">
                          <ul class='tab-links '>
                            <li class='active'><a href='#tab1' name='LtvSeries_pop'>Popular</a></li>
                            <li><a href='#tab2' name='LtvSeries_topR'> Top rated</a></li>
                            <li><a href='#tab3' name='LtvSeries_most'> Most reviewed</a></li>
                          </ul>
                        </div>
                        <div class="filterTabsSm">
                                <hr>
                                <div class="filter_view">
                                    <select class="tab-links" id="selectFilter" onchange="selectFilterSmall();">
                                    <option value="LtvSeries_pop">Popular</option>
                                    <option value="LtvSeries_topR" >Top rated</option>
                                    <option value="LtvSeries_most">Most reviewed</option>
                                    </select>
                                <a href="#" class="display_nblock">View all <i class="ion-ios-arrow-right"></i></a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">
                                <div class="slick-multiItemSlider_t" id="latestTvSeries">  
                                       <!-- Load From tabSelect -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <div class="ads"></div>
                </div> -->
            </div>
        </div>
    </div>


    <!-- latest new v1 section-->
    <!-- <div class="latestnew">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8">
                    <div class="ads2"></div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sb-twitter sb-it">
                            <h4 class="sb-title">Post to us</h4>
                            <div class="slick-tw">
                                <div class="tweet item" id="">
                                    <p>v</p>
                                </div>
                                <div class="tweet item" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--end of latest new v1 section-->


<!-- footer section-->
<footer class="ht-footer">
    <div class="container ">
        <div class="flex-parent-ft" style="padding: 30px 10% 10px 10%;">
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
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                <a href="index.php"><img class="logo" src="images/logo1.png" alt=""></a>
            </div>
            <div class="flex-child-ft item2" >
                 <p>BestMovie.com<br>
                 Dilanka Kasun, IBM (PVL)LTD, Ahangama.<br>
                 Tharindu Sathsara, Nasa Institute, Alawwa.<br>
                 Kavindu Damsith, Damsith International SPA, Galathara.<br>
                 </p>
                <p>Call us: <a href="#">(+94) 711 234 5678</a></p>
            </div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom2.js"></script>  
<script src="js/custom.js"></script> 
</body>
</html>
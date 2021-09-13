<?php
require('php/Main/session.php');
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

<?php		
	if (logged_in()) {
		?>
			<script type="text/javascript">
				window.location = "../../index.php";
			</script>
		<?php
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
	
    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Login</h3>
            <form role="form" method="post" action="php/Main/processlogin.php">
                <div class="row">
                    <label for="username">
                    Phone Number or Email:
                    <input type="text" placeholder="E-mail" name="email" type="email" required="required" autofocus>
                </label>
                </div>

                <div class="row">
                    <label for="password">
                    Password:
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
                    <button name="btnlogin" type="submit" id="sub">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!--end of login form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
			<div class="navbar-header logo">
			    <a href="index-2.html"><img class="logo" src="images/logo1.png" alt="" width="350" height="100"></a>
		    </div>
			<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav flex-child-menu menu-left">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li class="dropdown first">
						<a href="index.php" class="btn btn-default">Home</a>
					</li>
				</ul>
				<ul class="nav navbar-nav flex-child-menu menu-right">              
					<li><a href="#">Help</a></li>
            		<li class="btn loginLink"><a href="#">LOG In</a></li>
				</ul>
			</div>
	    </nav>
	</div>
</header>


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>register page</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<form id="registerForm" class="user" enctype="multipart/form-data" onsubmit="return register(event);">
				<div class="col-md-3 col-sm-12 col-xs-12">
					<div class="user-information">
						<div class="user-img">
							<img id="output" src="images/uploads/user-img.png" alt="Avatar" style="vertical-align:middle; width:100px; height:100px; border-radius:50%;"><br>
							<input type="file" accept="image/jpeg, image/png" name="fileToUpload" onchange="loadFile(event)" id="file" style="display: none;" />
							<label for="file" class="redbtn" id="upload_link" style="cursor: pointer;">Upload Image</label>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">
					<div class="form-style-1 user-pro" action="#">
						<h4>Please Fill the Following Details to Register...</h4>
						<div class="row">
							<div class="col-md-6">
								<label>Telephone No</label>
								<input type="text" name="tpno" placeholder="07XXXXXXXX" required/>
							</div>
							<div class="col-md-6">
								<label>Email Address</label>
								<input type="text" name="email" placeholder="name@mail.com" required/>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>First Name</label>
								<input type="text" name="fname" placeholder="Your First Name " required/>
							</div>
							<div class="col-md-6">
								<label>Last Name</label>
								<input type="text" name="lname" placeholder="Your Last Name" required/>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Country</label>
									<select id="country" name="country" required/>
									   <option value="Afganistan">Afghanistan</option>
									   <option value="Albania">Albania</option>
									   <option value="Algeria">Algeria</option>
									   <option value="American Samoa">American Samoa</option>
									   <option value="Andorra">Andorra</option>
									   <option value="Angola">Angola</option>
									   <option value="Anguilla">Anguilla</option>
									   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
									   <option value="Argentina">Argentina</option>
									   <option value="Armenia">Armenia</option>
									   <option value="Aruba">Aruba</option>
									   <option value="Australia">Australia</option>
									   <option value="Austria">Austria</option>
									   <option value="Azerbaijan">Azerbaijan</option>
									   <option value="Bahamas">Bahamas</option>
									   <option value="Bahrain">Bahrain</option>
									   <option value="Bangladesh">Bangladesh</option>
									   <option value="Barbados">Barbados</option>
									   <option value="Belarus">Belarus</option>
									   <option value="Belgium">Belgium</option>
									   <option value="Belize">Belize</option>
									   <option value="Benin">Benin</option>
									   <option value="Bermuda">Bermuda</option>
									   <option value="Bhutan">Bhutan</option>
									   <option value="Bolivia">Bolivia</option>
									   <option value="Bonaire">Bonaire</option>
									   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
									   <option value="Botswana">Botswana</option>
									   <option value="Brazil">Brazil</option>
									   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
									   <option value="Brunei">Brunei</option>
									   <option value="Bulgaria">Bulgaria</option>
									   <option value="Burkina Faso">Burkina Faso</option>
									   <option value="Burundi">Burundi</option>
									   <option value="Cambodia">Cambodia</option>
									   <option value="Cameroon">Cameroon</option>
									   <option value="Canada">Canada</option>
									   <option value="Canary Islands">Canary Islands</option>
									   <option value="Cape Verde">Cape Verde</option>
									   <option value="Cayman Islands">Cayman Islands</option>
									   <option value="Central African Republic">Central African Republic</option>
									   <option value="Chad">Chad</option>
									   <option value="Channel Islands">Channel Islands</option>
									   <option value="Chile">Chile</option>
									   <option value="China">China</option>
									   <option value="Christmas Island">Christmas Island</option>
									   <option value="Cocos Island">Cocos Island</option>
									   <option value="Colombia">Colombia</option>
									   <option value="Comoros">Comoros</option>
									   <option value="Congo">Congo</option>
									   <option value="Cook Islands">Cook Islands</option>
									   <option value="Costa Rica">Costa Rica</option>
									   <option value="Cote DIvoire">Cote DIvoire</option>
									   <option value="Croatia">Croatia</option>
									   <option value="Cuba">Cuba</option>
									   <option value="Curaco">Curacao</option>
									   <option value="Cyprus">Cyprus</option>
									   <option value="Czech Republic">Czech Republic</option>
									   <option value="Denmark">Denmark</option>
									   <option value="Djibouti">Djibouti</option>
									   <option value="Dominica">Dominica</option>
									   <option value="Dominican Republic">Dominican Republic</option>
									   <option value="East Timor">East Timor</option>
									   <option value="Ecuador">Ecuador</option>
									   <option value="Egypt">Egypt</option>
									   <option value="El Salvador">El Salvador</option>
									   <option value="Equatorial Guinea">Equatorial Guinea</option>
									   <option value="Eritrea">Eritrea</option>
									   <option value="Estonia">Estonia</option>
									   <option value="Ethiopia">Ethiopia</option>
									   <option value="Falkland Islands">Falkland Islands</option>
									   <option value="Faroe Islands">Faroe Islands</option>
									   <option value="Fiji">Fiji</option>
									   <option value="Finland">Finland</option>
									   <option value="France">France</option>
									   <option value="French Guiana">French Guiana</option>
									   <option value="French Polynesia">French Polynesia</option>
									   <option value="French Southern Ter">French Southern Ter</option>
									   <option value="Gabon">Gabon</option>
									   <option value="Gambia">Gambia</option>
									   <option value="Georgia">Georgia</option>
									   <option value="Germany">Germany</option>
									   <option value="Ghana">Ghana</option>
									   <option value="Gibraltar">Gibraltar</option>
									   <option value="Great Britain">Great Britain</option>
									   <option value="Greece">Greece</option>
									   <option value="Greenland">Greenland</option>
									   <option value="Grenada">Grenada</option>
									   <option value="Guadeloupe">Guadeloupe</option>
									   <option value="Guam">Guam</option>
									   <option value="Guatemala">Guatemala</option>
									   <option value="Guinea">Guinea</option>
									   <option value="Guyana">Guyana</option>
									   <option value="Haiti">Haiti</option>
									   <option value="Hawaii">Hawaii</option>
									   <option value="Honduras">Honduras</option>
									   <option value="Hong Kong">Hong Kong</option>
									   <option value="Hungary">Hungary</option>
									   <option value="Iceland">Iceland</option>
									   <option value="Indonesia">Indonesia</option>
									   <option value="India">India</option>
									   <option value="Iran">Iran</option>
									   <option value="Iraq">Iraq</option>
									   <option value="Ireland">Ireland</option>
									   <option value="Isle of Man">Isle of Man</option>
									   <option value="Israel">Israel</option>
									   <option value="Italy">Italy</option>
									   <option value="Jamaica">Jamaica</option>
									   <option value="Japan">Japan</option>
									   <option value="Jordan">Jordan</option>
									   <option value="Kazakhstan">Kazakhstan</option>
									   <option value="Kenya">Kenya</option>
									   <option value="Kiribati">Kiribati</option>
									   <option value="Korea North">Korea North</option>
									   <option value="Korea Sout">Korea South</option>
									   <option value="Kuwait">Kuwait</option>
									   <option value="Kyrgyzstan">Kyrgyzstan</option>
									   <option value="Laos">Laos</option>
									   <option value="Latvia">Latvia</option>
									   <option value="Lebanon">Lebanon</option>
									   <option value="Lesotho">Lesotho</option>
									   <option value="Liberia">Liberia</option>
									   <option value="Libya">Libya</option>
									   <option value="Liechtenstein">Liechtenstein</option>
									   <option value="Lithuania">Lithuania</option>
									   <option value="Luxembourg">Luxembourg</option>
									   <option value="Macau">Macau</option>
									   <option value="Macedonia">Macedonia</option>
									   <option value="Madagascar">Madagascar</option>
									   <option value="Malaysia">Malaysia</option>
									   <option value="Malawi">Malawi</option>
									   <option value="Maldives">Maldives</option>
									   <option value="Mali">Mali</option>
									   <option value="Malta">Malta</option>
									   <option value="Marshall Islands">Marshall Islands</option>
									   <option value="Martinique">Martinique</option>
									   <option value="Mauritania">Mauritania</option>
									   <option value="Mauritius">Mauritius</option>
									   <option value="Mayotte">Mayotte</option>
									   <option value="Mexico">Mexico</option>
									   <option value="Midway Islands">Midway Islands</option>
									   <option value="Moldova">Moldova</option>
									   <option value="Monaco">Monaco</option>
									   <option value="Mongolia">Mongolia</option>
									   <option value="Montserrat">Montserrat</option>
									   <option value="Morocco">Morocco</option>
									   <option value="Mozambique">Mozambique</option>
									   <option value="Myanmar">Myanmar</option>
									   <option value="Nambia">Nambia</option>
									   <option value="Nauru">Nauru</option>
									   <option value="Nepal">Nepal</option>
									   <option value="Netherland Antilles">Netherland Antilles</option>
									   <option value="Netherlands">Netherlands (Holland, Europe)</option>
									   <option value="Nevis">Nevis</option>
									   <option value="New Caledonia">New Caledonia</option>
									   <option value="New Zealand">New Zealand</option>
									   <option value="Nicaragua">Nicaragua</option>
									   <option value="Niger">Niger</option>
									   <option value="Nigeria">Nigeria</option>
									   <option value="Niue">Niue</option>
									   <option value="Norfolk Island">Norfolk Island</option>
									   <option value="Norway">Norway</option>
									   <option value="Oman">Oman</option>
									   <option value="Pakistan">Pakistan</option>
									   <option value="Palau Island">Palau Island</option>
									   <option value="Palestine">Palestine</option>
									   <option value="Panama">Panama</option>
									   <option value="Papua New Guinea">Papua New Guinea</option>
									   <option value="Paraguay">Paraguay</option>
									   <option value="Peru">Peru</option>
									   <option value="Phillipines">Philippines</option>
									   <option value="Pitcairn Island">Pitcairn Island</option>
									   <option value="Poland">Poland</option>
									   <option value="Portugal">Portugal</option>
									   <option value="Puerto Rico">Puerto Rico</option>
									   <option value="Qatar">Qatar</option>
									   <option value="Republic of Montenegro">Republic of Montenegro</option>
									   <option value="Republic of Serbia">Republic of Serbia</option>
									   <option value="Reunion">Reunion</option>
									   <option value="Romania">Romania</option>
									   <option value="Russia">Russia</option>
									   <option value="Rwanda">Rwanda</option>
									   <option value="St Barthelemy">St Barthelemy</option>
									   <option value="St Eustatius">St Eustatius</option>
									   <option value="St Helena">St Helena</option>
									   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
									   <option value="St Lucia">St Lucia</option>
									   <option value="St Maarten">St Maarten</option>
									   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
									   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
									   <option value="Saipan">Saipan</option>
									   <option value="Samoa">Samoa</option>
									   <option value="Samoa American">Samoa American</option>
									   <option value="San Marino">San Marino</option>
									   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
									   <option value="Saudi Arabia">Saudi Arabia</option>
									   <option value="Senegal">Senegal</option>
									   <option value="Seychelles">Seychelles</option>
									   <option value="Sierra Leone">Sierra Leone</option>
									   <option value="Singapore">Singapore</option>
									   <option value="Slovakia">Slovakia</option>
									   <option value="Slovenia">Slovenia</option>
									   <option value="Solomon Islands">Solomon Islands</option>
									   <option value="Somalia">Somalia</option>
									   <option value="South Africa">South Africa</option>
									   <option value="Spain">Spain</option>
									   <option value="Sri Lanka">Sri Lanka</option>
									   <option value="Sudan">Sudan</option>
									   <option value="Suriname">Suriname</option>
									   <option value="Swaziland">Swaziland</option>
									   <option value="Sweden">Sweden</option>
									   <option value="Switzerland">Switzerland</option>
									   <option value="Syria">Syria</option>
									   <option value="Tahiti">Tahiti</option>
									   <option value="Taiwan">Taiwan</option>
									   <option value="Tajikistan">Tajikistan</option>
									   <option value="Tanzania">Tanzania</option>
									   <option value="Thailand">Thailand</option>
									   <option value="Togo">Togo</option>
									   <option value="Tokelau">Tokelau</option>
									   <option value="Tonga">Tonga</option>
									   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
									   <option value="Tunisia">Tunisia</option>
									   <option value="Turkey">Turkey</option>
									   <option value="Turkmenistan">Turkmenistan</option>
									   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
									   <option value="Tuvalu">Tuvalu</option>
									   <option value="Uganda">Uganda</option>
									   <option value="United Kingdom">United Kingdom</option>
									   <option value="Ukraine">Ukraine</option>
									   <option value="United Arab Erimates">United Arab Emirates</option>
									   <option value="United States of America">United States of America</option>
									   <option value="Uraguay">Uruguay</option>
									   <option value="Uzbekistan">Uzbekistan</option>
									   <option value="Vanuatu">Vanuatu</option>
									   <option value="Vatican City State">Vatican City State</option>
									   <option value="Venezuela">Venezuela</option>
									   <option value="Vietnam">Vietnam</option>
									   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
									   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
									   <option value="Wake Island">Wake Island</option>
									   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
									   <option value="Yemen">Yemen</option>
									   <option value="Zaire">Zaire</option>
									   <option value="Zambia">Zambia</option>
									   <option value="Zimbabwe">Zimbabwe</option>
									</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Date Of Birth</label>
								<input type="date" name="dob" placeholder="XX/XX/XXXX" required/>
							</div>
							<div class="col-md-6">
								<label>Sex</label>
									<select id="sex" name="sex" required/>
									   <option value="Male">Male</option>
									   <option value="Female">Female</option>
									   <option value="Other">Other</option>
									</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Password</label>
								<input type="Password" placeholder="Password" name="password" id="pbox" required/>
							</div>
							<div class="col-md-6">
								<label>Confirm Password</label>
								<input type="Password" placeholder="Confirm Password" name="cPassword" id="cpbox" required/>
							</div>

						</div>
						<br>
						<br>
					
						<div class="row">
							<div class="col-md-3 offset-md-3">
								<input id="submit" class="submit" type="submit" name="submit" value="Register Now">
							</div>
							<div class="col-md-3 offset-md-3">
			  					<input class="submit" type="reset" name="reset" value="Reset">
							</div>
							<script>

								var password = document.getElementById("pbox");
								var confirm_password = document.getElementById("cpbox");
								var but=document.getElementById("submit");
								but.addEventListener("cilck",validatePassword);
								function validatePassword(event){
								  if(password.value == confirm_password.value) {
								    confirm_password.setCustomValidity("");
								  } else {
								    confirm_password.setCustomValidity("Passwords Don't Match");
								  }
								}
								password.onchange = validatePassword;
								confirm_password.onkeyup = validatePassword;

							</script>

						</div>	
					</form>
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
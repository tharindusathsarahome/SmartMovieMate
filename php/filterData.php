<?php

require('Main/session.php');
include 'dbconn.php';
confirm_logged_in();
$table="";
if($_POST['table']=="1"){
    $table= "selectedmovie_tb";  
}else{
    $table= "rejectedmovie_tb";
}

if(isset($_POST['isfound'])){     //__remove data from selected
 $isFound=$_POST['isfound'];
 $userID= $_SESSION['MEMBER_ID'];
 $movieID= $_POST['movieID'];

if($isFound=='false'){}
elseif($isFound=='true'){
      $sql = "DELETE FROM $table WHERE movieID='$movieID' AND userID='$userID'";
}
 $conn->query($sql);    //!__remove data from selected
}


$sql = "SELECT * FROM $table 
LEFT JOIN imdbanalyticsdata_tb 
ON $table.movieID=imdbanalyticsdata_tb.movie_tb_movieID 
LEFT JOIN  image_tb 
ON  $table.movieID=image_tb.movie_tb_movieID 
WHERE $table.userID='".$_SESSION['MEMBER_ID']."'";


if($_POST['clickedBtn']=='Date Added'){
    $sql=$sql." ORDER BY date_added DESC LIMIT 8";///////change////
} elseif($_POST['clickedBtn']=='Top Rated'){
    $sql=$sql." ORDER BY imdbRating DESC LIMIT 8 ";///////change////
}

$newX=0; 
if(isset($_POST['selected_page'])){
	$newX=(int)$_POST['selected_page']; 
    $sql=$sql." OFFSET ".strval(($newX-1)*8); 
    $numMovies=mysqli_fetch_array($conn->query("SELECT COUNT(movieID) as totle from $table WHERE userID='".$_SESSION['MEMBER_ID']."'"));	
}
$Allpages=ceil((int)$numMovies['totle']/8);
$result=$conn->query($sql);   
?>


    <!-- selected movies -->
<div class="flex-wrap-movielist" >		
<?php  while($movie=mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>	            	
   
    <div class="movie-item-style-1 <?php echo isset($_POST['isfound'])?"":"RF_fadeIn"?>" id="<?php echo($table=='selectedmovie_tb')?'RFF_':'RFR_';echo $movie['movieID'];?>">
      <img src="<?php echo $movie['imgUrl'];?>" alt="">
	 <div class="hvr-inner">
	    <a href="moviesingle.php?M_ID=<?php echo $movie['movieID'];?>"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	</div>
	<div class="mv-item-infor" >
	    <h6><a href="#"><?php
		$results=$conn->query('SELECT lanName FROM  languagemovie_tb');
		while($lan_movies=mysqli_fetch_array($results,MYSQLI_ASSOC)){
		    $sqlr="SELECT * FROM ".$lan_movies['lanName']."_language_men_tb WHERE  movie_tb_movieID='".$movie['movieID']."'";
			if($movieName=mysqli_fetch_array($conn->query($sqlr))){
				echo $movieName['name'];
				break;
			}
		 }	
		?>	
		</a></h6>
	    <p class="rate"><i class="ion-android-star"></i><span><?php echo $movie['imdbRating'];?></span> /10</p>
	</div>
	<div class="btn-remove">
	    <button onclick="return removeFromSelected('<?php echo $movie['movieID'];?>',<?php echo ($table=='selectedmovie_tb')?'\'1\'':'\'0\'';?>);">Remove</button>
	</div>
</div>
<?php endwhile?> 	
</div>
<!--! selected movies -->

<!-- selected page -->
<?php if(isset($_POST['selected_page'])):?>
<div class="topbar-filter">
	<label>Page No: <?php echo $newX?> </label>
	<div class="pagination2">
		<span>Page: <?php echo $newX?> of <?php echo $Allpages?></span>
		<button  onclick="<?php echo($newX>1)?'return selectedpage(\'3\');':''?>"><i class="ion-arrow-left-b"></i></button>
		<label id="pageSelect"><?php echo $newX;?></label>
		<button  onclick="<?php echo($newX<$Allpages)?'return selectedpage(\'2\');':''?>"><i class="ion-arrow-right-b"></i></button>
	</div>
</div>
<?php endif;?>
<!--! selected page -->
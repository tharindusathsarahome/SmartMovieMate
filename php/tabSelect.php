<?php
include 'dbContor.php';
include 'dbconn.php';
$today_date = date("Y/m/d");
// $today_date = '2021/09/16';
$today_date = date("Y-m-d", strtotime($today_date));
$sql = new Data();
$orderResults=""; 
$movieName="Unknown";
$selectedData="";
if($_POST['tabName']=="Lmovies_topR"){
    $orderResults="ORDER BY imdbRating DESC";   
}elseif($_POST['tabName']=="Lmovies_most"){
    $orderResults="ORDER BY imdbVotes DESC";   
}

$sql->SQLData('today_update_tb','COUNT(DISTINCT movieID) as count',"date='$today_date'","S");
if($sql->seletData[0]['count']<6){
    $selectedData ="movieID IN(SELECT * FROM (SELECT movieID FROM today_update_tb ORDER BY date DESC LIMIT 8) as table_1) $orderResults";
}else{
    $selectedData="date ='$today_date' $orderResults";
}
$sql->SQLData(' today_update_tb LEFT JOIN imdbanalyticsdata_tb 
                ON today_update_tb.movieID=imdbanalyticsdata_tb.movie_tb_movieID'
                ,'movieID , imdbRating ,imdbVotes',$selectedData ,"S");

$sqlSelect = $sql->seletData;
foreach ($sqlSelect as $x) {
    $movieID=$x['movieID'];
    $sql->SQLData('image_tb','imgUrl',"movie_tb_movieID ='$movieID'","S");
    $IMG = $sql->seletData[0]['imgUrl'];

    $sql->SQLData('genresmovieconnection_tb','genres_tb_genresID',"movie_tb_movieID ='$movieID'","S");
    $GerensID = $sql->seletData[0]['genres_tb_genresID'];

    $sql->SQLData('genres_tb','genresName',"genresID ='$GerensID'","S");
    $movGerens = $sql->seletData[0]['genresName'];

    $mov_table=str_replace("MOV","",explode("_",$movieID)[0]);
    $lanName=mysqli_fetch_array($conn->query("SELECT lanName FROM  languagemovie_tb WHERE lanID= '$mov_table'"));
    $lanName= $lanName['lanName'];
    $sqlr="SELECT name FROM ".$lanName."_languagemen_tb WHERE ".$lanName."ID='".str_replace("MOV","",$movieID)."'";
    
    if($movie_name=mysqli_fetch_array($conn->query($sqlr))){
        $movieName= $movie_name['name'];
    }
    echo "
    <div class='movie-item movie-item-padding showElement' >
        <a href='moviesingle.php?M_ID=$movieID'>
            <div class='mv-img'>
                <img src='$IMG' alt=''>
            </div>
        </a>
        <div class='title-in'>
            <div class='cate'>
                <span class='blue'><a href='#'>$movGerens</a></span>
            </div>
            <h6><a href='moviesingle.php?M_ID=$movieID'>$movieName</a></h6>
            <p><i class='ion-android-star'></i><span>".$x['imdbRating']."</span> /10</p>
        </div>
    </div>";
    
} 
?>
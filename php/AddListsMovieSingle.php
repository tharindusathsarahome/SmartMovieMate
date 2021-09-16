<?php

require('Main/session.php');
include 'dbconn.php';
confirm_logged_in();

$isFound=$_POST['isfound'];
$userID= $_SESSION['MEMBER_ID'];
$movieID= $_POST['movieID'];

if($_POST['table']){
    $table= "selectedmovie_tb";
}else{
    $table= "rejectedmovie_tb";
}

if($isFound=='false'){
   $sql = "INSERT INTO $table (userID, movieID) VALUES ('$userID','$movieID')";
 }elseif($isFound=='true'){
      $sql = "DELETE FROM $table WHERE movieID='$movieID'";
}

$conn->query($sql);

?>
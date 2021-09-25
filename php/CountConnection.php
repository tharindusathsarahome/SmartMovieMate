<?php

require('Main/session.php');
include 'dbconn.php';
confirm_logged_in();

$table="";
$C_table="";
$col_ID="";
if(isset($_POST['table'])){
    switch($_POST['table']){
        case "TB_1":
             $table="seen";
             $C_table="seencountconnection_tb";
             $col_ID="seenID";
             break;
        case "TB_2":
             $table="trailer";
             $C_table="trailercount_tb";
             $col_ID="trailerID";
             break;
        case "TB_3":
            $table="sinahaSub";
            $C_table="subcount_tb";
            $col_ID="subID";
            break;
        case "TB_4":
            $table="download";
            $C_table="downloadcountconnection_tb";
            $col_ID="downloadID";
            break;    
    }

    $userID= $_SESSION['MEMBER_ID'];
    $movieID= $_POST['movieID'];
    // $movieID="MOVENG_0097239";

    $sql="SELECT $col_ID FROM ".$table."_tb WHERE movie_tb_movieID='$movieID'";
    if($table_ID= mysqli_fetch_array($conn->query($sql))){
        $sql="SELECT * FROM $C_table WHERE user_tb_userID='$userID' AND ".$table."_tb_".$col_ID."='".$table_ID[$col_ID]."'";
        if(mysqli_fetch_array($conn->query($sql))){
            
        }else{
            $Sql="INSERT INTO $C_table (user_tb_userID,".$table."_tb_".$col_ID.") VALUES ('$userID','".$table_ID[$col_ID]."')";
            $conn->query($Sql);
        }
    
    }else{
        echo "Movie not Avalible";
    }

}else{
    echo "Something Went Wrong";
}
?>
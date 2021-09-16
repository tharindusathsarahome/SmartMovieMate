<?php

include 'Main/session.php';
include 'dbconn.php';

if (isset($_POST['old_password'])) {

    $userID = strip_tags($_SESSION['MEMBER_ID']);
    $password = strip_tags($_POST['old_password']);
    $newpassword = strip_tags($_POST['new_password']);
    $confirmnewpassword = strip_tags($_POST['con_newpassword']);

    $sql = "SELECT * FROM `user_tb` WHERE `userID` = '$userID' LIMIT 1";
    $EX1 = $conn->query($sql);
    $row1 = $EX1->fetch_assoc();

    if ($password == $row1["Password"]){
        if($newpassword == $confirmnewpassword) {
            $sql = "UPDATE `user_tb` SET `Password` = '$newpassword' WHERE `userID` = '$userID'";
            if($conn->query($sql)){
                echo "1"; //"Password Changed Successfully!"
            }else{
                echo "2"; //"Password could not be updated. Contact Your Administration!"
            }
        } else {
            echo "3"; //"Passwords do not match!"
        }
    }else{
        echo "4"; //"Please type your current password accurately!"
    }
}

if (isset($_FILES['fileToUpload'])) {

    $CusID = $_SESSION['MEMBER_ID'];
    $target_dir = $_FILES["fileToUpload"]["name"];
    $valid_extensions = array('jpeg', 'jpg', 'png');
    $ext = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
    if(in_array($ext, $valid_extensions)) { 
        $data="images/Users/".$CusID.'.'.strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
        $path="../".$data;
        unlink("../".$_SESSION['IMG_URL']);
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$path)){
            $sql = "UPDATE `user_tb` SET `ImgURL` = '$data' WHERE `userID` = '$CusID'";
            if($conn->query($sql)){
                $_SESSION['IMG_URL']  =  $data;
                echo "5"; //"Image Changed Successfully!"
            }else{
                echo "6"; //"Image Upload Error. Contact Your Administration!"
            }
        }else{
            echo "6"; //"Image Upload Error. Contact Your Administration!"
        }
    }else{
        echo "7"; //"Invalid File!"
    }
}

if (isset($_POST['newtp'])) {
    $CusID = $_SESSION['MEMBER_ID'];
    $newTP = $_POST['newtp'];
    if (!preg_match("/^[0-9]{10}$/",$newTP)) {
        echo "9"; //"Invalid Telephone Number"
    }else{
        $sql = "UPDATE `user_tb` SET `tpNo` = '$newTP' WHERE `userID` = '$CusID'";
        if($conn->query($sql)){
            echo "8"; //"TP NO Changed Successfully!"
        }else{
            echo "10"; //"TP NO Upload Error. Contact Your Administration!"
        }
    }
}

?>
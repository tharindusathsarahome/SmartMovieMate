
<?php
include 'dbconn.php';

if (isset($_POST["email"])){
  
    $Fname = $_POST["fname"];
    $Lname = $_POST["lname"];
    $TPno = $_POST["tpno"];
    $Email = $_POST["email"];
    $DOB = $_POST["dob"];
    $Country = $_POST["country"];
    $Sex = $_POST["sex"];
    $Password = $_POST["password"];
    
    if (!preg_match("/^[0-9]{10}$/",$TPno)) {
      echo "tpno";
    }elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      echo "email";
    }elseif(strlen($Password) <= '8') {
      echo "pwlength";
    }elseif(!preg_match("#[0-9]+#",$Password)) {
      echo "pwstrength";
    }else{
      $sql="SELECT `userID` FROM `user_tb` ORDER BY userID DESC LIMIT 1";
      $EX1 = $conn->query($sql);
      if ($EX1->num_rows > 0) {
        $row1 = $EX1->fetch_assoc();
        $Num = $row1["userID"];
        $split = explode("_",$Num);
        $Num = (int)$split[1];
        $Num +=1;
        $Num = sprintf("%06d", $Num);  /////////////// CUSTOMERS MAXIMUM > 999
        $CusID = "USR_" . (string)$Num;
      } else {
        echo "0 results";
      }
      if ($_FILES['fileToUpload']["name"]!="") {
        $target_dir = $_FILES["fileToUpload"]["name"];
        $data="images/Users/".$CusID.'.'.strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
        $path="../".$data;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$path );
      }else if($Sex == "Female"){
        $data="images/Users/female_DP.jpg";
      }else{
        $data="images/Users/male_DP.jpg";
      }

      $sql="INSERT INTO `user_tb` (`userID`, `tpNo`, `fName`, `lName`, `dob`, `email`, `Country`, `Password`, `Sex`, `ImgURL`)  VALUES('$CusID', '$TPno', '$Fname', '$Lname', '$DOB', '$Email', '$Country', '$Password', '$Sex' ,'$data')";

      if ($conn->query($sql)) {
        $sql="INSERT INTO `usermovieselectdata_tb` (`user_tb_userID`,`movie_tb_movieID`)  VALUES('$CusID',)";

        session_start();
        $_SESSION['MEMBER_ID']  = $CusID;
        $_SESSION['FIRST_NAME'] = $Fname;
        $_SESSION['LAST_NAME']  =  $Lname;
        $_SESSION['IMG_URL']  =  $data;
        echo "ok";

      } else {
              echo  "Error!";
      }
    }
}
?>
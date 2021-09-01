
<?php
require('dbconn.php');

$submit = $_POST["submit"];
if (isset($submit)){
    # code...
    $Fname = $_POST["fname"];
    $Lname = $_POST["lname"];
    $TPno = $_POST["tpno"];
    $Email = $_POST["email"];
    $DOB = $_POST["dob"];
    $Country = $_POST["country"];
    $Sex = $_POST["sex"];
    $Password = $_POST["password"];

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
    
    $target_dir = $_FILES["fileToUpload"]["name"];
    echo $target_dir;
    $data="../images/Users/".$target_dir;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$data );

    $data = "images/Users/".$target_dir;

    $sql="INSERT INTO `user_tb` (`userID`, `tpNo`, `fName`, `lName`, `dob`, `email`, `Country`, `Password`, `Sex`, `ImgURL`)  VALUES('$CusID', '$TPno', '$Fname', '$Lname', '$DOB', '$Email', '$Country', '$Password', '$Sex' ,'$data')";


    if ($conn->query($sql) === TRUE) {
      $movList = $_POST["movList"];
      
      $sql="INSERT INTO `usermovieselectdata_tb` (`user_tb_userID`,`movie_tb_movieID`)  VALUES('$CusID',)";

      session_start();
      $_SESSION['MEMBER_ID']  = $CusID;
      $_SESSION['FIRST_NAME'] = $Fname;
      $_SESSION['LAST_NAME']  =  $Lname;
      $_SESSION['IMG_URL']  =  $data;
      echo "<h1 style='color:green;'>New record created successfully</h1>
      <script>location.replace('../movieDataEnter/index.php');</Script>";




    } else {
            echo  "Error: " . $sql ."<br>" . $conn->error;
            echo "<div align='center'>
                <br>
            <h3 style='color:red;'>The Information You Entered Are Uncorrect. Please Fill The Form Again.</h3>
            </div>
            <form align='center' action='../../Register.php'>
             <button type='submit' class='button'><h4 style='color:red;'>Fill Again</h4></button>
            </form>";
    }
}
?>
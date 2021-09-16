
<?php
 
require('../dbconn.php');
require('session.php');
if (isset($_POST['btnlogin'])) {
 
  $email = trim($_POST['email']);
  $upass = trim($_POST['password']);
  $h_upass = sha1($upass);
  if ($upass == ''){
      ?>
        <script type="text/javascript">
          alert("Password is missing!");
          window.location = "../../index.php";
        </script>
      <?php
  }else{         
        $sql = "SELECT * FROM `user_tb` WHERE `email` ='" . $email . "' AND `Password` = '" . $upass . "'";

        $result = mysqli_query($conn, $sql);

        if ($result){
        $numrows = mysqli_num_rows($result);
    
            if ($numrows == 1) {
                $found_user  = mysqli_fetch_array($result);
 
                $_SESSION['MEMBER_ID']  = $found_user['userID'];
                $_SESSION['FIRST_NAME'] = $found_user['fName'];
                $_SESSION['LAST_NAME']  =  $found_user['lName'];
                if($found_user['ImgURL'] != ''){
                  $_SESSION['IMG_URL']  =  $found_user['ImgURL'];
                }
                else{
                  if($found_user['Sex'] == "Male"){
                    $_SESSION['IMG_URL']  =  "images/Users/male_DP.jpg";
                  }
                  else{
                    $_SESSION['IMG_URL']  =  "images/Users/female_DP.jpg";
                  }
                }
          
             ?>    <script type="text/javascript">
                      window.location = "../../index.php";
                  </script>
             <?php        
          
        
            } else {
              ?>    <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                window.location = "../../index.php";
                </script>
        <?php
 
            }
 
         } else {
         die("Table Query failed: " );
        }
    }      
}
?>
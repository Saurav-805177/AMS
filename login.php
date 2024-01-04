<?php require_once('header.php'); ?>
<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['s_email']) || empty($_POST['s_password'])) {
        $error_message ='Email and/or Password can not be empty.<br>';
    } else {
        
        $s_email = strip_tags($_POST['s_email']);
        $s_password = strip_tags($_POST['s_password']);

        $statement = $pdo->prepare("SELECT * FROM tb2_student WHERE s_email=?");
        $statement->execute(array($s_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $s_status = $row['s_status'];
            $row_password = $row['s_password'];
        }

        if($total==0) {
            $error_message .= 'Email Address does not match.<br>';
        } else {
            //using MD5 form
            if( $row_password != md5($s_password) ) {
                $error_message .= 'Passwords do not match <br>';
            } else {
                if($s_status == 0) {
                    $error_message .= 'Sorry! Your account is inactive. Please contact to... Admin <br>';
                } else {
                    $_SESSION['student'] = $row;
                    header("location: ".BASE_URL."index.php");
                }
            }
            
        }
    }
}
?>
 <div class="wrapper">
         <div class="title">
            Login 
         </div>
         <form action="" method="post" enctype="multipart/form-data">
            <div class="field">
               <input type="text" name="s_email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="s_password" required>
               <label>Password</label>
            </div>
            <div class="field">
               <input type="submit" name="form1" value="Login">
            </div>
           
            <div class="signup-link">
               Don't Have an account? <a href="signup.php">Signup now</a><br> <a href="forget-password.php">Forgot password?</a>
            </div>
         </form>
      </div>



<?php require_once('footer.php'); ?>

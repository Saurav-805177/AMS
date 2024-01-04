<?php require_once('header.php'); ?>
<?php
// Getting all language variables into array as global variable


if (isset($_POST['form1'])) 
{

    date_default_timezone_set("Asia/Kolkata");
    $valid = 1;

    if(empty($_POST['s_name'])) {
        $valid = 0;
        $error_message .= "Name Can Not Be Blank"."<br>";
    }

    if(empty($_POST['s_email'])) {
        $valid = 0;
        $error_message .= "Email Can Not Be Blank <br>";
    } else {
        if (filter_var($_POST['s_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= "Email address must be valid.<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tb2_student WHERE s_email=?");
            $statement->execute(array($_POST['s_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= "Email Address Already Exists <br>";
            }
        }
    }

    if(empty($_POST['s_phone1'])) {
        $valid = 0;
        $error_message .= "Phone Number Can Not be Blank <br>";
    }

    if( empty($_POST['s_password']) ) {
        $valid = 0;
        $error_message .= "Password Can Not Be Blank <br>";
    }

    if($valid == 1) {
        $token = md5(time());
        date_default_timezone_set("Asia/Kolkata");
        $s_datetime = date('d-m-Y h:i:s A');
        $s_timestamp = time();

       

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tb2_student (
                                        s_name,
                                        s_phone1,
                                        s_email,
                                        scurity_question,
                                        sq_answer,
                                        s_password,
                                        s_token,
                                        s_datetime,
                                        s_timestamp,
                                        s_status
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        strip_tags($_POST['s_name']),
                                        strip_tags($_POST['s_phone1']),
                                        strip_tags($_POST['s_email']),
                                        strip_tags($_POST['scurity_question']),
                                        strip_tags($_POST['sq_answer']),
                                        md5($_POST['s_password']),
                                        $token,
                                        $s_datetime,
                                        $s_timestamp,
                                        '1'
                                    ));

        // // Send email for confirmation of the account
        // $to = $_POST['cust_email'];
        
        // $subject = LANG_VALUE_150;
        // $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        // $message = ''.LANG_VALUE_151.'<br><br>

        // <a href="'.$verify_link.'">'.$verify_link.'</a>';

        // $headers = "From: noreply@" . BASE_URL . "\r\n" .
        //            "Reply-To: noreply@" . BASE_URL . "\r\n" .
        //            "X-Mailer: PHP/" . phpversion() . "\r\n" . 
        //            "MIME-Version: 1.0\r\n" . 
        //            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // // Sending Email
        // mail($to, $subject, $message, $headers);

        // unset($_POST['s_name']);
        // unset($_POST['s_fname']);
        // unset($_POST['s_email']);
        // unset($_POST['s_phone1']);
        // unset($_POST['s_phone2']);
        // unset($_POST['cust_address']);
        // unset($_POST['cust_city']);
        // unset($_POST['cust_state']);
        // unset($_POST['cust_zip']);

      $success_message = 'Register successfully';
      echo "Register successfully";
      header('location: login.php');
    }
}
?>



<section class="login">
     <?php if($error_message): ?>
            <div class="callout callout-danger">
                <p>
                <?php echo $error_message; ?>
                </p>
            </div>
            <?php endif; ?>

            <?php if($success_message): ?>
            <div class="callout callout-success">
                <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>

     <div class="wrapper">
         <div class="title">
            Sign Up
         </div>
         <form action="" method="post" enctype="multipart/form-data">
              <?php $csrf->echoInputField(); ?>
            <div class="field">
               <input type="text" name="s_name" required>
               <label>Name</label>
            </div>
            <div class="field">
               <input type="text" name="s_phone1" required>
               <label>Mobile</label>
            </div>
            <div class="field">
               <input type="text" name="s_email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="s_password" placeholder="Type password">
               <label>Password</label>
            </div>
            
            <div class="text"></div>
            <div class="field"> 
               <select name="scurity_question">
                  <option>Select Scurity Question</option>
                  <option value="Your favorite Color">Your favorite Color</option>
                  <option value="Your favorite playe">Your favorite player</option>
                  <option value="Your favorite city">Your favorite city</option>
                  <option value="Your favorite Friend">Your favorite Friend</option>
               </select>
            </div>
            <div class="field">
               <input type="text" name="sq_answer" required>
               <label>Answer</label>
            </div>
            <div class="field">
               <input type="submit" name="form1" value="Register">
            </div>
            <div class="signup-link">
               I have an Account? <a href="login.php">Signin now</a>
            </div>
         </form>
      </div>
</section> <!-- Contact Info Wrappper-->

<?php require_once('footer.php'); ?>
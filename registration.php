
<?php require_once('header.php'); ?>

<?php 
    $s_name=$_SESSION['student']['s_name'];
    $s_email=$_SESSION['student']['s_email'];
    $s_phone1=$_SESSION['student']['s_phone1'];
    $s_password=$_SESSION['student']['s_password'];
    $scurity_question=$_SESSION['student']['scurity_question'];
    $sq_answer=$_SESSION['student']['sq_answer'];

?>

<?php
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
        $error_message .= LANG_VALUE_131."<br>";
    } else {
        if (filter_var($_POST['s_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_student WHERE s_email=?");
            $statement->execute(array($_POST['s_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= LANG_VALUE_147."<br>";
                header("location:dashboard.php");
            }
        }
    }

    if(empty($_POST['s_phone1'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }
    // if(!empty($_POST['s_gender'])) 
    // {  
    //     $valid=0;
    //     $error_message .=" Plese select Gender<br>";  
    // }  

    if(empty($_POST['s_paddress'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

    if(empty($_POST['s_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['s_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['s_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['s_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    // if( empty($_POST['s_password']) || empty($_POST['s_re_password']) ) {
    //     $valid = 0;
    //     $error_message .= LANG_VALUE_138."<br>";
    // }

    // if( !empty($_POST['s_password']) && !empty($_POST['s_re_password']) ) {
    //     if($_POST['s_password'] != $_POST['s_re_password']) {
    //         $valid = 0;
    //         $error_message .= LANG_VALUE_139."<br>";
    //     }
    // }

    $filename1 = $_FILES["uploadfile1"]["name"];
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"];
    $folder1 = "assets/uploads/student/" . $filename1;

    $filename2 = $_FILES["uploadfile2"]["name"];
    $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
    $folder2 = "assets/uploads/student/" . $filename2;

    $filename3 = $_FILES["uploadfile3"]["name"];
    $tempname3 = $_FILES["uploadfile3"]["tmp_name"];
    $folder3 = "assets/uploads/student/" . $filename3;

    $filename4 = $_FILES["uploadfile4"]["name"];
    $tempname4 = $_FILES["uploadfile4"]["tmp_name"];
    $folder4 = "assets/uploads/student/" . $filename4;

    if($valid == 1) {
        $regnumber="R".mt_rand(100000000, 999999999);
        $token = md5(time());
        date_default_timezone_set("Asia/Kolkata");
        $s_datetime = date('d-m-Y h:i:s A');
        $s_timestamp = time();

        move_uploaded_file($tempname1, $folder1);
        move_uploaded_file($tempname2, $folder2);
        move_uploaded_file($tempname3, $folder3);
        move_uploaded_file($tempname4, $folder4);
        //$filename=1;
        // $filename2=2;
        // $filename3=3;
        // $filename4=4;

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_student (
                                        Registration_No,
                                        s_name,
                                        s_fname,
                                        s_mname,
                                        s_email,
                                        s_phone1,
                                        s_phone2,
                                        s_gender,
                                        s_dbo,
                                        s_fphone,
                                        s_mphone,
                                        s_foccupation,
                                        s_moccupation,
                                        s_country,
                                        s_caddress,
                                        s_paddress,
                                        s_city,
                                        s_state,
                                        s_pincode,
                                        s_area,
                                        s_nationality,
                                        s_Religion,
                                        s_category,
                                        s_10th_s_name,
                                        s_10th_bord_name,
                                        s_10th_passingyear,
                                        s_10th_certificate_no,
                                        s_10th_totalmarks,
                                        s_10th_certificatefile,
                                        s_10th_Division,
                                        

                                        s_12th_s_name,
                                        s_12th_bord_name,
                                        s_12th_passingyear,
                                        s_12th_certificate_no,
                                        s_12th_totalmarks,
                                        s_12th_certificatefile,
                                        s_12th_Division,
                                        s_12th_stream,

                                        s_photo,
                                        s_sign,

                                        s_applied_course,
                                        scurity_question,
                                        sq_answer,
                                        s_password,
                                        s_token,
                                        s_datetime,
                                        s_timestamp,
                                        Remark,
                                        s_status
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        $regnumber,
                                        strip_tags($_POST['s_name']),
                                        strip_tags($_POST['s_fname']),
                                        strip_tags($_POST['s_mname']),
                                        strip_tags($_POST['s_email']),
                                        strip_tags($_POST['s_phone1']),
                                        strip_tags($_POST['s_phone2']),
                                        strip_tags($_POST['s_gender']),
                                        strip_tags($_POST['s_dob']),
                                        strip_tags($_POST['s_fphone']),
                                        strip_tags($_POST['s_mphone']),
                                        strip_tags($_POST['s_foccupation']),
                                        strip_tags($_POST['s_moccupation']),
                                        strip_tags($_POST['s_country']),
                                        strip_tags($_POST['s_caddress']),
                                        strip_tags($_POST['s_paddress']),
                                        strip_tags($_POST['s_city']),
                                        strip_tags($_POST['s_state']),
                                        strip_tags($_POST['s_zip']),
                                        strip_tags($_POST['s_area']),
                                        strip_tags($_POST['s_nationality']),
                                        strip_tags($_POST['s_Religion']),
                                        strip_tags($_POST['s_category']),

                                        strip_tags($_POST['s_10th_s_name']),
                                        strip_tags($_POST['s_10th_bord_name']),
                                        strip_tags($_POST['s_10th_passingyear']),
                                        strip_tags($_POST['s_10th_certificate_no']),
                                        strip_tags($_POST['s_10th_totalmarks']),
                                        $filename2,
                                        strip_tags($_POST['s_10th_Division']),

                                        strip_tags($_POST['s_12th_s_name']),
                                        strip_tags($_POST['s_12th_bord_name']),
                                        strip_tags($_POST['s_12th_passingyear']),
                                        strip_tags($_POST['s_12th_certificate_no']),
                                        strip_tags($_POST['s_12th_totalmarks']),
                                        $filename3,
                                        strip_tags($_POST['s_12th_Division']),
                                        strip_tags($_POST['s_12th_stream']),

                                        $filename1,
                                        $filename4,
                                        strip_tags($_POST['s_applied_course']),
                                        $scurity_question,
                                        $sq_answer,


                                       
                                        $s_password,
                                        $token,
                                        $s_datetime,
                                        $s_timestamp,
                                        '',
                                        'NA'
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

         $success_message = 'Student Register successfully';
    }
}
// echo 'Register successfully';
// header("location: dashboard.php");
?>

<div class="wrapper">
    <div class="title">
        Registration  
    </div>
</div>
<div class="page">
    <div class="container">
        <div class="row">
            <div  class="col-md-12">
                <div class="user-content">

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
                    <form action="" method="post" enctype="multipart/form-data">
                          <?php $csrf->echoInputField(); ?>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <h1>Personal Details</h1>
                                

                                <div class="col-md-3 form-group">
                                    <label for="">Name*</label>
                                    <input type="text" class="form-control" readonly name="s_name" value="<?php echo $s_name; ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Email<span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" name="s_email" readonly value="<?php echo $s_email; ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Mobile<span style="color:red;">*</span></label>
                                    <div class="form-group ">
                                        <input type="text" class="form-control" placeholder="Primary Mobile Number" name="s_phone1" maxlength="10" max="10"  pattern="[0-9]{10}" readonly value="<?php echo $_SESSION['student']['s_phone1']; ?>">
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label> </label>
                                        <input type="text" class="form-control" placeholder="Secondery Mobile Number(Optionals)" name="s_phone2" maxlength="10" max="10"  pattern="[0-9]{10}" value="<?php if(isset($_POST['s_phone2'])){echo $_POST['s_phone2'];} ?>">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="">Father's Name<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_fname" value="<?php if(isset($_POST['s_fname'])){echo $_POST['s_fname'];} ?>">
                                </div>
                                <div class="col-md-4 form-group ">
                                    <label for="">Father's Mobile.No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="s_fphone" maxlength="10" max="10"  pattern="[0-9]{10}" value="<?php if(isset($_POST['s_fphone'])){echo $_POST['s_fphone'];} ?>">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Father's Occupation <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_foccupation" value="<?php if(isset($_POST['s_foccupation'])){echo $_POST['s_foccupation'];} ?>">
                                </div>
                                

                                <div class="col-md-4 form-group">
                                    <label for="">Mather's Name<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_mname" value="<?php if(isset($_POST['s_mname'])){echo $_POST['s_mname'];} ?>">
                                </div>
                                <div class="col-md-4 form-group ">
                                    <label for="">Mather's Mobile.No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="s_mphone" maxlength="10" max="10"  pattern="[0-9]{10}" value="<?php if(isset($_POST['s_mphone'])){echo $_POST['s_mphone'];} ?>">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Mather's Occupation <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_moccupation" value="<?php if(isset($_POST['s_moccupation'])){echo $_POST['s_moccupation'];} ?>">
                                </div>
                                 
                                
                                <div class="col-md-6 form-group">
                                    <label for="">Permanent Address <span style="color:red;">*</span></label>
                                    <textarea name="s_paddress" class="form-control" cols="30" rows="10" style="height:70px;"><?php if(isset($_POST['s_paddress'])){echo $_POST['s_paddress'];} ?></textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Current Address<span style="color:red;">*</span></label>
                                    <textarea name="s_caddress" class="form-control" cols="30" rows="10" style="height:70px;"><?php if(isset($_POST['s_caddress'])){echo $_POST['s_caddress'];} ?></textarea>
                                </div>
                               
                                <div class="col-md-2 form-group">
                                    <label for="">Gender <span style="color:red;">*</span></label>
                                    <div >
                                        <select class="form-control select2" name="s_gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Femaale">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Date Of Brith<span style="color:red;">*</span></label>
                                    <input type="date" class="form-control fc-datepicker" data-date-format="d-m-Y" name="s_dob" id="s_dob" value="<?php if(isset($_POST['s_dob'])){echo $_POST['s_dob'];} ?>">
                                    
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Category <span style="color:red;">*</span></label>
                                    <div >
                                        <select class="form-control select2" name="s_category">
                                            <option value="">Select Category</option>
                                            <option value="OBC">OBC</option>
                                            <option value="SC">SC</option>
                                            <option value="BC-1">BC-1</option>
                                            <option value="BC-2">BC-2</option>
                                            <option value="ST">ST</option>
                                            <option value="GEN">GEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Area <span style="color:red;">*</span></label>
                                    <div >
                                        <select class="form-control select2" name="s_area">
                                            <option value="">Select Area</option>
                                            <option value="Urban">Urban</option>
                                            <option value="Rural">Rural</option>
                                            <option value="City">City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Cuntry <span style="color:red;">*</span></label>
                                    <select name="s_country" class="form-control select2">
                                        <option value="">Select country</option>
                                        <?php
                                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                    $statement->execute();
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                        <?php
                                    }
                                    ?> 
                                        
                                    </select>                                    
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Nationality <span style="color:red;">*</span></label>
                                    <div >
                                        <select class="form-control select2" name="s_nationality">
                                            <option value="">Select Nationality</option>
                                            <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY Nationality ASC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                                foreach ($result as $row) {
                                            ?>
                                            <option value="<?php echo $row['country_id']; ?>"><?php echo $row['Nationality']; ?></option>
                                            <?php
                                            }
                                            ?>     
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Religion<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_Religion" value="<?php if(isset($_POST['s_Religion'])){echo $_POST['s_Religion'];} ?>">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">State <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_state" value="<?php if(isset($_POST['s_state'])){echo $_POST['s_state'];} ?>">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">City <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_city" value="<?php if(isset($_POST['s_city'])){echo $_POST['s_city'];} ?>">
                                </div>

                                <div class="col-md-2 form-group">
                                    <label for="">Pin Code<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_zip" maxlength="6" max="6"  pattern="[0-9]{6}" value="<?php if(isset($_POST['s_zip'])){echo $_POST['s_zip'];} ?>">
                                </div>
                                 
                                
                                 <div class="col-md-6 form-group">
                                    <label for="">Upload Photo *</label>
                                    <div class="" style="padding-top:5px">
                                        <input type="file" name="uploadfile1" id="uploadfile1" value="<?php if(isset($_POST['uploadfile1'])){echo $_POST['uploadfile1'];} ?>">(Only jpg, jpeg, gif and png are allowed)
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Upload Sign<span style="color:red;">*</span></label>
                                    <input type="file" name="uploadfile4" id="uploadfile4" value="<?php if(isset($_POST['uploadfile4'])){echo $_POST['uploadfile4'];} ?>">(Only jpg, jpeg, gif and png are allowed)
                                </div>
                            </div>

                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <h1>Academic Qualification</h1>
                                
                                <p>Class X</p>


                                <div class="col-md-6 form-group">

                                    <label for="">School Name<span style="color:red;">*</span></label>
                                    <textarea name="s_10th_s_name" class="form-control" cols="20" rows="2" style="height:105px;"><?php if(isset($_POST['s_10th_s_name'])){echo $_POST['s_10th_s_name'];} ?></textarea>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Name of Board/University<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_10th_bord_name">
                                        <option>Select Bord Name</option>
                                        <option value="BSEB">BSEB</option>
                                        <option value="CBSE">CBSE</option>
                                        <option value="ICSE">ICSE</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Certificate No<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_10th_certificate_no" value="<?php if(isset($_POST['s_10th_certificate_no'])){echo $_POST['s_10th_certificate_no'];} ?>">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Passing of Year<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_10th_passingyear">
                                        <option>Select Passing Year</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Mark Obtained <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" name="s_10th_totalmarks" value="<?php if(isset($_POST['s_10th_totalmarks'])){echo $_POST['s_10th_totalmarks'];} ?> ">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Division<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_10th_Division">
                                        <option>Select Division</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label>Upload 10th Marks sheet<span style="color:red;">*</span></label>
                                    <input type="file" name="uploadfile2" id="uploadfile2" value="<?php if(isset($_POST['uploadfile2'])){echo $_POST['uploadfile2'];} ?>">(Only jpg, jpeg, gif and png are allowed)
                                </div>
                                </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <p>Class XII</p>


                                <div class="col-md-6 form-group">

                                    <label for="">School Name<span style="color:red;">*</span></label>
                                    <textarea name="s_12th_s_name" class="form-control" cols="20" rows="2" style="height:105px;"><?php if(isset($_POST['s_12th_s_name'])){echo $_POST['s_12th_s_name'];} ?></textarea>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Name of Board/University<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_12th_bord_name">
                                        <option>Select Bord Name<span style="color:red;">*</span></option>
                                        <option value="BSEB">BSEB</option>
                                        <option value="CBSE">CBSE</option>
                                        <option value="ICSE">ICSE</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Certificate No<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="s_12th_certificate_no" value="<?php if(isset($_POST['s_12th_certificate_no'])){echo $_POST['s_12th_certificate_no'];} ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Stream<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_12th_stream">
                                        <option>Select Stream</option>
                                        <option value="Science">Science</option>
                                        <option value="Arts">Arts</option>
                                        <option value="commerce">commerce</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Passing of Year<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_12th_passingyear">
                                        <option>Select Passing Year</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Mark Obtained <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" name="s_12th_totalmarks" value="<?php if(isset($_POST['s_12th_totalmarks'])){echo $_POST['s_12th_totalmarks'];} ?> ">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Division<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_12th_Division">
                                        <option>Select Division</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Upload 12th Marks sheet<span style="color:red;">*</span></label>
                                   <input type="file" name="uploadfile3" id="uploadfile3" value="<?php if(isset($_POST['uploadfile3'])){echo $_POST['uploadfile3'];} ?>">(Only jpg, jpeg, gif and png are allowed)
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                 <div class="col-md-4 form-group">
                                    <label for="">Select Course<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="s_applied_course">
                                        <option>Select Applied Course</option>
                                        <option value="B.SC-IT">B.SC-IT</option>
                                        <option value="BCA">BCA</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="BBM">BBM</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <div class="col-md-4 form-group" hidden>
                                    <label for="">Scurity Question<span style="color:red;">*</span></label>
                                    <select class="form-control select2" name="scurity_question">
                                        <option>Select Scurity Question</option>
                                        <option value="Your favorite Color">Your favorite Color</option>
                                        <option value="Your favorite playe">Your favorite player</option>
                                        <option value="Your favorite city">Your favorite city</option>
                                        <option value="Your favorite Friend">Your favorite Friend</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group" hidden>
                                    <label for="">Answer<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="sq_answer" value="<?php if(isset($_POST['sq_answer'])){echo $_POST['sq_answer'];} ?>">
                                </div>
                               </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12" hidden>
                                <div class="col-md-3 form-group">
                                    <label for="">Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" name="s_password">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Retype Password<span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" name="s_re_password">
                                </div>
                                </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <div class="col-md-6 form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-danger" value="submit" name="form1">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>









<?php require_once('footer.php'); ?>

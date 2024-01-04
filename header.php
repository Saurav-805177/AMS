<!-- This is main configuration File -->
<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Getting all language variables into array as global variable
$i=1;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
    define('LANG_VALUE_'.$i,$row['lang_value']);
    $i++;
}

$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $logo = $row['logo'];
    $favicon = $row['favicon'];
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $meta_title_home = $row['meta_title_home'];
    $meta_keyword_home = $row['meta_keyword_home'];
    $meta_description_home = $row['meta_description_home'];
    $before_head = $row['before_head'];
    $after_body = $row['after_body'];
}

// Checking the order table and removing the pending transaction that are 24 hours+ old. Very important
$current_date_time = date('Y-m-d H:i:s');
$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
    $ts1 = strtotime($row['payment_date']);
    $ts2 = strtotime($current_date_time);     
    $diff = $ts2 - $ts1;
    $time = $diff/(3600);
    if($time>24) {

        // Return back the stock amount
        $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement1->execute(array($row['payment_id']));
        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result1 as $row1) {
            $statement2 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
            $statement2->execute(array($row1['product_id']));
            $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);                         
            foreach ($result2 as $row2) {
                $p_qty = $row2['p_qty'];
            }
            $final = $p_qty+$row1['quantity'];

            $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
            $statement->execute(array($final,$row1['product_id']));
        }
        
        // Deleting data from table
        $statement1 = $pdo->prepare("DELETE FROM tbl_order WHERE payment_id=?");
        $statement1->execute(array($row['payment_id']));

        $statement1 = $pdo->prepare("DELETE FROM tbl_payment WHERE id=?");
        $statement1->execute(array($row['id']));
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript"> -->
    <meta name="author" content="SIIT">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>SIIT</title> -->
    <link rel="shortcut icon" style="border-radius:50%;" href="assets/Uploads/<?php echo $favicon; ?>" type="image/x-icon">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">    
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">    
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/assets/owl.theme.css">     
    <link rel="stylesheet" href="css/assets/animate.css"> 
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="css/assets/slick.css">  

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="css/assets/revolution/layers.css">
    <link rel="stylesheet" href="css/assets/revolution/navigation.css">
    <link rel="stylesheet" href="css/assets/revolution/settings.css">    
    <!-- Mean Menu-->
    <link rel="stylesheet" href="css/assets/meanmenu.css">
    
    <!-- main style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/demo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/rating.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/tree-menu.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
    <link rel="stylesheet" href="admin/css/datepicker3.css">
    <link rel="stylesheet" href="admin/css/all.css">
    <link rel="stylesheet" href="admin/css/select2.min.css">
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="admin/css/jquery.fancybox.css">
    <link rel="stylesheet" href="admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="admin/css/_all-skins.min.css">
    <link rel="stylesheet" href="admin/css/on-off-switch.css"/>
    <link rel="stylesheet" href="admin/css/summernote.css">
    <link rel="stylesheet" href="admin/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
<style type="text/css">
       
body{
  display:relative;
  height: 100%;
  width: 100%;
  position: relative;
  text-anchor: red;
  background: no-repeat;
  place-items: center;
  background: #f2f2f2;
  color: black;
   background: linear-gradient(-135deg,#c850c0,#ff24 ,#6787); 
}
::selection{
  background: #4158d0;
  color: #fff;
}

.wrapper{
    margin-left: 40%;
  width: 380px;
  margin-top: 100px;
  margin-bottom: 50px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  line-height: 100px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
}
.wrapper form{
  padding: 10px 30px 50px 30px;
}
.wrapper form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.wrapper form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field select{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.wrapper form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .content{
  display: flex;
  width: 100%;
  margin-top: 0;
 margin-bottom: 0;
  font-size: 16px;
  align-items: center;
  justify-content: space-around;
}
form .content .checkbox{
  display: relative;
  align-items: left;
  justify-content: left;
}
form .content input{
  width: 15px;
  height: 15px;
  background: red;
}
form .content label{
  color: #262626;
  user-select: none;
  padding-left: 5px;
}
form .content .pass-link{
  color: "";
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  transition: all 0.3s ease;
}
form .field input[type="submit"]:active{
  transform: scale(0.95);
}

form .signup-link{
  color: #262626;
  margin-top: 20px;
  text-align: center;
}
form .pass-link a,
form .signup-link a{
  color: #4158d0;
  text-decoration: none;
}
form .pass-link a:hover,
form .signup-link a:hover{
  text-decoration: underline;
}
    </style>

<?php

    $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
    foreach ($result as $row) {
        $about_meta_title = $row['about_meta_title'];
        $about_meta_keyword = $row['about_meta_keyword'];
        $about_meta_description = $row['about_meta_description'];
        $faq_meta_title = $row['faq_meta_title'];
        $faq_meta_keyword = $row['faq_meta_keyword'];
        $faq_meta_description = $row['faq_meta_description'];
        $blog_meta_title = $row['blog_meta_title'];
        $blog_meta_keyword = $row['blog_meta_keyword'];
        $blog_meta_description = $row['blog_meta_description'];
        $contact_meta_title = $row['contact_meta_title'];
        $contact_meta_keyword = $row['contact_meta_keyword'];
        $contact_meta_description = $row['contact_meta_description'];
        $pgallery_meta_title = $row['pgallery_meta_title'];
        $pgallery_meta_keyword = $row['pgallery_meta_keyword'];
        $pgallery_meta_description = $row['pgallery_meta_description'];
        $vgallery_meta_title = $row['vgallery_meta_title'];
        $vgallery_meta_keyword = $row['vgallery_meta_keyword'];
        $vgallery_meta_description = $row['vgallery_meta_description'];
    }

    $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    
    if($cur_page == 'index.php' || $cur_page == 'login.php' || $cur_page == 'registration.php'|| $cur_page == 'forget-password.php' || $cur_page == 'reset-password.php' ) {
        ?>
        <title><?php echo $meta_title_home; ?></title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
        <?php
    }

    if($cur_page == 'about.php') {
        ?>
        <title><?php echo $about_meta_title; ?></title>
        <meta name="keywords" content="<?php echo $about_meta_keyword; ?>">
        <meta name="description" content="<?php echo $about_meta_description; ?>">
        <?php
    }
    if($cur_page == 'faq.php') {
        ?>
        <title><?php echo $faq_meta_title; ?></title>
        <meta name="keywords" content="<?php echo $faq_meta_keyword; ?>">
        <meta name="description" content="<?php echo $faq_meta_description; ?>">
        <?php
    }
    if($cur_page == 'contact.php') {
        ?>
        <title><?php echo $contact_meta_title; ?></title>
        <meta name="keywords" content="<?php echo $contact_meta_keyword; ?>">
        <meta name="description" content="<?php echo $contact_meta_description; ?>">
        <?php
    }
   

    if($cur_page == 'dashboard.php') {
        ?>
        <title>Dashboard - <?php echo $meta_title_home; ?></title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
        <?php
    }
    if($cur_page == 'customer-profile-update.php') {
        ?>
        <title>Update Profile - <?php echo $meta_title_home; ?></title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
        <?php
    }
    
    if($cur_page == 'customer-password-update.php') {
        ?>
        <title>Update Password - <?php echo $meta_title_home; ?></title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
        <?php
    }
    ?>
    
    <?php if($cur_page == 'blog-single.php'): ?>

        <meta property="og:title" content="<?php echo $og_title; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo BASE_URL.$og_slug; ?>">
        <meta property="og:description" content="<?php echo $og_description; ?>">
        <meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
    <?php endif; ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

   

<?php echo $before_head; ?>
</head>
<body>

<header class="header_tow about_page">
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>    
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="info_wrapper">
                        <div class="contact_info">                   
        					<ul class="list-unstyled">
                                <li><i class="flaticon-phone-receiver"></i><?php echo $contact_phone; ?></li>
                                <li><i class="flaticon-mail-black-envelope-symbol"></i><?php echo$contact_email; ?></li>
        					</ul>                    
                        </div>
                        <div class="login_info">

                             <ul class="d-flex">
                                <?php
                                if(isset($_SESSION['student'])) {
                                ?>
                                <li><a><i class="fa fa-user"></i> Logged in as <?php echo $_SESSION['student']['s_name']; ?></a></li>
                                <li><a href="dashboard.php"><i class="fa fa-home"></i>Student Dashboard</a></li>
                                <li><a href="logout.php"><i></i>Logout</a></li>
                                 <?php
                                 } else {
                                 ?>
                                <li class="nav-item"><a href="signup.php" class="nav-link sign-in "><i class="flaticon-user-male-black-shape-with-plus-sign"></i>Sign Up</a></li>
                                <li class="nav-item"><a href="login.php" class="nav-link join_now "><i class="flaticon-padlock"></i>Lon In</a></li>
                                <?php   
                                }
                             ?>
                            </ul>
                            <?php
                                if(isset($_SESSION['student'])) {
                                ?>
                            <a href="registration.php" title="" class="apply_btn">Apply Now</a>
                            <?php
                                 } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="edu_nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-faded">

                <a class="navbar-brand" href="index.php"><img style="height: 50px; width: 400px;" src="assets/Uploads/<?php echo $logo; ?>" alt="logo"></a>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent" style="color: red;">
                    <ul class="navbar-nav nav lavalamp ml-auto menu">
                        <li class="nav-item"><a href="index.php" class="nav-link active">Home</a>

                        </li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="course.php" class="nav-link">Courses</a>
                            <ul class="navbar-nav nav mx-auto">
                                <li class="nav-item"><a href="course.php" class="nav-link">B.SC-IT</a></li>
                                <li class="nav-item"><a href="course.php" class="nav-link">BCA</a></li>
                                <li class="nav-item"><a href="course.php" class="nav-link">BBM</a></li>
                                <li class="nav-item"><a href="course.php" class="nav-link">BBA</a></li>
                                <li class="nav-item"><a href="course.php" class="nav-link">MCA</a></li>
                                <li class="nav-item"><a href="course.php" class="nav-link">MBA</a></li>
                                
                            </ul> 
                        </li>
                        <li class="nav-item"><a href="evant.php" class="nav-link">Gallery</a>
                            <ul class="navbar-nav nav mx-auto">
                                                
                                <li class="nav-item"><a href="evant.php" class="nav-link dropdown_icon">Events</a>
                                    <ul class="navbar-nav nav mx-auto">
                                        <li class="nav-item"><a href="evant.php" class="nav-link">Event</a></li>
                                        <li class="nav-item"><a href="evant_details.php" class="nav-link">Event Details</a></li>
                                    </ul>    
                                </li>                                
                                <li class="nav-item"><a href="blog_details.php" class="nav-link">Blog</a>
                                      
                                </li> 
                            </ul>                            
                        </li>     
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div>
                <div class="mr-auto search_area ">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><i class="search_btn flaticon-magnifier"></i>
                            <div id="search">
                                <button type="button" class="close">×</button>
                                 <form>
                                     <input type="search" value="" placeholder="Search here...."  required/>
                                 </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav><!-- END NAVBAR -->
        </div> 
    </div>

</header><!--  End header section-->

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $logo = $row['logo'];
    
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $footer_copyright=$row['footer_copyright'];
    $contact_address=$row['contact_address'];
    $contact_map_iframe=$row['contact_map_iframe'];
}
$statement = $pdo->prepare("SELECT * FROM tbl_social");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    if($row['social_name']=='Facebook')
    {
        $facebook_url=$row['social_url'];
    }
    if($row['social_name']=='Twitter')
    {
        $Twitter_url=$row['social_url'];
    }
    if($row['social_name']=='Instagram')
    {
        $Instagram_url=$row['social_url'];
    }
    if($row['social_name']=='WhatsApp')
    {
        $WhatsApp_url=$row['social_url'];
    }
    if($row['social_name']=='LinkedIn')
    {
        $LinkedIn_url=$row['social_url'];
    }
    if($row['social_name']=='YouTube')
    {
        $YouTube_url=$row['social_url'];
    }
}
?>

<!-- Footer -->  
<footer class="footer_2">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-12 col-md-1 col-lg-4">
                    <div class="footer_single_col footer_intro">
                        <img style="height: 50px; width: 300px;" src="assets/Uploads/<?php echo $logo; ?>" alt="logo">
                        <p>Top MCA collage in the Bihar </p>
                    </div>
                </div>
                <div class="col-12 col-md-1 col-lg-2">
                    <div class="footer_single_col">
                        <h3>Useful Links</h3>
                        <ul class="location_info quick_inf0">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="course.php">Courese</a></li>
                            <li><a href="evant.php">Gallery</a></li>
                            <li><a href="contact.php">contact Us</a></li>
                        </ul>                         
                    </div>
                </div>
                <div class="col-12 col-md-1 col-lg-2">
                    <div class="footer_single_col" >
                        <h3>Course</h3>
                        <ul class="location_info quick_inf0">
                            <li><a href="course.php">B.SC-IT</a></li>
                            <li><a href="course.php">BCA</a></li>
                            <li><a href="course.php">MCA</a></li>
                            <li><a href="course.php">MBA</a></li>
                            <li><a href="course.php">BBM</a></li>
                            <li><a href="course.php">BBA</a></li>
                        </ul>                         
                    </div>
                </div>
                <div class="col-12 col-md-1 col-lg-4">
                    <div class="footer_single_col contact">
                        <h3>Contact Us</h3>
                        <span><Address><?php echo $contact_address; ?> </Address></span>
                        
                        <div class="contact_info">
                            <p><span><?php echo $contact_phone; ?></span></p><br>
                           <p><span class="email"><?php echo $contact_email;  ?></span></p>
                        </div>

                        <ul class="social_items d-flex list-unstyled">
                            <li><a href="<?php echo $facebook_url; ?>"><i class="fab fa-facebook-f fb-icon"></i></a></li>
                            <li><a href="<?php echo $Twitter_url; ?>"><i class="fab fa-twitter twitt-icon"></i></a></li>
                            <li><a href="<?php echo $LinkedIn_url; ?>"><i class="fab fa-linkedin-in link-icon"></i></a></li>
                            <li><a href="<?php echo $Instagram_url; ?>"><i class="fab fa-instagram ins-icon"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                 <div class="col-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        <a target="_blank" href=""><?php echo $footer_copyright; ?></a>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="shapes_bg">
        <img src="images/shapes/testimonial_2_shpe_1.png" alt="" class="shape_3">        
        <img src="images/shapes/footer_2.png" alt="" class="shape_1">
    </div>    
</footer><!-- End Footer -->

<section id="scroll-top" class="scroll-top">
    <h2 class="disabled">Scroll to top</h2>
    <div class="to-top pos-rtive">
        <a href="#"><i class = "flaticon-right-arrow"></i></a>
    </div>
</section>
<!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Revolution Slider -->
    <script src="js/assets/revolution/jquery.themepunch.revolution.min.js"></script>
    <script src="js/assets/revolution/jquery.themepunch.tools.min.js"></script> 
    <script src="js/jquery.magnific-popup.min.js"></script>     
    <script src="js/owl.carousel.min.js"></script>   
    <script src="js/slick.min.js"></script>   
    <script src="js/jquery.meanmenu.min.js"></script>   
    <script src="js/wow.min.js"></script> 
    <!-- Counter Script -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>

    <!-- Revolution Extensions -->
    <script src="js/assets/revolution/extensions/revolution.extension.actions.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.carousel.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.migration.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.navigation.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.parallax.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="js/assets/revolution/extensions/revolution.extension.video.min.js"></script>
    <script src="js/assets/revolution/revolution.js"></script>
    <script src="js/custom.js"></script>  
    



    

    
    <!-- =========================================================
         STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
    ============================================================== -->
    <script type="text/javascript" src="js/demo.js"></script>
</body>
</html>
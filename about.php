<?php require_once('header.php'); ?>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
    $about_title = $row['about_title'];
    $about_content = $row['about_content'];
    $about_banner = $row['about_banner'];
    $about_meta_title = $row['about_meta_title'];
    $about_meta_keyword = $row['about_meta_keyword'];
    $about_meta_description = $row['about_meta_description'];
    $faq_title = $row['faq_title'];
    $faq_banner = $row['faq_banner'];
    $faq_meta_title = $row['faq_meta_title'];
    $faq_meta_keyword = $row['faq_meta_keyword'];
    $faq_meta_description = $row['faq_meta_description'];
    $contact_title = $row['contact_title'];
    $contact_banner = $row['contact_banner'];
    $contact_meta_title = $row['contact_meta_title'];
    $contact_meta_keyword = $row['contact_meta_keyword'];
    $contact_meta_description = $row['contact_meta_description'];

}
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<section class="about_page header_inner">
    <div class="intro_wrapper">
        <div class="container">  
            <div class="row">        
                 <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="intro_text">
                        <h1>About BIIT</h1>
                        <div class="pages_links">
                            <a href="index.php" title="">Home</a>
                            <a href="about.php" title="">about</a>
                        </div>
                    </div>
                </div>              

            </div>
        </div> 
    </div> 
</section>
<section class="about_us">
    <div class="container">            
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <div class="about_title">
                    <span>About Us</span>
                    <h2><?php echo $about_title; ?></h2>
                 </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 p-0">
                <div class="banner_about">
                    <img src="images/banner/about_thinking.jpg" alt="" class="img-fluid">
                 </div>
            </div>
        </div>        
        <div class="row about_content_wrapper">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 p-0">
                <div class="about_banner_down">
                    <img src="images/blog/blog_3.jpg" alt="" class="img-fluid">
                 </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <div class="about_content">
                    <?php echo $about_content; ?>
                    
                    <a href="index.php" title="">Read More About Us <i class="fas fa-angle-right"></i></a>
                 </div>
            </div>
        </div>
    </div>    
</section>


<!--========={ Popular Courses }========-->
<section class="unlimited_possibilities" id="about_unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Unlimited Possibilities</h2>
                    <p>Effective use of education equipment can enhance the learning experience and help students develop new skills and knowledge. However, it's important to ensure that equipment is properly maintained, updated, and used in a safe and responsible manner.</p>  
                </div><!-- ends: .section-header -->
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item single_item_first">
                    <div class="icon_wrapper">
                        <i class="flaticon-student"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Education</a></h3> 
                        <p>Effective use of education equipment can enhance the learning experience and help students develop new skills and knowledge. However, it's important to ensure that equipment is properly maintained, updated, and used in a safe and responsible manner.</p>                    
                    </div>   
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_center">
                    <div class="icon_wrapper">
                        <i class="flaticon-university"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Result</a></h3> 
                        <p>One of the biggest advantages of online courses is their flexibility. Students can learn at their own pace, and often at their own time, making it easier to fit education into their busy schedules. They can also choose from a wide range of courses.</p>                    
                    </div>   
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
               <div class="single_item single_item_last">
                <div class="icon_wrapper">
                        <i class="flaticon-diploma"></i>
                    </div>
                    <div class="blog_title">
                        <h3>
                            <a href="#" title="">Placement</a>
                        </h3> 
                        <p>campus recruiting is a program conducted within universities or other educational to provide jobs to students nearing completion of their studies. In termthe educational institutions partner with corporations who wish to recruit from the student population.</p>
                    </div>   
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_center">
                    <div class="icon_wrapper">
                      <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Our Mission</a></h3> 
                        <p>To unlock the potential of the people of eastern India and to strengthen rural/semi rural and backward communities by upgrading their skills and making them capable of earning their livelihood and to optimize human potential, increase happiness,
                             and maximize the engagement of people by providing superior solutions to them.</p>                    
                    </div>   
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
               <div class="single_item single_item_last">
                <div class="icon_wrapper">
                        <i class="flaticon-diploma"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Our Vision</a></h3> 
                        <p>To prepare youth for a productive adulthood through entrepreneurship, technology and life skills education and to enhance the livelihood quality of individual, family, community and groups seeking assistance by upgrading their knowledge and skills. 
                            To create an organization which could provide employment.
                        </p>
                    </div>   
                </div>
            </div>            
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_last">
                    <div class="icon_wrapper">
                        <i class="flaticon-open-book"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Book Library</a></h3> 
                        <p>A library is a place where collections of books and other resources are stored and made available to the public for reading, reference, and research. Libraries play a crucial role in promoting literacy and education by providing access to a wide range of materials. Now it is most demandable thing in college or university.</p>                    
                    </div>   
                </div>
            </div>
                    
        </div>
    </div>
</section><!-- End Popular Courses -->


<!--========={ Register Area }========-->
<section class="register_area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <div class="row">
                    <div class="form-full-box">
                        <div class="form_title">
                            <h2>Become A Membar</h2>
                            <p>Get Instant access to <span>5000+ </span>Video courses </p>
                        </div>
                        <form>
                            <div class="register-form">
                                <div class="row">
                                    <div class="col-12 col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label><i class="fas fa-user"></i></label>
                                            <input class="form-control" name="name" placeholder="Write Your Name" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label><i class="flaticon-email"></i></label>
                                            <input class="form-control" name="email" placeholder="Write Your E-mail" required="" type="email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-md-12">
                                        <div class="form-group massage_text">
                                            <label><i class="flaticon-copywriting"></i></label>
                                            <textarea class="form-control"  placeholder="Write Something Here" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xs-12 col-md-12 register-btn-box">
                                        <button class="register-btn" type="submit">Send Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 form-content">
                <h2>All study opportunities<br>in one single place</h2>
                <p>Effective use of education equipment can enhance the learning experience and help students develop new skills and knowledge. 
                    However, it's important to ensure that equipment is properly maintained, updated, and used in a safe and responsible manner.
                </p>
                <div class="count_student">
                    <div class="single_count">
                        <span class="counter">54000</span>
                        <span class="department_name">Students</span>
                    </div>                    
                    <div class="single_count">
                        <span class="counter">1650</span>
                        <span class="department_name">Scholarships</span>
                    </div>                    
                    <div class="single_count">
                        <span class="counter">5</span>
                        <span class="department_name">Courses</span>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section><!-- ./ End Register Area section -->


<!--========={ Our Instructiors }========-->

<section class="our_instructors">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Meet Our Professors</h2>
                    <p></p>  
                </div><!-- ends: .section-header -->
            </div>
            <div class="single-wrappe col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="team-single-item">
                    <figure>
                        <div class="member-img">
                            <div class="teachars_pro">
                                <img src="images/team/team_1.jpg" alt="member img" class="img-fluid">
                            </div>
                        </div>
                        <figcaption>
                            <div class="member-name">
                                <h4><a href="#" title="">Jonny</a></h4>
                                <span>Director,Professor</span>
                            </div>                            
                        </figcaption>
                    </figure>
                </div>
            </div>
            
            <div class="single-wrapper col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="team-single-item">
                    <figure>
                        <div class="member-img">
                            <div class="teachars_pro">
                                <img src="images/team/team_2.jpg" alt="member img" class="img-fluid">
                            </div>
                        </div>
                        <figcaption>
                            <div class="member-name">
                                <h4><a href="#" title="">Mr. Rana</a></h4>
                                <span>HOD, IT Department</span>
                            </div>                            
                        </figcaption>
                    </figure>
                </div>
            </div>
            
            <div class="single-wrapper  col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="team-single-item ">
                    <figure>
                        <div class="member-img">
                            <div class="teachars_pro">
                                <img src="images/team/team_3.jpg" alt="member img" class="img-fluid">
                            </div>
                        </div>
                        <figcaption>
                            <div class="member-name">
                                <h4><a href="#" title="">Jonathon Smith</a></h4>
                                <span>Coordinator</span>
                            </div>                            
                        </figcaption>
                    </figure>
                </div>
            </div>
                               
                                
                             
        </div>
    </div>
</section><!-- ./ End Our Instructiors -->


<section class="out_count_student">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Everything Is BIIT</h2>
                    <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system,
                         and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.
                    </p>  
                </div><!-- ends: .section-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="counter_wrapper">
                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1200 </span><span class="count_icon">+</span></div>
                            <span>Active students</span>
                        </div>
                    </div>

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1300 </span><span class="count_icon">+</span></div>
                            <span>Online Courses</span>
                        </div>  
                    </div>  

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1050 </span><span class="count_icon">+</span></div>
                            <span>Satisfaction</span>
                        </div>
                    </div>

                    <div class="counter_single_wrapper">
                        <div class="section count_single">
                            <div class="project-count"><span class="counter">1500 </span><span class="count_icon">+</span></div>
                            <span>Fraduates</span>
                        </div>  
                    </div> 
                </div> 
            </div>
        </div>
    </div>
    <div class="bg_shapes">
        
    </div>
</section><!-- End Testimonial -->
<section class="teamgroup">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0"> 
                <div class="teamgroup_info_wrapper">
                    <h2>To Start Your career with BIIT</h2>
                    <a href="#" title="" class="srtarte_btn">Get Started Now</a>
                </div>   
                <div class="teamgroup_info_banner">
                    <img src="images/banner/teamgroup.png" alt="" class="img-fluid">
                </div>  
            </div>
        </div>
    </div>                
</section>



<?php require_once('footer.php'); ?>

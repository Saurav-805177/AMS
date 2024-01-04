<?php require_once('header.php'); ?>


    <!--==================
        Slider
    ===================-->

    <div class="rev_slider_wrapper">

        <div id="rev_slider_2" class="rev_slider" style="display:none">
            <!-- BEGIN SLIDES LIST -->
            <ul>
        <?php
        $i=0;
        $c=2;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>
                <li data-index="rs-170<?php echo $c; ?>" data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                <div class="slider-overlay"></div>

                <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                <img src="assets/uploads/<?php echo $row['photo']; ?>" alt="Sky" class="rev-slidebg"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption font-lora sfb tp-resizeme letter-space-5 h-p" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" data-voffset="['-300','-280','-250','-200']" 
                        data-fontsize="['60','40','30','18']"
                        data-lineheight="['70','80','70','70']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":400,"to":"o:1;","delay":100,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'

                        style="z-index: 7; color:#fff; font-family:'Rubik', sans-serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;"><?php echo nl2br($row['content']); ?>
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption NotGeneric-Title   tp-resizeme" 
                         id="slide-3045-layer-1" 
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                         data-y="['middle','middle','middle','middle']" data-voffset="['-150','-140','-120','-120']"
                        data-fontsize="['170','120','80','40']"
                        data-lineheight="['200','120','70','70']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                        data-paddingtop="[10,10,10,10]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[10,10,10,10]"
                        data-paddingleft="[0,0,0,0]"

                        style="z-index: 5; font-family:'Roboto', sans-serif; font-weight: 700; white-space: nowrap;text-transform:left;"><br><?php echo $row['heading']; ?>
                    </div>

                    
                    <!-- LAYER NR. 5 -->
                    <div class="tp-caption rev-btn rev-btn right-btn" 
                        id="slide-2939-layer-8" 
                        data-x="['center','center','center','center']" data-hoffset="['380','-280','-190','-120']" 
                        data-y="['middle','middle','top','top']"  data-voffset="['360','220','600','450']" 
                        data-fontsize="['14','14','10','8']"
                        data-lineheight="['34','34','30','20']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="button" 
                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                        data-responsive_offset="on" 
                        data-responsive="off"
                       data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#fff;bg:#ff5a2c;bw:2px 2px 2px 2px; "}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[12,12,8,8]"
                            data-paddingright="[40,40,30,25]"
                        data-paddingbottom="[12,12,8,8]"
                        data-paddingleft="[40,40,30,25]"

                    style="z-index: 14; white-space: nowrap;  font-weight:500; color:#ffffff; font-family:Rubik; text-transform:uppercase; background-color:#092ace; letter-spacing:1px; border-radius: 3px;">
                    <a href="<?php echo $row['button_url']; ?>"><?php echo $row['button_text']; ?></a>
                    </div>
                </li>
                 <?php
            $i++;
            $c=$c+2;
             }
            ?>
                
            </ul><!-- END SLIDES LIST -->

        </div><!-- END SLIDER CONTAINER -->

    </div><!-- END SLIDER CONTAINER WRAPPER -->








<section class="unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Unlimited Possibilities</h2>
                    <p>There are provide lot's of opportunities to grow your career. </p>  
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
                        <p>One of the biggest advantages of online courses is their flexibility. Students can learn at their own pace, and often at their own time, making it easier to fit education into their busy schedules. They can also choose from a wide range of courses and instructors from all over the world</p>                    
                    </div>   
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
               <div class="single_item single_item_last">
                <div class="icon_wrapper">
                        <i class="flaticon-diploma"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Placement</a></h3> 
                        <p>Our placement program is dedicated to helping students find the right job opportunities upon completing their studies. We collaborate with leading companies to ensure a bright future for our graduates. A student gets place through campus placement. </p>
                    </div>   
                </div>
            </div>             
        </div>
    </div>
</section><!-- End Unlimited Possibilities -->



<section class="learn_shep">
    <div class="container">            
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="title">
                    <h2>All study opportunities in one single place .</h2>
                    <p>To increase your chances of securing a good placement, you can:

                        Research the industry: Learn about the job roles, skills required, and the demand for those roles in the industry you are interested in.
                        
                        Build relevant skills: Develop the skills required for the job role you are targeting by taking additional courses, doing internships or projects, and practicing relevant skills.
                        
                        Network: Attend industry events, connect with professionals in the field, and participate in online forums and communities related to your desired job role.
                        
                        Apply for job opportunities: Look for job openings in your desired field and apply to the ones that align with your skills and interests.
                        
                        Prepare for interviews: Be prepared to showcase your skills and knowledge during interviews by practicing common interview questions and researching the company and the job role you are interviewing for.
                        
                        Additionally, it's always a good idea to consult with your course instructors, academic advisors, or career services department at your educational institution to learn about available placement opportunities and resources.
                    </p>
                    <a href="about.php" title="">Learn More</a><br>
                 </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">            
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 ml-auto p-0">
                <div class="shep_banner_wrapper">
                    <div class="step_single_banner">
                        <img src="images/features/features_2_1.jpg" alt="" class="img-fluid">
                        <img src="images/features/features_2_2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="step_single_banner">
                        <img src="images/features/features_2_3.jpg" alt="" class="img-fluid">
                    </div>
                 </div>
            </div>
        </div>
    </div>
</section><!-- End Larnign Step -->
<br>

<section class="unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                   <br> <h2>Course</h2>
                    <p>All study opportunities  in one single place </p>  
                </div><!-- ends: .section-header -->
            </div>
            <?php
        $i=0;
        
        $statement = $pdo->prepare("SELECT * FROM course");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item single_item_first">
                    <div class="icon_wrapper">

                        <img src="assets/uploads/<?php echo $row['logo']; ?>" alt="icon">
                    </div>
                    <div class="blog_title">
                        <h3><a href="<?php echo $row['button_url']; ?>" title=""><?php echo $row['Heading']; ?></a></h3> 
                        <p ><?php echo nl2br($row['content']); ?></p>                    
                    </div>   
                </div>
            </div>
            <?php
            $i++;
            
             }
            ?>     
        </div>
    </div>
</section><!-- End Unlimited Possibilities -->

<section class="popular_courses" id="popular_courses_2">
    <div class="container"> 
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Our Add-On Courses</h2>
                    <p>It's important to note that the availability of add-on courses may vary depending on the educational institution and the specific program or course. Students should consult with their academic advisors or course instructors to learn about available add-on courses and how they can complement their education.</p>  
                </div><!-- ends: .section-header -->
            </div>
            <?php
        $i=0;
        
        $statement = $pdo->prepare("SELECT * FROM tb1_addoncourse");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="<?php echo $row['button_url']; ?>"><img src="assets/uploads/<?php echo $row['logo']; ?>" alt="" class="img-fluid"></a></div>
                        <div class="purchase_price">
                            <a href="<?php echo $row['button_url']; ?>" class="read_more-btn">Add-On</a>
                        </div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a href="course.php"><?php echo $row['Heading']; ?></a></h3>
                            <div class="teachers_name"><?php echo nl2br($row['content']); ?></div>
                        </div>
                        <!-- <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar-alt"></i>180 Days</li>
                                <li><i class="fas fa-user"></i>30 Students</li>
                            </ul>
                            <a href="#" class="cart_btn">Apply Now !</a>
                        </div> -->
                    </div>
                </div><!-- Ends: .single courses -->
            </div><!-- Ends: . -->

            <?php
            $i++;
            
             }
            ?>
            
        </div>
    </div>
    <div class="shape_bg">
        <span class="shape_1"></span> 
        <span class="shape_2"></span> 
        <span class="shape_3"></span>
    </div>    
</section> <!-- ./ End Courses Area section -->


<!-- <section class="register_area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-5">
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 form-content">
                <h2>All study opportunities<br> in one single place</h2>
                <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus<br> eget.felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel<br> vici quis dictum rutrum nec nisi et.</p>
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
                        <span class="counter">150</span>
                        <span class="department_name">Courses</span>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>./ End Register Area section -->



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



<section class="testimonial_2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title">
                    <h2>What Our Student Say About Us</h2>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="testimonial_wrapper_4">
                    <div class="testimonial_single">
                        <p>"I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system,<br> and expound the actual teachings."</p>
                        <div class="reviewer_info">
                            <div class="member-img">
                                <img src="images/team/team_1.jpg" alt="member img" class="img-fluid  wow zoomIn" data-wow-duration="2s" data-wow-delay=".2s">
                            </div>
                            <h4>Jhone Smith</h4>
                            <span>Graphic Design</span>
                        </div>
                    </div>
                    <div class="testimonial_single">
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                        <div class="reviewer_info">
                            <div class="member-img">
                                <img src="images/team/team_2.jpg" alt="member img" class="img-fluid">
                            </div>
                            <h4>By Dr. Alex Limon</h4>
                            <span>Guardian</span>
                        </div>
                    </div>
                    <div class="testimonial_single">
                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                        <div class="reviewer_info">
                            <div class="member-img">
                                <img src="images/team/team_3.jpg" alt="member img" class="img-fluid">
                            </div>
                            <h4>By Nathen Dived</h4>
                            <span>Guardian</span>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <div class="shape_wrapper">
        <img src="images/shapes/testimonial_2_shpe_2.png" alt="" class="shape_1">        
        <img src="images/shapes/testimonial_2_shpe_3.png" alt="" class="shape_2">        
        <img src="images/shapes/testimonial_2_shpe_1.png" alt="" class="shape_3">
    </div>
</section><!-- End Testimonial -->



<!-- <section class="latest_news_2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Latest SIIT News</h2>
                    <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>  
                </div>ends: .section-header
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_5.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">How to Become Master In CSS within qa Week.</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>            

           <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_6.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">Students work together to solve a problem</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_4.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">Magazine Design Start to Finish The Cover</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_3.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">Magazine Design Start to Finish The Cover</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_1.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">Adobe Dimension Essential Training The Basics</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                 <div class="single_item">
                    <div class="item_wrapper">
                        <div class="blog-img">
                            <a href="#" title=""><img src="images/courses/courses_2.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <h3><a href="#" title="">How to Become Master In CSS within qa Week.</a></h3> 
                    </div>
                    <div class="blog_title">
                        <ul class="post_bloger">
                            <li><i class="fas fa-user"></i>Jhon Dheo</li> 
                            <li><i class="fas fa-comment"></i>0 Comments</li>
                            <li><i class="fas fa-thumbs-up"></i> 0 Like</li>
                        </ul>               
                    </div> 
                    <div class="twitter_post">
                        <div class="blog_title">
                            <div class="icon_wrapper">
                                <i class="fab fa-twitter twitt-icon"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p>
                            <a href="#" title="">https://t.co/djPsTmfgh</a>
                        </div>              
                    </div>  
                </div>
            </div>

        </div>
    </div>
</section>End Blog
 -->





<section class="teamgroup">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0"> 
                <div class="teamgroup_info_wrapper">
                    <h2>Start now and turn your knowledge into a profitable online course</h2>
                    <a href="#" title="" class="srtarte_btn">Get Started Now</a>
                </div>   
                <div class="teamgroup_info_banner">
                    <img src="images/banner/teamgroup.png" alt="" class="img-fluid">
                </div>  
            </div>
        </div>
    </div>                
</section><!-- End Team Group -->



<?php require_once('footer.php'); ?>

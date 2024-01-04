<?php require_once('header1.php'); ?>


    <div class="container-xxl position-relative bg-white d-flex p-0">
        
        <!-- Sidebar Start | Spinner Start-->
        <?php require_once('student-sidebar.php'); ?>
        <!-- Sidebar End | Spinner End-->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once('student_navbar.php'); ?>
            <!-- Navbar End -->

            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Your Application </h6>
                            <?php
                            $i=0;
                            $s_email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            $email=$row['s_email'];
                                if($email!=$s_email)
                                {
                                ?>
                            <div class="alert alert-primary" role="alert">
                                <label> You are not Applied ! <span class="badge badge-success" style="background-color:green;"><a href="registration.php" >Apply Now</a></span></label>
                            </div>
                            <?php
                            } else{
                            ?>
                            <div class="alert alert-primary" role="alert">
                                <label>Applied Course Name : <?php echo $row['s_applied_course']; ?></label> 
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Application Submission Date : <?php echo $row['s_datetime']; ?></label>
                            </div>
                            <?php
                            if($row['s_status']==1)
                            {
                                $status='<span class="badge badge-success" style="background-color:green;">Approve</span>';
                            }
                            elseif($row['s_status']==0)
                            {
                                $status='<span class="badge badge-success" style="background-color:red;">Reject</span>';
                            }
                            else
                            {
                                $status='<span class="badge badge-success" style="background-color:pink;">Still Pending</span>';
                            }
                             ?>
                            <div class="alert alert-success" role="alert">
                                <label>Application Status : <?php  echo $status ?></label>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Result </h6>
                            <?php
                            $i=0;
                            $s_email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            $email=$row['s_email'];
                                if($email!=$s_email)
                                {
                                ?>
                            <div class="alert alert-primary" role="alert">
                                <label> You are not Applied ! <span class="badge badge-success" style="background-color:green;"><a href="registration.php" >Apply Now</a></span></label>
                            </div>
                            <?php
                            } else{
                            ?>
                            <div class="alert alert-primary" role="alert">
                                <label>Applied Course Name : <?php echo $row['s_applied_course']; ?></label> 
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Application Submission Date : <?php echo $row['s_datetime']; ?></label>
                            </div>
                            <?php
                            if($row['s_status']==1)
                            {
                                $status='<span class="badge badge-success" style="background-color:green;">Approve</span>';
                            }
                            elseif($row['s_status']==0)
                            {
                                $status='<span class="badge badge-success" style="background-color:red;">Reject</span>';
                            }
                            else
                            {
                                $status='<span class="badge badge-success" style="background-color:pink;">Still Pending</span>';
                            }
                             ?>
                            <div class="alert alert-success" role="alert">
                                <label>Assessment Result : <?php  echo $status ?></label>
                            </div>
                            <?php  } ?>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Other Elements End -->
            

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="row g-4">
                    
                    <div class="col-sm-24 col-md-12 col-xl-6">
                        <div class="h-300 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->



   <?php require_once('footer1.php'); ?>

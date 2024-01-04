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
                     <?php $i=0;
                            $s_email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            $email=$row['s_email'];
                            if($email!=$s_email)
                            {  }
                            else{

                                ?>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Class X</h6>
                           
                            <div class="alert alert-primary" role="alert">
                                <label>School Name: <?php echo $row['s_10th_s_name']; ?></label>
                                
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Name of Board/University: <?php echo $row['s_10th_bord_name']; ?></label>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <label>Certificate No: <?php echo $row['s_10th_certificate_no']; ?></label>
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Passing of Year: <?php echo $row['s_10th_passingyear']; ?></label>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <label>Division: <?php echo $row['s_10th_Division']; ?></label>
                            </div>
                        
                        </div>
                    </div>
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Class XII</h6>
                            <div class="alert alert-primary" role="alert">
                                <label>School Name: <?php echo $row['s_12th_s_name']; ?></label>
                                
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Name of Board/University: <?php echo $row['s_12th_bord_name']; ?></label>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <label>Certificate No: <?php echo $row['s_12th_certificate_no']; ?></label>
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Passing of Year: <?php echo $row['s_12th_passingyear']; ?></label>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <label>Division: <?php echo $row['s_12th_Division']; ?></label>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Other Elements End -->



    <?php require_once('footer1.php'); ?>
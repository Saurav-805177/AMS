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
                            <h6 class="mb-4">Your Info</h6>
                            <div class="alert alert-primary" role="alert">
                                <label>Name: <?php echo $_SESSION['student']['s_name']; ?></label>
                                
                            </div>
                            <div class="alert alert-secondary" role="alert">
                               <label>Email: <?php echo $_SESSION['student']['s_email']; ?></label>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <label>Mobile: <?php echo $_SESSION['student']['s_phone1']; ?></label>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- Other Elements End -->


        

     <?php require_once('footer1.php'); ?>
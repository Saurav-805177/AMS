        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->

        <?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                      <?php 
                            $i=0;
                            $s_email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            $email=$row['s_email'];
                            $photo=$row['s_photo'];
                        if($email!=$s_email){
                          ?>
                          <img class="rounded-circle fa-solid fa-circle-user" src="assets/Uploads/student/user.png" alt="" style="width: 40px; height: 40px;">
                          <?php  
                        }else{
                            ?>
                       <img class="rounded-circle fa-solid fa-circle-user" src="assets/Uploads/student/<?php echo $photo; ?>" alt="" style="width: 40px; height: 40px;">
                       <?php } ?>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['student']['s_name']; ?></h6>
                        <span><?php echo $_SESSION['student']['s_email']; ?></span>
                    </div>
                </div>
                <ul class="navbar-nav w-100">
                    <li class="nav-item nav-link treeview <?php if(($cur_page == 'Dashboard.php')){echo 'active';}?>">
                        <a href="Dashboard.php">
                            <i class="fa fa-tachometer-alt me-2"></i>Dashboard   
                        </a>
                    </li>
                    <li class="nav-item nav-link treeview <?php if(($cur_page == 'profile.php')){echo 'active';} ?>">
                        <a href="profile.php">
                            <i class="fa fa-user me-2"></i>My Profile   
                        </a>
                    </li>
                            <?php
                            $i=0;
                            $s_email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            $email=$row['s_email'];
                            $photo=$row['s_photo'];
                            if($email!=$s_email)
                            { }
                        else{
                            ?>
                            
                    <li class="nav-item nav-link treeview <?php if(($cur_page == 'eduucation.php')){echo 'active';} ?>">
                        <a href="eduucation.php">
                            <i class="fa fa-book me-2"></i>Education Details   
                        </a>
                    </li>
                    <?php
                    if($row['s_status']==1)
                        { ?>
                    <li class="nav-item nav-link treeview <?php if(($cur_page == 'assessment.php')){echo 'active';} ?>">
                        <a href="assessment.php">
                            <i class="fa fa-table me-2"></i>Assessment</a>   
                        </a>
                    </li>
                    <?php  } } ?>
                    <li class="nav-item nav-link treeview <?php if(($cur_page == 'logout.php')){echo 'active';} ?>">
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt fa-xs"></i>   LogOut</a>   
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Sidebar End -->
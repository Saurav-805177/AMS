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


            <!-- Form Start -->
            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-500 p-4">
                            <h5 class="mb-4">Assessment Details </h5>
                            <?php
                            $i=0;
                            $email=$_SESSION['student']['s_email'];
                            $statement = $pdo->prepare("SELECT * FROM tbl_student ");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row)
                            if($email!= $row['s_email'])
                            { }else{
                                ?>
                            
                            
                            <div class="alert alert-primary" role="alert">
                                <label>Registration ID: <?php echo $row['Registration_No']; ?></label> 
                            </div>
                            <div class="alert alert-primary" role="alert">
                                <label>Token ID: <?php echo $row['s_token'];?></label> 
                            </div>
                            <div class="alert alert-primary" role="alert">
                               <label>Password: <?php echo $row['s_timestamp']; ?></label>
                            </div>
                        <?php } ?>
                            
                                
                                <?php 
                                // date_default_timezone_set("Asia/Kolkata");
                                // $currentdatetime = date('d-m-Y h:i:s A');
                                $dt = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                                $st =  $dt->format('d-m-Y h:i:s A'); 
                                $i=0;
                                $statement = $pdo->prepare("SELECT * FROM assessments where Astatus=1 ");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                $i++;
                                $AssessmentDate= $row['AssessmentDate'];
                                $examRunningTime=$row['examRunningTime'];
                                $datatime = new DateTime($AssessmentDate, new DateTimeZone('Asia/Kolkata'));
                                $dt = new DateTime($AssessmentDate, new DateTimeZone('Asia/Kolkata'));
                                $dt1 =  $dt->format('d-m-Y h:i:s A');
                                $datatime->add(new DateInterval('P0M0DT0H'.$examRunningTime.'M0S'));
                                $newtime =  $datatime->format('d-m-Y h:i:s');
                                if($dt1>$st){
                                    $examcon = "Exam Not Start";
                                    $ck = '';
                                }elseif($dt1<$st && $newtime>$st){
                                    $examcon = "Start Assessment";
                                    $ck = '';
                                }elseif($st>$newtime){
                                    $examcon = "Exam has Finished";
                                    $ck1 = '';
                                    }

                                else{
                                    $examcon = "";
                                    }
                                ?>
                                <div class="alert alert-secondary" >
                                    <h6>Some Information:</h6>
                                    <p>1. Total Questions: <?php echo $row['totalExamShowQues']; ?></p><wr>
                                    <p>2. Time For Each Questions: <?php echo $row['eachQuestionTime']; ?> Seconds</p><wr>
                                    <p>3. Exam Will Be Continue: <?php echo $row['examRunningTime']; ?> Minutes</p><wr>
                                    <p>4. Exam Starting Time: <?php echo $row['AssessmentDate']; ?></p><wr>
                                    <p>5. Current Time : <?php echo $st; ?></p><wr>
                            </div>
                           
                            <div class="alert alert-primary" style="background-color:seagreen; align-items: center; text-align: center;" >
                                <?php 
                                if($dt1>$st){
                                    echo '<a href="#"><h4>Exam Not Start </h4></a>' ; 
                                }
                                elseif($dt1<$st && $newtime>$st){
                                ?>
                                    <a href="Start-Assessment.php?aid=<?php echo $row['id']; ?>"><h4>Start Assessment </h4></a>
                                <?php  
                                }
                                elseif($st>$newtime){
                                    echo '<a href="#"><h4>Exam has Finished</h4></a>' ;
                                    }
                                    else{
                                    
                                    }
                                 ?>
                               
                            </div>
                           <?php } ?>
                        </div>

                    </div>
                
                </div>
            </div>
            <!-- Other Elements End -->

           
            <!-- Form End -->


           

   <?php require_once('footer1.php'); ?>
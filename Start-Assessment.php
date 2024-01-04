<?php require_once('header1.php'); ?>
<?php
if(!isset($_REQUEST['aid'])) {
    header('location: Assessment.php');
    exit;
} else {
    $aid=$_REQUEST['aid'];
    
}
?>
<?php
    if (isset($_POST['form1'])) 
{

    date_default_timezone_set("Asia/Kolkata");
    $valid = 1;

    $statement = $pdo->prepare("INSERT INTO assessments_answer (
                                                        Email,
                                                        A_id,
                                                        Q_id,
                                                        QuestionTitle,
                                                        StudentAnawer,
                                                        CorrectAnswer
                                                        
                                                        ) 
                                                VALUES (?,?,?,?,?,?)");
        $statement->execute(array(
                                    $_SESSION['student']['s_email'],
                                    $_REQUEST['aid'],
                                    $_POST['qid'],
                                    $_POST['question'],
                                    $_POST['answer'],
                                     $_POST['CorrectAnswer']
                                
                                    ));
            
        $success_message = 'One Question added successfully!';
}
?>


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start | Spinner Start-->
        <?php require_once('student-sidebar.php'); ?>
        <!-- Sidebar End | Spinner End-->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once('student_navbar.php'); ?>
            <!-- Navbar End -->

            <!-- <div class="navbar navbar-expand bg-light navbar-light sticky-top px-2 py-0" style="position:fixed; text-align:right; align-items: right; align-content: right;"><h1 style="text-align:right;">Time Left : 45 min</h1></div> -->
            <!-- Form Start -->
            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="bg-light rounded h-500 p-4">
                            <h5 class="mb-4">Assessment</h5>
                            <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM assessments_question where A_id=$aid");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                $Q_id=$row['Q_id'];
                                $question=$row['QuestionTitle'];
                                ?>

                            <div class="alert alert-secondary" >
                                <input type="text" name="qid" value="<?php echo $row['Q_id']; ?>" hidden>
                                 <input type="text" name="aid" value="<?php echo $row['A_id']; ?>" hidden>
                                  <input type="text" name="CorrectAnswer" value="<?php echo $row['CorrectAnswer']; ?>" hidden>
                                <h6><span>Q.<?php echo $i;?></span> <span name="question"><?php echo $row['QuestionTitle']; ?></span>
                                    <input type="text" name="question" value="<?php echo $row['QuestionTitle']; ?>" hidden>
                                </h6><br>
                                <img src="assets/uploads/<?php echo $row['QPhoto']; ?>" style="height: 100px;width: 180px;" hidden>
                                    <p>A. <input type="radio" name="answer" value="<?php echo $row['FirstOption']; ?>" required><?php echo $row['FirstOption']; ?></p><wr>
                                    <p>B. <input type="radio" name="answer" value="<?php echo $row['SecondOption']; ?>"><?php echo $row['SecondOption']; ?></p><wr>
                                    <p>C. <input type="radio" name="answer" value="<?php echo $row['ThirdOption']; ?>"><?php echo $row['ThirdOption']; ?></p><wr>
                                    <p>D.<input type="radio" name="answer" value="<?php echo $row['FourthOption']; ?>"><?php echo $row['FourthOption']; ?></p><wr>
                                    
                            </div>
                        <?php } ?>
                            <div>
                               <button class="alert alert-primary"style="background-color:seagreen; align-items: center; text-align: center; width: 120px;" type="submit" name="form1" value="submit" >submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                
                </div>
            </div>
            <!-- Other Elements End -->

           
            <!-- Form End -->


           

   <?php require_once('footer1.php'); ?>
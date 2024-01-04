<?php require_once('header.php'); ?>
<section class="login">
     <div class="wrapper">
         <div class="title">
            Forgot Password
         </div>
         <form action="#">
            
            <div class="field">
               <input type="text" required>
               <label>Email Address</label>
            </div>
            
            <div class="field">
               <input type="password" placeholder="Type password">
              
               <label>New Password</label>
            </div>
            
            <div class="text"></div>
            <div class="field">
                 
                <select name="scurity_question">
                     <option>Select Scurity Question</option>
                     <option value="Your favorite Color">Your favorite Color</option>
                     <option value="Your favorite playe">Your favorite player</option>
                     <option value="Your favorite city">Your favorite city</option>
                     <option value="Your favorite Friend">Your favorite Friend</option>
               </select>
               
            </div>
            <div class="field">
               <input type="text" required>
               <label>Answer</label>
            </div>
            
            <div class="field">
               <input type="submit" value="Submit">
            </div>
            <div class="signup-link">
               Back to <a href="login.php">Login</a>
            </div>
         </form>
      </div>
</section> <!-- Contact Info Wrappper-->

<?php require_once('footer.php'); ?>
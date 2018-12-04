<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">
    <?php 
    $message = "" ; 

      
      if(isset($_POST['resgister'])){
        $username = $_POST['username'] ;
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
          
        /*****************  Protection  clean from the pile ********************/
       $username = mysqli_real_escape_string($connection , $username) ;
        $email = mysqli_real_escape_string($connection , $email) ;
       $password = mysqli_real_escape_string($connection , $password) ;
       
        $password = password_hash($password , PASSWORD_BCRYPT,array('cost'=>12)) ;
        
        if ($username == "" || empty($username)  && $email == "" || empty($email) &&  $password == "" || empty($password)) {
            $message ="this field shoud not be empty";
        } 
        else{
        $query_add = "INSERT INTO users (username , user_password , user_firstname ,user_lastname ,user_email ,user_image ,user_role ) VALUES('{$username}','{$password}','','','{$email}','','subscriber')";
        $add_user_query = mysqli_query($connection, $query_add);
        if (!$add_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        else {
           $message = "ok";
        }
    }

      }
      
       
    ?>




<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                        <h6 class="text-center"> <?php echo $message ;?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" >

                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"  >              
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">



                        </div>
                
                        <input type="submit" name="resgister" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

<?php  include "includes/db.php"; ?>
<?php  include "includes/function.php"; ?>
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
         // $message = regester_user($username,$email,$password);

         $message = "" ;
         if(isset($_POST['resgister'])){
           $username = $_POST['username'] ;
           $email = $_POST['email'] ;
           $password = $_POST['password'] ;
           
           $error = [
               'username' => '' ,
               'email' => '' ,
               'password' => '' 
           ] ;
   
           if($username == ''){
            $error['username'] = 'username cannot be empty' ;
          }
           elseif(strlen($username) < 4){
               $error['username'] = 'username needs to be longer' ;
           }
           
           elseif(user_exist($username)){
               $error['username'] = 'username exists' ;
           }

   
   
           if($email == ''){
               $error['email'] = 'email cannot be empty' ;
           }
           elseif( email_exist($email)){
               $error['email'] = 'email exists' ;
           }
           if($password == ''){
               $error['password'] = 'password cannot be empty' ;
           }
           elseif(strlen($password) < 4){
               $error['password'] = 'password needs to be longer' ;
           }


           foreach($error as $key => $value){
             if(empty($value)) {
             
               unset($error[$key]) ;
             } 
           }

           if(empty($error)){
            regester_user($username,$email,$password) ;
            header("Location:index.php");
           }
            }


         }
      
    ?>
<section id="registration">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" autocomplete="on" method="post" id="login-form" >
                       
                        <h6 class="text-center"></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" autocomplete="on" name="username" value="<?php echo isset($username) ? $username : '' ; ?>" id="username" class="form-control" placeholder="Enter Desired Username" >
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" autocomplete="on" name="email" id="email"  value="<?php echo isset($email) ? $email : '' ; ?>" class="form-control" placeholder="somebody@example.com"  >              
                            <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>

                       </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" autocomplete="on" value="<?php echo isset($password) ? $password : '' ; ?>"  name="password" id="key" class="form-control" placeholder="Password">
                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>



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

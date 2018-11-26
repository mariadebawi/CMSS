
        <?php 
        if (isset($_POST['create_user'])) {

            $username = $_POST['username'];
            $user_firstname = $_POST['first_name'];
            $user_lastname = $_POST['last_name'];
            $user_password = $_POST['password'];
            $user_email = $_POST['email'];
            $user_role = $_POST['user_role'];


            $query_add = "INSERT INTO users (username , user_password , user_firstname ,user_lastname ,user_email ,user_image ,user_role ,randSalt) VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','','{$user_role}','')";
            $add_user_query = mysqli_query($connection, $query_add);
            if (!$add_user_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            else {
                echo "ok" ;
            }
        }

        ?>  

    <form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="username">Username</label>
         <input type="text" class="form-control" name="username">
     </div> 

     <div class="form-group">
        <label for="firstname">FirstName</label>
         <input type="text" class="form-control" name="first_name">
     </div>
    

   <div class="form-group">
        <label for="lastname">LastName</label>
         <input type="text" class="form-control" name="last_name">
     </div> 


     <div class="form-group">
         <select class="form-control " name="user_role" id="">
           <option value='subscriber'> Select Option </option>" ;
             <option value='admin'> admin </option>" ;
             <option value='subscriber'> subscriber </option>" ;

        </select>
        </div> 


   <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email">
     </div>
     <div class="form-group">
        <label for="email">Password</label>
        <input type="text" class="form-control" name="password">
     </div>
  
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_user" value="create_User">
     </div>


</form>
   


        <?php 

        if (isset($_GET['id_u'])) {
          $the_user_id = $_GET['id_u'] ;
          $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
          $edit_user = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($edit_user)) {
              $username = $row['username']; 
              $user_firstname = $row['user_firstname']; 
              $user_lastname = $row['user_lastname']; 
              $user_email = $row['user_email']; 
              $user_role = $row['user_role'];
              $user_password= $row['user_password'];             
            }}
        ?>



         <?php 
         
            if (isset($_POST['edit_user'])) {
              $the_userr_id = $_GET['id_u'] ;
              $username = $_POST['username']; 
              $user_firstname = $_POST['first_name']; 
              $user_lastname = $_POST['last_name']; 
              $user_email =$_POST['email']; 
              $user_role = $_POST['user_role'];
              $user_password= $_POST['password'];     

                $query_edit = "UPDATE users SET username= '{$username}',user_firstname= '{$user_firstname}',user_lastname= '{$user_lastname}', user_email= '{$user_email}', user_role= '{$user_role}',user_password = '{$user_password}' WHERE user_id='{$the_userr_id}'" ;
                $edit_user_query = mysqli_query($connection, $query_edit);
                if (!$edit_user_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                } else {
                    echo "work";
                }
            
        }
    ?>
          
  
          <form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="username">Username</label>
         <input type="text" class="form-control" value="<?php  {echo $username;} ?>" name="username">
     </div> 

     <div class="form-group">
        <label for="firstname">FirstName</label>
         <input type="text"  value="<?php  {echo $user_firstname ;} ?>" class="form-control" name="first_name">
     </div>
    

   <div class="form-group">
        <label for="lastname">LastName</label>
         <input type="text"  value="<?php  {echo $user_lastname ;} ?>" class="form-control" name="last_name">
     </div> 


     <div class="form-group">
     <label for="Role">Role</label>
         <select class="form-control " name="user_role" id="">
           <option value='subscriber'><?php  {echo $user_role ;} ?> </option>;
             <?php
                if($user_role == 'admin'){
                  echo "<option value='subscriber'>subscriber </option> "   ;
                 }
                  else {
                    echo "<option value='admin'>admin </option> "   ;       
               }
              ?>
           
        </select>
        </div> 


   <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control"  value="<?php  {echo $user_email;} ?>" name="email">
     </div>
    
     <div class="form-group">
        <label for="email">Password</label>
        <input type="text" class="form-control"  value="<?php  {echo $user_password;} ?>" name="password">
     </div>
     
      <div class="form-group">
         <input class="btn btn-success" type="submit" name="edit_user" value="edit_User">
     </div>


</form>
   
   
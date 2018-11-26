
<?php include "includes/admin_header.php" ?>
 

 <?php 
 if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $edit_profile = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($edit_profile)) {
        $u_id  = $row['user_id']; 
        $firstname  = $row['user_firstname']; 
        $lastname = $row['user_lastname']; 
        $email = $row['user_email']; 
      //  $user_role = $row['user_role'];
        $password= $row['user_password'];  
    }
    
 } ?>

 <?php 
   
         
   if (isset($_POST['edit_profile'])) {
     $edit_username = $_POST['username']; 
     $user_firstname = $_POST['first_name']; 
     $user_lastname = $_POST['last_name']; 
     $user_email =$_POST['email']; 
     $user_password= $_POST['password'];     

       $query_edit = "UPDATE users SET username = '{$edit_username}',user_firstname = '{$user_firstname}',user_lastname = '{$user_lastname}', user_email= '{$user_email}',user_password = '{$user_password}' WHERE user_id='{$u_id}'" ;
       $edit_user_query = mysqli_query($connection, $query_edit);
       if (!$edit_user_query) {
           die("QUERY FAILED" . mysqli_error($connection));
       } else {
           echo "work";
       }
   
}
?>

    <div id="wrapper">

        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

  <h1 class="page-header">
                Welcome to admin
                <small><?php echo $username ;?></small>
            </h1>
             
          <form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="username">Username</label>
         <input type="text" class="form-control" value="<?php  {echo $username;} ?>" name="username">
     </div> 

     <div class="form-group">
        <label for="firstname">FirstName</label>
         <input type="text"  value="<?php  {echo $firstname ;} ?>" class="form-control" name="first_name">
     </div>
    

   <div class="form-group">
        <label for="lastname">LastName</label>
         <input type="text"  value="<?php  {echo $lastname ;} ?>" class="form-control" name="last_name">
     </div> 

     <div class="form-group">
        <label for="lastname">email</label>
         <input type="text"  value="<?php  {echo $email ;} ?>" class="form-control" name="email">
     </div> 

     <div class="form-group">
        <label for="lastname">password</label>
         <input type="text"  value="<?php  {echo $password ;} ?>" class="form-control" name="password">
     </div> 

        <div class="form-group">
         <input class="btn btn-success" type="submit" name="edit_profile" value="edit_profile">
     </div>

</form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

    <?php include "includes/admin_footer.php" ?>

<?php 

     session_start(); 
 ?>

<?php


    function user_exist($user){
        global $connection;
        $query = "SELECT username FROM users WHERE username='$user'" ;
        $dispalay_user = mysqli_query($connection , $query);
        while($row = mysqli_fetch_assoc($dispalay_user));
        $nbr_user= mysqli_num_rows($dispalay_user);
          if($nbr_user > 0){
              return true ;
          }
          else {
              return false ;
          }
    }

    function email_exist($email){
        global $connection;
        $query = "SELECT user_email FROM users WHERE user_email='$email'" ;
        $dispalay_email = mysqli_query($connection , $query);
        while($row = mysqli_fetch_assoc($dispalay_email));
        $nbr_email= mysqli_num_rows($dispalay_email);
          if($nbr_email > 0){
              return true ;
          }
          else {
              return false ;
          }
    }


    function regester_user($username,$email,$password){
    global $connection;
      /*****************  Protection  clean from the pile ********************/
     $username = mysqli_real_escape_string($connection , $username) ;
      $email = mysqli_real_escape_string($connection , $email) ;
     $password = mysqli_real_escape_string($connection , $password) ;
     
      $password = password_hash($password , PASSWORD_BCRYPT,array('cost'=>12)) ;
       
      $query_add = "INSERT INTO users (username , user_password , user_firstname ,user_lastname ,user_email ,user_image ,user_role ) VALUES('{$username}','{$password}','','','{$email}','','subscriber')";
      $add_user_query = mysqli_query($connection, $query_add);
      if (!$add_user_query) {
          die("QUERY FAILED" . mysqli_error($connection));
      }
     }

function login_user(){
    global $connection;
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
    /*****************  Protection  clean from the pile ********************/
    $username = mysqli_real_escape_string($connection , $username) ;
    $password = mysqli_real_escape_string($connection , $password) ;
    $query = "SELECT * FROM users WHERE username = '{$username}' " ;
    $dispalay_user = mysqli_query($connection , $query);
    while($row = mysqli_fetch_assoc($dispalay_user)){
       $db_user_id = $row['user_id'];
       $db_username = $row['username']; 
       $db_user_firstname = $row['user_firstname']; 
       $db_user_lastname = $row['user_lastname']; 
       $db_user_password= $row['user_password'];
       $db_user_email = $row['user_email']; 
       $db_user_role = $row['user_role']; 
       $db_randSalt= $row['randSalt'];
    }

   if(password_verify($password , $db_user_password)){
       header("Location:../admin") ;
       $_SESSION['id_user'] = $db_user_id ;
       $_SESSION['username'] = $db_username ;
       $_SESSION['lastname'] = $db_user_lastname ;
       $_SESSION['firstname'] = $db_user_firstname ;
       $_SESSION['user_role'] = $db_user_role  ;
       $_SESSION['password']  = $db_user_password ;
       $_SESSION['email']  = $db_user_email ;
     
   }
   else {
       header("Location:../index.php") ;
   }

   
}







    ?>

<?php include "db.php"; ?>
<?php session_start() ; ?>

<?php 
 if(isset($_POST['login'])){
     $username = $_POST['username'] ;
     $password = $_POST['password'] ;

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

<?php  
include "function.php"; 
include "db.php"; 
 ?>

<?php 
 if(isset($_POST['login'])){
     login_user( $username , $password) ;
 }
?>
 
<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <!-- Navigation -->
<?php  include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
<div class="container">
  <?php
    if(isset($_POST['send'])){
        $to ="debawimaria.fsm@hotmail.com" ;
        $email = $_POST['email'] ;
        $subject = $_POST['subject'] ;
        $message = $_POST['message'] ;      
        $header = "FROM :" . $email ;  
        // use wordwrap() if lines are longer than 70 characters
        $message = wordwrap($message,70);
        // send email
        mail($to,$subject,$message, $header );
    }
  ?> 

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" id="contact-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"  >              
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="subject"  >              
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea placeholder="type your message ...." class="form-control "name="message" id="body" ></textarea>
                        </div>
                        
                        <input type="submit" name="send" id="btn-send" class="btn btn-custom btn-lg btn-block" value="send">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

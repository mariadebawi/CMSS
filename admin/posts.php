



<?php 
include "../includes/db.php";
include "includes/admin_header.php";


?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php 
        include "includes/admin_navigation.php";
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
               
               <div class="row">
                 <div class="col-xs-12">
                 <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                </h1>
           <!-- table !-->
             <?php 
             
            if (isset($_GET['source'])) {
            $source = $_GET['source'] ;
            }
            else {
                $source = '' ;
            }
            
                switch ($source) {
                    case 'add_post' ;
                    include "includes/add_post.php";
                    break;


                    case 'edit_post' ;
                    include "includes/edit_post.php";
                    break;

                    
                    case 'author_post' ;
                    include "includes/author_post.php";
                    break;


                    case 'post_comment' ;
                    include "includes/post_comment.php";
                    break;

                    default:
                     include "includes/view_all_posts.php";
                      break;

    
}



?>
                 </div>
               </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php 
include "includes/admin_footer.php";
?>
</html>

<?php 
include "../includes/db.php";
include "includes/admin_header.php";
include "includes/functions.php" ;

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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        <?php 
                         insert_categories() ;
                        ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title"> Add</label>
                                   <input type="text" class="form-control" name="cat_title" >
                                </div>
                                <div class="form-group">
                                   <input class="btn btn-primary" type="submit" value="Add category" name="submit"> 
                                </div>
                            </form>
                 <?php 
                   if(isset($_GET['edit'])){
                       $cat_id = $_GET['edit'] ;
                       include "includes/update_cat.php" ;
                   }
                 ?>
                        </div>
                        <div class="col-xs-6">
                       
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    show_all_cat() ;
                                    ?>
                                     <?php 
                                       delete_cat()  ;
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
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

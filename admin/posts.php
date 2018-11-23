<?php 
include "../includes/db.php";
include "includes/admin_header.php";
include "includes/functions.php";

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
  <table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Author</th>
              <th>Title</th>
              <th>Categorie</th>
              <th>Status</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comment</th>
              <th>Date</th>
          </tr>
      </thead>
      <tbody>
      <?php
          show_all_posts() ;
       ?>
      </tbody>
  </table>
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

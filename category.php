
<?php 
include "includes/header.php";
// Navigation 
include "includes/db.php";
include "includes/navigation.php";


?>
  <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            if(isset($_GET['category'])){
               $id_cat = $_GET['category'] ;

              
              $query = "SELECT * FROM posts WHERE post_category_id = $id_cat and post_status = 'published'" ;
              $dispalay_all_posts = mysqli_query($connection , $query);
              $post_count_pub = mysqli_num_rows( $dispalay_all_posts ) ;
                 if($post_count_pub > 0){
               while($row = mysqli_fetch_assoc($dispalay_all_posts)){
                   $post_id = $row['post_id'] ;
                   $post_title = $row['post_title'] ;
                   $post_author = $row['post_author'] ;
                   $post_user = $row['post_user'] ;
                   $post_date = $row['poste_date'] ;
                   $post_content = substr($row['post_content'],0,100 );
                   $post_img = $row['post_image'] ;
                   ?>
           <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by 
                    
                    <?php 


                    if(!empty($post_user)) {
                       echo "<a href='author_post.php?user=$post_user&p_id=$post_id ?'> $post_user </a>";
                    }
                    elseif(!empty($post_author)){
                        echo "<a href='author_post.php?author=$post_author&p_id=$post_id ?'> $post_author </a>";
                    } 


                    ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_img ;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
               <?php 
               }}  else {
                echo "<h1 class='text-centet'> No categories</h1>" ;
               }
            } 
              
              
             ?>
                
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php 
            include "includes/sidebar.php";
            ?>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php 
        include "includes/footer.php";
        ?>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

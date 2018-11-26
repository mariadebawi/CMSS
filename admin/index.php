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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small> <?php echo $_SESSION['username'] ?></small>
                        </h1>

                               
                <!-- /.row -->

       





<?php 

/******** number of posts */
$query1 = "SELECT * FROM posts";
$select_all_posts = mysqli_query($connection, $query1);
$post_count = mysqli_num_rows($select_all_posts);


/******** number of comments */
$query2 = "SELECT * FROM comments";
$select_all_comments = mysqli_query($connection, $query2);
$comment_count = mysqli_num_rows($select_all_comments);



/******** number of users */
$query2 = "SELECT * FROM users";
$select_all_users = mysqli_query($connection, $query2);
$user_count = mysqli_num_rows($select_all_users);

/******** number of categories */
$query3 = "SELECT * FROM categories";
$select_all_categories = mysqli_query($connection, $query3);
$category_count = mysqli_num_rows($select_all_categories);



?>




<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php echo "<div class='huge'>{$post_count}</div>" ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php echo "<div class='huge'>{$comment_count}</div>" ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php echo "<div class='huge'>{$user_count}</div>" ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php echo "<div class='huge'>{$category_count}</div>" ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                <!--  row 2-->

<div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php 


            /******** number of Dreft posts */
            $query_draft = "SELECT * FROM posts WHERE post_status = 'draft'";
            $select_draft_posts = mysqli_query($connection, $query_draft);
            $post_draft_count = mysqli_num_rows($select_draft_posts);


            /******** number of unapprove comments */
            $query_unapprove = "SELECT * FROM comments WHERE comment_status = 'unapprove'";
            $select_Unapprove_comments = mysqli_query($connection, $query_unapprove);
            $comment_Unapprove_count = mysqli_num_rows($select_Unapprove_comments);



            /******** number of users */
            $query_subscriber = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_subscriber_users = mysqli_query($connection, $query_subscriber);
            $user_subscriber_count = mysqli_num_rows($select_subscriber_users);


            $element_text = ['Active Posts', 'Draft Posts' ,'Comments', 'Pending Comments' ,'Users','Subscribers' ,'Categories' ];
            $element_count = [$post_count, $post_draft_count , $comment_count , $comment_Unapprove_count , $user_count , $user_subscriber_count , $category_count];

            for ($i = 0; $i < 7; $i++) {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}] ,";
            }

            ?>
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script> 
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

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

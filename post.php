<?php session_start(); ?>
<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--  apres la config-->
    <link href="/css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <?php 
                    $query = "SELECT * FROM categories";
                    $dispalay_all = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($dispalay_all)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'] ;
                        echo "<li><a href='/category/$cat_id'>{$cat_title}</a></li>";
                    }
                    if (isset($_SESSION['username'])) {
                        if (isset($_GET['p_id'])) {
                            $the_pst_id = $_GET['p_id'];
                            echo "<li> <a href='/admin/posts.php?source=edit_post&id_p={$the_pst_id}'>Edit Post</a> </li>";
                        }
                    }
                    ?>
                    <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li> <a href='/admin'>Admin</a> </li>";
                    }
                    ?>
                      <!--
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    !-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
              <div class="col-md-8">
            <?php 
            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id']; 
            $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = {$the_post_id}" ;
            $count_view = mysqli_query($connection, $view_query);

            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                $dispalay_all_posts_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($dispalay_all_posts_id)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_user = $row['post_user'] ;
                    $post_date = $row['poste_date'];
                    $post_content = $row['post_content'];
                    $post_img = $row['post_image'];

                    ?>
           <h1 class="page-header">
                   Posts
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
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
                <img class="img-responsive" src="/admin/images/<?php echo $post_img ; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <hr>
               <?php 
            }
            if (isset($_POST['create_comment'])) {
                $comment_post_id = $_GET['p_id'];
                $comment_author = $_POST['author'];
                $comment_date = date('y-m-d');
                $comment_email = $_POST['email']; 
            //    $comment_status = $_POST['comment_status']; 
                $comment_content = $_POST['comment_content'];
                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                    $query = "INSERT INTO comments(comment_post_id ,comment_author ,comment_email,comment_content ,comment_status,comment_date) VALUES('{$comment_post_id}','{$comment_author}','$comment_email','{$comment_content}','Unapprove',now())";
                    $add_comment_query = mysqli_query($connection, $query);
                    if (!$add_comment_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $query_update = "UPDATE posts SET post_comment_count = post_comment_count +1 WHERE post_id = {$the_post_id} ";

                    $add_comment_query_count = mysqli_query($connection, $query_update);
                    if (!$add_comment_query_count) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                } else {
                    echo "<script> alert('Filed cannot be empty')</script>";
                }
            }
        }else {
            echo "<h1 class ='text-center'> You should login </h1>" ;
        }}
        ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4"> 
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
  <!-- Comments Form -->
  <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="author">Author</label>
                     <input type="text" class="form-control" name="author" id="">
                    </div>   
                         <div class="form-group">
                         <label for="author">email</label>
                          <input type="text" class="form-control" name="email" id="">       
                         </div>   
                         <div class="form-group">
                         <label for="comment">Your Comment</label>
                         <textarea name="comment_content"  class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <hr>
                <!-- Posted Comments -->
                <?php 
               // echo $comment_post_id ;
                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approve' ORDER BY comment_id DESC";
                $display_comment = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($display_comment)) {
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
      <?php 
    } 
    ?>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2018</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../index.php">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <?php 
                    $query = "SELECT * FROM categories";
                    $dispalay_all = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($dispalay_all)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }

            //p_id
                    if (isset($_SESSION['username'])) {
                        if (isset($_GET['p_id'])) {
                            $the_pst_id = $_GET['p_id'];
                            echo "<li> <a href='admin/posts.php?source=edit_post&id_p={$the_pst_id}'>Edit Post</a> </li>";
                        }
                    }
                    ?>
                    <?php 
                    if (isset($_SESSION['username'])) {

                        echo "<li> <a href='admin'>Admin</a> </li>";
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
            if (isset($_GET['p_id']) ) {
                $the_post_id = $_GET['p_id'];
                
               
               if(isset($_GET['user'])){
                $the_user = $_GET['user'];
                if(!empty($the_user)){
                    $query_user = "SELECT * FROM posts WHERE post_user ='{$the_user}'";
                    $dispalay_all_posts_user = mysqli_query($connection, $query_user);
                    while ($row = mysqli_fetch_assoc($dispalay_all_posts_user)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        $post_date = $row['poste_date'];
                        $post_content = $row['post_content'];
                        $post_img = $row['post_image'];
                    
                        ?>
                 
              
           <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $the_post_id ; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                   All Post  by  <?php echo $post_user ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <hr>
               <?php 
            }
                }
            }
   
            if(isset($_GET['author'])){
                $the_author = $_GET['author'];
                if(!empty($the_author)){
                    $query_author = "SELECT * FROM posts WHERE post_author ='{$the_author}'";
                    $dispalay_all_posts_author = mysqli_query($connection, $query_author);
                    while ($row = mysqli_fetch_assoc($dispalay_all_posts_author)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['poste_date'];
                        $post_content = $row['post_content'];
                        $post_img = $row['post_image'];
                    
                        ?>
                 
              
           <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $the_post_id ; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                   All Post  by  <?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <hr>
               <?php 
            }
               
                }
            }
         
                               
        }
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

 

</html>

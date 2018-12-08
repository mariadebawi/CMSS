

        <?php 
        if (isset($_POST['create_post'])) {
            
            $post_title = $_POST['title'];
            $post_author = $_POST['author'];
            $post_username = $_POST['user'];

            $poste_date = date('y-m-d');

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_status = $_POST['post_status'];
            $post_category_id = $_POST['post_category'];
            $post_content = $_POST['post_content'];
            $post_comment_count = 0;

            move_uploaded_file($post_image_temp, "../admin/images/$post_image");
       
            $query = "INSERT INTO posts(post_category_id ,post_title ,post_author,poste_date ,post_image,post_content ,post_tags ,post_comment_count,post_status,post_user) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}' ,'{$post_username}')";
            $add_post_query = mysqli_query($connection, $query);
            $the_post_id = mysqli_insert_id($connection) ;
            if (!$add_post_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } 
            else {
                echo "<p class='bg-success'>Post Created .<a href='../post.php?p_id={$the_post_id}'>View this post ? </a>  or <a href='posts.php?source=edit_post&id_p={$the_post_id}'> edit it ? </a> </p>" ;
            }
        }

        ?>                
  <form action="" method="post" enctype="multipart/form-data">    
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" class="form-control" name="title">
     </div>
      
     <div class="form-group ">
     <label for="cat">Categorie</label>
     <select class="form-control " name="post_category" id="">
          <?php 
            $query = "SELECT * FROM categories";
            $dispalay_all = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($dispalay_all)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value='$cat_id'> {$cat_title} </option>" ;
            }
            ?>
        </select>
     </div> 


     <div class="form-group ">
     <label for="cat">users</label>
     <select class="form-control " name="user" id="">
      <option value=''>  </option>
          <?php 
            $query = "SELECT * FROM users";
            $dispalay_all = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($dispalay_all)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                echo "<option value='{$username}'> {$username} </option>" ;
            }
            ?>
        </select>
     </div>  
    
    

   <div class="form-group">
        <label for="title">Post Author</label>
         <input type="text" class="form-control" name="author">
     </div> 

      <div class="form-group  ">
      <label for="post_status">Post status </label>
        <select class="form-control " name="post_status" id="">
           <option value="draft">Select Options</option>
           <option value="published">publish</option>
           <option value="draft">draft</option>
        </select>
     </div>  

   <div class="form-group">
        <label for="post_image">Post Image</label>
         <input type="file"  name="image">
     </div>

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
         <input type="text" class="form-control" name="post_tags">
     </div>
     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "name="post_content" id="body" cols="" rows=""></textarea>
     </div>
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
     </div>


</form>
   
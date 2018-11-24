

        <?php 
        if (isset($_POST['create_post'])) {
            $post_title = $_POST['title'];
            $post_author = $_POST['author'];
            $poste_date = date('y-m-d');

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_status = $_POST['post_status'];
            $post_category_id = $_POST['post_category_id'];
            $post_content = $_POST['post_content'];
            $post_comment_count = 4;

            move_uploaded_file($post_image_temp, "./images/$post_image");
       
            $query = "INSERT INTO posts(post_category_id ,post_title ,post_author,poste_date ,post_image,post_content ,post_tags ,post_comment_count,post_status) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
            $add_post_query = mysqli_query($connection, $query);
            if (!$add_post_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } 
        }

        ?>                
  <form action="" method="post" enctype="multipart/form-data">    
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" class="form-control" name="title">
     </div>
      
     <div class="form-group">
        <label for="title">categorie</label>
         <input type="text" class="form-control" name="post_category_id">
     </div>  
       
     <div class="form-group">
        <label for="title">users</label>
         <input type="text" class="form-control" name="users">
     </div>
    

   <div class="form-group">
        <label for="title">Post Author</label>
         <input type="text" class="form-control" name="author">
     </div> 
      <div class="form-group">
      <label for="post_content">Post status</label>
      <input type="text" class="form-control" name="post_status">

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
        <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
        </textarea>
     </div>
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
     </div>


</form>
   
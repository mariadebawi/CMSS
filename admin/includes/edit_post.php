

        <?php 

        if (isset($_GET['id_p'])) {
          $the_post_id = $_GET['id_p'] ;
          $query = "SELECT * FROM posts WHERE post_id =$the_post_id";
          $edit_post = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($edit_post)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title']; 
            $post_author = $row['post_author']; 
            $poste_date = $row['poste_date']; 
            $post_image = $row['post_image']; 
            $post_tags = $row['post_tags']; 
            $post_status= $row['post_status'];
            $post_category_id = $row['post_category_id']; 
            $post_comment_count = $row['post_comment_count']; 
            $post_content = $row['post_content'];
            }}
        ?>

         <?php 
            if (isset($_POST['edit_post'])) {
                //$post_id = $row['post_id'];
                $post_title = $_POST['title'];
              
                
                $post_author = $_POST['author'];
                $poste_date = date('y-m-d');
    
                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];
    
                $post_tags = $_POST['post_tags'];
                $post_status = $_POST['post_status'];
                $post_category_id = $_POST['post_category'];
                $post_content = $_POST['post_content'];
                $post_comment_count = 4;
    
                move_uploaded_file($post_image_temp, "./images/$post_image");
           
                $query = "UPDATE posts SET post_title='{$post_title}',post_author='{$post_author}',poste_date='{$poste_date}',post_status='{$post_status}',post_tags='{$post_tags}',post_comment_count='{$post_comment_count}',post_image='{$post_image}',poste_date= now(),post_content='{$post_content}',post_title='{$post_title}',post_category_id='{$post_category_id}'WHERE post_id='{$the_post_id}'" ;
                $edit_post_query = mysqli_query($connection, $query);
                if (!$edit_post_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                } else {
                    echo "work";
                }
            
        }
    ?>
          
  <form action="" method="post" enctype="multipart/form-data">    
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text"  value="<?php  {echo $post_title;} ?>" class="form-control" name="title">
     </div>
     <div class="form-group ">
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
      
     <div class="form-group">
        <label for="title">users</label>
         <input type="text" class="form-control" name="users">
     </div>
    

   <div class="form-group">
        <label for="title">Post Author</label>
         <input type="text"  value="<?php  {echo $post_author ;} ?>" class="form-control" name="author">
     </div> 
      <div class="form-group">
      <label for="post_content">Post status</label>
      <input type="text"  value="<?php  {echo  $post_status;} ?>" class="form-control" name="post_status">

     </div>
   <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width='100' class='img-responsive' src='./images/<?php echo $post_image ; ?>' alt='image'>
        <br>
        <input type="file"  name="image"> 
     </div>

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
         <input type="text"  value="<?php  {echo  $post_tags;} ?>" class="form-control" name="post_tags">
     </div>
     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "   name="post_content" id="" cols="30" rows="10"><?php echo  $post_content ; ?></textarea>
     </div>
      <div class="form-group">
         <input class="btn btn-success" type="submit" name="edit_post" value="Edit_Post">
     </div>


</form>
   
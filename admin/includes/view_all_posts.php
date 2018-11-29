

<?php 
  if(isset($_POST['submit']) ){
     foreach($_POST['checkBoxArray'] as $checkBoxValue){
          $bulk_options = $_POST['bulk_options'];
           switch($bulk_options) { 

             case 'published' :
               $query_publish = "UPDATE posts SET post_status = 'published' WHERE post_id = '{$checkBoxValue}'";
               $edit_status_publish = mysqli_query($connection, $query_publish);
                echo "<p class='bg-success'>Post updated . </p>" ;
               break ;

               case 'draft' :
               $query_draft = "UPDATE posts SET post_status = 'draft' WHERE post_id = '{$checkBoxValue}'";
               $edit_status_draft= mysqli_query($connection, $query_draft);
               echo "<p class='bg-success'>Post updated . </p> " ;

               break ;

               case 'delete' :
               $query_delete = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
               $delete_post_query2 = mysqli_query($connection, $query_delete);
               header("Location:posts.php");

               break ;
               case 'clone' :
               $query = "SELECT * FROM posts WHERE  post_id = {$checkBoxValue} ";
              $dispalay_all_post = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($dispalay_all_post)) {
              $p_id = $row['post_id'];
              $p_title = $row['post_title']; 
              $p_author = $row['post_author']; 
              $p_date = $row['poste_date']; 
              $p_image = $row['post_image']; 
              $p_tags = $row['post_tags']; 
              $p_status= $row['post_status'];
              $p_category_id = $row['post_category_id']; 
              $p_comment_count = $row['post_comment_count']; 
              }
               $query_clone = "INSERT INTO posts(post_category_id ,post_title ,post_author,poste_date ,post_image,post_content ,post_tags ,post_comment_count,post_status) VALUES('{$p_category_id}','{$p_title}','{$p_author}',now(),'{$p_image}','{$p_content}','{$p_tags}','{$p_comment_count}','{$p_status}')";
               $clone_post_query = mysqli_query($connection, $query_clone);
               header("Location:posts.php");
               if (!$clone_post_query) {
                  die("QUERY FAILED" . mysqli_error($connection));
               }
               break ;

           }
     
  }
  }
  

 

?>

<form action="" method="post" >

  <div id="bulk_options_container"  >
  <div class="form-group col-xs-4 ">
        <select class="form-control " name="bulk_options" id="">
           <option value="">Select Options</option>
           <option value="published">publish</option>
           <option value="draft">draft</option>
           <option value="delete">delete</option>
           <option value="clone">clone</option>

        </select>
     </div>  
  </div>
  <div class="col-xs-4">
    <input type="submit" name="submit" value="Apply" class="btn btn-success">
    <a href="./posts.php?source=add_post" class="btn btn-primary">Add new</a>
  </div>
<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th><input id="selectAllBox" type="checkbox"></th>
              <th>ID</th>
              <th>Author</th>
              <th>Title</th>
              <th>Categorie</th>
              <th>Status</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comment</th>
              <th>Date</th>
              <th>View Post</th>
              <th>Delete</th>
              <th>Edit</th>
              <th>Views</th>

          </tr>
      </thead>
      <tbody>
      <?php
          $query = "SELECT * FROM posts ORDER BY post_id DESC";
          $dispalay_all_post = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($dispalay_all_post)) {
              $post_id = $row['post_id'];
              $post_title = $row['post_title']; 
              $post_author = $row['post_author']; 
              $poste_date = $row['poste_date']; 
              $post_image = $row['post_image']; 
              $post_tags = $row['post_tags']; 
              $post_status= $row['post_status'];
              $post_category_id = $row['post_category_id']; 
              $post_comment_count = $row['post_comment_count']; 
              $post_views_count = $row['post_view_count']; 

            
              echo "<tr>";
              ?>
              <td> <input  class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id ; ?>"> </td>
              <?php
              echo "<td>$post_id</td>";
              echo "<td>{$post_author}</td>";
              echo "<td>$post_title</td>";

            /********************* Jointure entre posts and category  *******/
              $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
              $edit_cat = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($edit_cat)) {
                $cat_title = $row['cat_title'];
                echo "<td>$cat_title</td>";
              }


              echo "<td>{$post_status}</td>";
              echo "<td> <img width='100' class='img-responsive' src='./images/$post_image' alt='image'></td>";
              echo "<td>{$post_tags}</td>";
              echo "<td>{$post_comment_count}</td>";
              echo "<td>{$poste_date}</td>";
              echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
              echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
              echo "<td><a href='posts.php?source=edit_post&id_p={$post_id}'>Edit</a></td>";
              echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";

              echo "</tr>";
          }
       ?>

       <?php   

        if (isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
            $delete_post_query = mysqli_query($connection, $query);
            header("Location:posts.php");
        }
       
       
       ?>


       
       <?php   

        if (isset($_GET['reset'])) {
            $the_p_id = $_GET['reset'];
            $reset_query = "UPDATE posts SET post_view_count = 0 WHERE post_id = {$the_p_id}" ;
            $reset_post_query = mysqli_query($connection, $reset_query);
            header("Location:posts.php");
        }
       
       
       ?>

       
      </tbody>
  </table>
  </form>
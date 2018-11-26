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
              <th>Delete</th>
              <th>Edit</th>
          </tr>
      </thead>
      <tbody>
      <?php
          $query = "SELECT * FROM posts";
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
            
              echo "<tr>";
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
              echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
              echo "<td><a href='posts.php?source=edit_post&id_p={$post_id}'>Edit</a></td>";
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
      </tbody>
  </table>
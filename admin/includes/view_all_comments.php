

<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Author</th>
              <th>Comment</th>
              <th>Email</th>
              <th>Status</th>
              <th>In Response to</th>
              <th>Date</th>
              <th>Approve</th>
              <th>Unapprove</th> 
              <th>Delete</th> 
          </tr>
      </thead>
      <tbody>
      <?php
          $query = "SELECT * FROM comments";
          $dispalay_all_comment = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($dispalay_all_comment)) {
              $comment_id = $row['comment_id'];
              $comment_post_id = $row['comment_post_id']; 
              $comment_author = $row['comment_author']; 
              $comment_date = $row['comment_date']; 
              $comment_email = $row['comment_email']; 
              $comment_status = $row['comment_status']; 
              $comment_content= $row['comment_content'];
            
            
              echo "<tr>";
              echo "<td>$comment_id</td>";
              echo "<td>$comment_author</td>";
              echo "<td>$comment_content</td>";
              echo "<td>$comment_email</td>";  
              echo "<td> $comment_status</td>";  
              echo "<td>title</td>";
              echo "<td>$comment_date</td>";
              
              echo "<td><a href='posts.php?delete={$comment_id}'>Approve</a></td>";
              echo "<td><a href='posts.php?source=edit_post&id_p={$comment_id}'>Unapprove</a></td>";
              echo "<td><a href='posts.php?delete={$comment_id}'>Delete</a></td>";
              echo "</tr>";
              

          }


            /********************* Jointure entre posts and category  *******/
      /*        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
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
           
           
          }
       ?>


       <?php   

        if (isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
            $delete_post_query = mysqli_query($connection, $query);
            header("Location:posts.php");
        }
       */
       
       ?>
      </tbody>
  </table>
<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Author</th>
              <th>Comment</th>
              <th>Email</th>
              <th>Status</th>
              <th>Date</th>
              <th>In Response to</th>
              <th>Approve</th>
              <th>Unapprove</th>
              <th>Delete</th>

          </tr>
      </thead>
      <tbody>



      <?php
        $query = "SELECT * FROM comments";
        $dispalay_all_comments = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($dispalay_all_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
            $comment_status = $row['comment_status'];

            echo "<tr>";
            echo "<td>$comment_id </td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";
            echo "<td>$comment_date</td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $display_comment_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($display_comment_id)) {
                $post_title = $row['post_title'];
                $post_id = $row['post_id'];
                
                echo "<td><a href='../post.php?source=id_p={$post_id}'>$post_title</a></td>";
                echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                echo "</tr>";

            }
        }
        ?>



       <?php 

        /************ approve ***************************/
        if (isset($_GET['approve'])) {
            $the_comment_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'approve'  WHERE comment_id = {$the_comment_id}";
            $delete_comment_query = mysqli_query($connection, $query);
            header("Location:comments.php");
        }


        /*************** unapprove **************************/

        if (isset($_GET['unapprove'])) {
            $the_comment_id = $_GET['unapprove'];
            $query = "UPDATE comments SET comment_status = 'unapprove'  WHERE comment_id = {$the_comment_id}";
            $delete_comment_query = mysqli_query($connection, $query);
            header("Location:comments.php");
        }


        /*********************** delete *******************/

        if (isset($_GET['delete'])) {
            $the_comment_id = $_GET['delete'];
            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
            $delete_comment_query = mysqli_query($connection, $query);
            header("Location:comments.php");
        }


        ?>
      </tbody>
  </table>
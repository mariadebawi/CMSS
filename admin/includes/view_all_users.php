<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Username</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Email</th>
              <th>Role</th>
              <th>Admin</th>
              <th>Subscribe</th>
              <th>Edit</th>
              <th>Delete</th>

          
          </tr>
      </thead>
      <tbody>
      <?php
          $query = "SELECT * FROM users";
          $dispalay_all_users = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($dispalay_all_users)) {
              $user_id = $row['user_id'];
              $username = $row['username']; 
              $user_firstname = $row['user_firstname']; 
              $user_lastname = $row['user_lastname']; 
              $user_password= $row['user_password'];
              $user_email = $row['user_email']; 
              $user_role = $row['user_role']; 
              $randSalt= $row['randSalt'];
             
            
              echo "<tr>";
              echo "<td>$user_id</td>";
              echo "<td>{$username}</td>";
              echo "<td>$user_firstname</td>";
              echo "<td>$user_lastname</td>";
              echo "<td>$user_email</td>";
              echo "<td> $user_role</td>";
              echo "<td><a href='users.php?changetoAdmin={$user_id}'>Admin</a></td>";
              echo "<td><a href='users.php?changetoSub={$user_id}'>Subscribe</a></td>";
              echo "<td><a href='users.php?source=edit_user&id_u={$user_id}'>Edit</a></td>";
              echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
              echo "</tr>";
          }
       ?>

       




       <?php   

        /************ change to Sub ***************************/
        if (isset($_GET['changetoSub'])) {
            $the_user_id = $_GET['changetoSub'];
            $query = "UPDATE users SET user_role = 'subscribe'  WHERE user_id = {$the_user_id}";
            $sub_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }


        /*************** change to Admin **************************/
        if (isset($_GET['changetoAdmin'])) {
            $userr_id = $_GET['changetoAdmin'];
            $query = "UPDATE users SET user_role = 'admin'  WHERE user_id = {$userr_id}";
            $admin_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }


        /****************  Delete  ***********************/
        if (isset($_GET['delete'])) {
            $the_user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
            $delete_user_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }
       
       
       ?>
      </tbody>
  </table>
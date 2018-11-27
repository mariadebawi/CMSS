




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
      </tbody>
  </table>

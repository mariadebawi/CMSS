<?php include "../includes/db.php";?>



<?php
function users_online(){
    global $connection;

        $session = session_id() ;
        $time = time() ;
        $time_out_in_secend = 05 ;
        $time_out = $time - $time_out_in_secend ;

        $query_online = "SELECT * FROM online_users WHERE session = '$session'" ;
        $get_online_user = mysqli_query($connection , $query_online);
        $online_count = mysqli_num_rows($get_online_user) ;

        if($online_count == null) {
            $query_insert = "INSERT INTO online_users(session,time) VALUES ('$session','$time')" ;
            $insert_online_user = mysqli_query($connection , $query_insert);
        }
        else {
            mysqli_query($connection , "UPDATE online_users SET time = '$time' WHERE session = '$session'");
        }

        $find_online_user = mysqli_query($connection , "SELECT * FROM online_users WHERE time < '$time_out'");
        return $count_online_user= mysqli_num_rows($find_online_user) ;

}



function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "this field shoud not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)  VALUES ('{$cat_title}')";
            $add_catg_query = mysqli_query($connection, $query);
            if (!$add_catg_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function show_all_cat()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $dispalay_all = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($dispalay_all)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_cat()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location:categories.php");
    }
}

function count_table($table){
    global $connection;
    $query1 = "SELECT * FROM " . $table;
    $select_all = mysqli_query($connection, $query1);
    return mysqli_num_rows($select_all);
}



function count_cond($table , $prt , $condi){
    global $connection;
    $query_draft = "SELECT * FROM $table WHERE $prt = '$condi'";
    $select_draft_posts = mysqli_query($connection, $query_draft);
      return mysqli_num_rows($select_draft_posts);

}






?>

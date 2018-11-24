<?php 
include "../includes/db.php";

?>

<?php
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


function show_all_posts()
{
    global $connection;
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
        echo "<td>{$post_category_id}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td> <img width='100' class='img-responsive' src='../images/$post_image' alt='image'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$poste_date}</td>";
        /*
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        */
        echo "</tr>";
    }
}   



?>

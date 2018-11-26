<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button  type="submit" name="submit" class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
</form>
    <!-- /.input-group -->
</div>


<!-- login -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input type="text" name="username" placeholder="enter Username" class="form-control">
    </div>
    <div class="input-group">
        <input type="password" name="password" placeholder="enter password" class="form-control">
        <span class="input-group-btn">
            <button  type="submit" name="login" class="btn btn-primary" >Submit
        </button>
        </span>
    </div>
</form>
    <!-- /.input-group -->
</div>



<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php 
            $query = "SELECT * FROM categories";
            $dispalay_all = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($dispalay_all)) {
                $cat_title = $row['cat_title'];
                $c_id = $row['cat_id'];
                echo "<li><a href='category.php?category=$c_id'>{$cat_title}</a></li>";
            }
            ?>
            </ul>
        </div>
       
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php 
include "includes/widget.php";
?>

</div>
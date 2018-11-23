
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="cat_title"> Edit</label>
                                    
                                <?php 
                                if (isset($_GET['edit'])) {
                                    $catt_id = $_GET['edit'];
                                    $query = "SELECT * FROM categories WHERE cat_id = $catt_id ";
                                    $edit_cat = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($edit_cat)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        ?>
                                    <input type="text" value="<?php if (isset($cat_title)) {
                                                                    echo $cat_title;
                                                                } ?>" class="form-control" name="cat_title" >
                                <?php

                            }

                        }

                        ?>

                                <?php 
                                if (isset($_POST['update'])) {
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = " UPDATE categories SET cat_title ='{$the_cat_title}' WHERE cat_id={$catt_id}";
                                    $update_query = mysqli_query($connection, $query);
                                    if (!$update_query) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }

                                 header("Location:categories.php");
                                }
                                ?>
                                </div>
                                <div class="form-group">
                                        <input class="btn btn-success" type="submit" value="Edit category" name="update"> 
                                        </div>
                            </form>
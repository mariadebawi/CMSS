
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <!-- apres  regex 10/10  en peut mettre /index ou / with php -->
                <a class="navbar-brand" href="/">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
             
            <?php 
              $query = "SELECT * FROM categories Limit 3" ;
              $dispalay_all = mysqli_query($connection , $query);
               while($row = mysqli_fetch_assoc($dispalay_all)){
                   $cat_title = $row['cat_title'] ;
                   $cat_id = $row['cat_id'] ;
                   $category_class = '' ;
                   $registration_class = '' ;
                   $contact_class = '' ;
                   $login_class = '' ;

                   
                  $pageName = basename($_SERVER['PHP_SELF']);
                   $registration = "registration.php" ;
                   $contact = "contact.php" ;
                   $login = "login.php" ;

                    if(isset($_GET['category']) && $_GET['category'] == $cat_id ){
                        $category_class = 'active' ;
                    }
                   else if($pageName == $registration){
                        $registration_class = 'active' ;
                  }
                  else if($pageName == $contact){
                    $contact_class = 'active' ;
              }
              else if($pageName == $login){
                $login_class = 'active' ;
             }
                   echo "<li class='$category_class'><a href='/category/$cat_id'>{$cat_title}</a></li>" ;
             }
               if(!IsAdmin()){
                      // en peut mettre contect sans .php apres .htaccess
                       echo "<li class='$registration_class'> <a href='registration'>Registration</a> </li>" ;
                       echo" <li  class='$login_class'><a href='./login.php'>Login</a></li>" ;
                       echo" <li  class='$contact_class'><a href='contact'>Contact</a></li>" ;
               }
               else{
                       echo "<li> <a href='/admin'>Admin</a> </li>" ;
                       echo "<li> <a href='includes/logout.php'>Logout</a> </li>" ;

                    }
                    ?>
               
                </ul>
             
               
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
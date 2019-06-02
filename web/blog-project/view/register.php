<?php
require_once '../library/connections.php';
require_once '../model/categories-model.php';
require_once '../library/functions.php';
session_start();
$categories = getCategories();
//echo '<pre>';
//print_r($categories);
//echo '</pre>';
$navList = buildNav($categories);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register - Sports Blog</title>
    <meta name="description" content="This is the account registration page.">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/head.php'; ?>
  </head>
  <body>
    <header>
    <h1 class="site-name">Sports Blog</h1>
    <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
        echo '<a id="logout" href="../index.php?action=logout" title="logout">Logout</a>';
      } else {
        echo '<a id="login" href="../index.php?action=login" title="Account Menu">Login</a>';
      }
    ?>
      <nav>
      <?php echo $navList; ?>
    </nav>
    </header>
    
    <main>
    <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = NULL;
      }
      ?>
        
     <h2 class="players-heading">Register</h2>
     <form class="form" method="post" action="/blog-project/index.php">
        
        <fieldset>
          <h2>All fields are required.</h2>
          <label>First Name<input type="text" name="user_first_name" id="user_first_name" placeholder="John" <?php if(isset($user_first_name)){echo "value='$user_first_name'";}  ?> required></label>
          <label>Last Name<input type="text" name="user_last_name" id="user_last_name" placeholder="Smith" <?php if(isset($user_last_name)){echo "value='$user_last_name'";}  ?> required></label>
          <label>Email Address<input type="email" name="user_email" id="user_email" placeholder="johnsmith@example.com" <?php if(isset($user_email)){echo "value='$user_email'";}  ?> required></label>
          <label for="user_password">Password</label> 
          <input type="password" name="user_password" id="user_password" required>
          <input class="submit-button" type="submit" value="Register">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="register">
        </fieldset>  
        
      </form>


    </main>
    <footer>
        <p>This website is used solely for educational purposes. | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
  <script>
  $(document).ready(function() {$('#players').DataTable();}
    </script>
</html>
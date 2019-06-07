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
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/head.php'; ?>
  </head>
  <body>
    <header>
      <h1 class="site-name">Sports Blog</h1>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/header.php'; ?>
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
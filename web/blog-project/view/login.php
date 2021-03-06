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
    <title>Login - Sports Blog</title>
    <meta name="description" content="This is the account login page.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/head.php'; ?>
  </head>
  <body>
    <header>
      <a href="/blog-project/view/home.php"><h1 class="site-name">Sports Blog</h1></a>
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
        
     <h2 class="players-heading">Login</h2>
     

     <form class="form" method="post" action="../index.php">
        <fieldset>
          <label>Email Address<input type="email" name="user_email" id="user_email" placeholder="johnsmith@gmail.com" <?php if(isset($user_email)){echo "value='$user_email'";}  ?> required></label>
          <label>Password<input type="password" name="user_password" id="user_password" required></label> 
          <input type="submit" value="Login" class="submit-button">
          <input type="hidden" name="action" value="Login2">
        </fieldset>  
      </form>

      <h3>Not a member?</h3>
      <a href='register.php' title="Create Account"><p class="register-here">Register here</p></a>

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
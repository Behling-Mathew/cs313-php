<?php

$categories = getCategories();
$navList = buildNav($categories);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accounts Page - Sports Blog</title>
    <meta name="description" content="User Account Page">
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
        
      <h2 class="players-heading">My Account</h2>
      <h4 class="text-center">My Comments</h4>
      <div class="comments-div">
        <?php if ($_SESSION['hasComments'] == TRUE) {
          echo $userCommentsDisplay; 
        } else {
          echo "<h4 class='text-center'>You currently have no comments.</h4>";
        } ?>
      </div>
    </main>
    <footer>
        <p>This website is used solely for educational purposes. | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
  <script>
  $(document).ready(function() {
    $('#players').DataTable();
} ); </script>
</html>
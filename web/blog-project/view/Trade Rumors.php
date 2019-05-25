<?php
require_once '../library/connections.php';
require_once '../model/categories-model.php';
require_once '../library/functions.php';

$categories = getCategories();
//echo '<pre>';
//print_r($categories);
//echo '</pre>';
$navList = buildNav($categories);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Playoffs - Sports Blog</title>
    <meta name="description" content="This is the Trade Rumors Page.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/head.php'; ?>
  </head>
  <body>
    <header>
    <h1 class="site-name">Sports Blog</h1>
      <nav>
      <?php echo $navList; ?>
    </nav>
    </header>
    
    <main>
        
     <h2 class="players-heading">Trade Rumors</h2>
     <img src="/blog-project/images/davis-lebron.png" alt="Anthony Davis and LeBron James" width="960">
     <h3 class="players-heading">Anthony Davis wants out, but what will it cost?</h3>

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
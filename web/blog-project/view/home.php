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

$playersArray = getPlayers();
//echo '<pre>';
//print_r($playersArray);
//echo '</pre>';
if (count($playersArray)) {
    $playerDisplay = buildPlayerTable($playersArray);
} else {
    $playerDisplay = '<p>Sorry, no images could be found.</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - Sports Blog</title>
    <meta name="description" content="This is the home page for UJF sports blog.">
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
    <a href="/blog-project/view/Playoffs.php" title="Playoffs"><h2 class="players-heading home">The 2019 Finals are underway! Click to join the discussion.</h2></a>
    <a href="/blog-project/view/Playoffs.php" title="Playoffs"><img class="img-border" src="/blog-project/images/curry-leonard.jpg" alt="Kawhi Leonard and Steph Curry" width="960"></a>  

    </main>
    <footer>
        <p>This website is used solely for educational purposes. | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
  <script>
</html>
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
    <h2 class="players-heading">Welcome to the home page. This site is still being built, but has some features currently available.</h2>
     <table id="players" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Portrait</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
          <?php echo $playerDisplay; ?> 
        </tbody>
        <tfoot>
            <tr>
                <th>Portrait</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Age</th>
            </tr>
        </tfoot>
    </table>  

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
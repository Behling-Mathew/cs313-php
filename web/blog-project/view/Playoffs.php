<?php
require_once '../library/connections.php';
require_once '../model/categories-model.php';
require_once '../library/functions.php';

$categories = getCategories();
//echo '<pre>';
//print_r($categories);
//echo '</pre>';
$navList = buildNav($categories);

$commentsArray = getComments();
if (count($commentsArray)) {
  $commentsDisplay = buildCommentsTable($commentsArray);
} else {
  $commentsDisplay = '<p>Sorry, no comments could be found.</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Playoffs - Sports Blog</title>
    <meta name="description" content="This is the 2019 Playoffs discussion page.">
    
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
        
     <h2 class="players-heading">Playoffs 2019</h2>
     <img src="/blog-project/images/bracket.PNG" alt="2019 Playoffs Bracket" width="960">
     <h3 class="players-heading">Who do you think will win?</h3>
     <table id="players" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Comments</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
          <?php echo $commentsDisplay; ?> 
        </tbody>
        <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Comments</th>
                <th>Date</th>
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
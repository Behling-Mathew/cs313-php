<?php
require_once '../library/connections.php';
require_once '../model/categories-model.php';
require_once '../library/functions.php';

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
    <title>Home - Sports Blog</title>
    <meta name="description" content="This is the home page for UJF sports blog.">
    
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
      <nav>
      
      
      <?php echo $navList; ?>

      <!-- <button class="toggle-button" onclick="toggleMenu()">&#9776;</button>
      
      <div class="menu-outer" id="nav-bar-hide">
          
          <div class="table">
              
              <ul class="main-nav" id="nav-hide">
              
                  <li><a class="active" href="/acme/home.php" title="ACME Home Page">Home</a></li>
                  <li><a href="#" title="ACME Cannon Page">Cannon</a></li>
                  <li><a href="#" title="ACME Explosive Page">Explosive</a></li>
                  <li><a href="#" title="ACME Misc Page">Misc</a></li>
                  <li><a href="#" title="ACME Rocket Page">Rocket</a></li>
                  <li><a href="#" title="ACME Trap Page">Trap</a></li>
              </ul>
          </div>
      </div> -->
    </nav>
    </header>
    
    <main>
        
     <h2 class="players-heading">Players Page</h2>
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
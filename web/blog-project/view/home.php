<?php
require_once '../library/connections.php';
require_once '../model/categories-model.php';
require_once '../library/functions.php';

$categories = getCategories();
echo '<pre>';
print_r($categories);
echo '</pre>';

$navList = buildNav($categories);




$playersArray = getPlayers();
echo '<pre>';
print_r($playersArray);
echo '</pre>';
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
        
        <table id="example" class="table table-striped table-bordered" style="width:80%">
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
     
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} ); </script>
</html>
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
      <a href="/blog-project/view/home.php"><h1 class="site-name">Sports Blog</h1></a>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/header.php'; ?>
      <nav>
        <?php echo $navList; ?>
      </nav>
    </header>
    
    <main>
        
     <h2 class="players-heading">Trade Rumors</h2>
     <img class="img-border" src="/blog-project/images/davis-lebron.png" alt="Anthony Davis and LeBron James" width="960">
     <h3 class="players-heading">Anthony Davis wants out, but what will it cost?</h3>
     <p class='rumor-report'>Reports state that the Lakers offered the following four players with a first-round pick to the Pelicans for Davis.  The Pelicans refused, which lead us to believe they were never considering any serious offers to begin with.</p>

     <?php
        $id = '<div class="trade-players">';
        foreach ($playersArray as $x) {
          if ($x[last_name] == 'Kuzma' || $x[last_name] == 'Ingram' || $x[last_name] == 'Ball' || $x[last_name] == 'Zubac'){
           
            $id .= '<img class="player-image" src="' . $x['img_path'] . '" alt="Player image of ' . $x['first_name'] . " " . $x['last_name'] . '">';
            $id .= '<p>' . $x['first_name'] . ' ' . $x['last_name'] . '</p>';
            $id .= '<p>' . $x['team'] . '</p>';
            $id .= '<p>Salary: ' . $x['salary'] . '</p>';
            $id .= '<p>Age: ' . $x['age'] . '</p>';
           
        }
      }
      $id .= '</div>';
      echo $id;
     ?>

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
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
        
     <h2 class="players-heading">Playoffs 2019</h2>
     <img class="img-border" src="/blog-project/images/bracket.PNG" alt="2019 Playoffs Bracket" width="960">
     <h3 class="players-heading question">Who do you think will win?</h3>

      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {

        $user_id = $_SESSION['userData']['user_id'];
        $userData = $_SESSION['userData'];
        echo '<h3 class="commenting-as">Commenting as: <span class="red">' . $_SESSION['userData']['user_first_name'] . ' ' . $_SESSION['userData']['user_last_name'] . '</span></h3>';
        $commentForm = "<form method='post' action='../index.php'>";
        $commentForm .= "<fieldset>";
        $commentForm .= "<h2 class='center'>Leave a Comment</h2>";
        $commentForm .= "<textarea rows='10' cols='45' name='comment_text' id='comment_text' required></textarea>";
        $commentForm .= "<input class='submit-comment' type='submit' value='Submit Comment'>";
        $commentForm .= "<input type='hidden' name='user_id' value='" . $user_id . "'>";
        $commentForm .= "<input type='hidden' name='img_id' value='3'>";
        $commentForm .= "<input type='hidden' name='action' value='addNewComment'>";
        $commentForm .= "</fieldset>";
        $commentForm .= "</form>";
        echo $commentForm;
      } else {
        echo "<p'><span class='login-btn'><a href='../index.php?action=login' title='Account Menu'>Login</a></span> to add a comment.</p>";
      }
      ?>

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

      <?php
       /*  $user_id = $_SESSION['userData']['user_id'];
        $userComments = getCommentsByUser($user_id);
 
        $userCommentsDisplay = buildUserComments($userComments);
        if (!count($userComments)) {
         $_SESSION['message'] = "<p class='message'>No comments were found.</p>";
         header('Location: view/home.php');
         exit;
       } else {
         $userCommentsDisplay = buildUserComments($userComments);
         $_SESSION['message'] = "<p class='message'>Comments retrieved.</p>";
         echo $userCommentsDisplay;
         //header('Location: view/home.php');
         //exit;
       } */

       echo $userCommentsDisplay;
      ?>
      <a href="../index.php?action=viewComments" title="View Comments">View User Comments</a>

      
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
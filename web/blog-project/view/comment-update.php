<?php
  if(!$_SESSION['loggedin']){
    header("Location: /blog-project/");
    exit;
  }
  $categories = getCategories();
  $navList = buildNav($categories);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Comment Update Page - Sports Blog</title>
    <meta name="description" content="Modify and update original comments.">
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
        
      <h2 class="players-heading">Update Comment</h2>
      <h4 class="text-center">My Comments</h4>
      
      
      
           <form method='post' action='/blog-project/'>
           <fieldset>
             <textarea class='description' rows='10' cols='45' name='comment_text' id='comment_text'><?php if (isset($comment_text)) {
           echo $comment_text;
         } elseif (isset($toUpdate['comment_text'])) {
           echo $toUpdate['comment_text'];
         } ?></textarea>
             <input type='submit' value='Update Comment' class='submit-button update-submit'>
             <input type='hidden' name='action' value='updateComment'>
             <input type='hidden' name='comment_id' value="<?php if (isset($toUpdate['comment_id'])) {
           echo $toUpdate['comment_id'];
         } elseif (isset($comment_id)) {
           echo $comment_id; 
         } ?>">
           </fieldset>
         </form> 
       
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - Sports Blog</title>
    <meta name="description" content="This is the home page for UJF sports blog.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blog-project/common/head.php'; ?>
  </head>
  <body>
    <header>
      
    </header>
    <nav>
      
      <?php //echo $navList; ?>

      <button class="toggle-button" onclick="toggleMenu()">&#9776;</button>
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
      </div>
    </nav>
    <main>
      
    </main>
    <footer>
     
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
</html>
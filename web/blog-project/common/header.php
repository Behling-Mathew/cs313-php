<?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
        echo '<a id="logout" href="/blog-project/index.php?action=logout" title="logout">Logout</a>';
        echo '<a id="account" href="/blog-project/index.php?action=viewComments" title="My Account">My Account</a>';
      } else {
        echo '<a id="login" href="/blog-project/index.php?action=login" title="Account Menu">Login</a>';
      }
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE && $_SESSION['userData']['user_first_name']) {
        echo "<p id='welcome'>Welcome, " . $_SESSION['userData']['user_first_name'] . "!</p>";
      }
    ?>
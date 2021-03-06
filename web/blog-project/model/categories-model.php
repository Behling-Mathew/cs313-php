<?php

function getCategories() {
    $db = dbConnect();
    $sql = 'SELECT category_name, category_id FROM categories ORDER BY category_name ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    $stmt->closeCursor();
    return $categories;
}

function getPlayers() {
    $db = dbConnect();
    $sql = 'SELECT player_id, first_name, last_name, team, salary, age, img_path FROM players';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $playersArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $playersArray; 
}

function getComments() {
    $db = dbConnect();
    $sql = 'SELECT user_first_name, user_last_name, comment_text, comment_date FROM comments INNER JOIN users ON users.user_id = comments.user_id';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $commentsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $commentsArray; 
}

//get user data based on email address

function getUser($user_email) {
    $db = dbConnect();
    $sql = 'SELECT user_id, user_first_name, user_last_name, user_email, user_password
            FROM  users
            WHERE user_email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $user_email, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

// register a client
// Insert site visitor data to database
function regClient($user_first_name, $user_last_name, $user_email, $user_password) {
    // Create a connection object using the acme connection function
    $db = dbConnect();
    // The SQL statement
    $sql = 'INSERT INTO users (user_first_name, user_last_name, user_email, user_password)
             VALUES (:user_first_name, :user_last_name, :user_email, :user_password)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':user_first_name', $user_first_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_last_name', $user_last_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindValue(':user_password', $user_password, PDO::PARAM_STR);
    //Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
  }


  // check that email exists
function checkEmail($user_email) {
    $db = dbConnect();
    $sql = 'SELECT user_email FROM users WHERE user_email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $user_email, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if (empty($matchEmail)) {
      return 0;
      //echo 'Nothing found';
      //exit;
    } else {
      return 1;
      //echo 'Match found';
      //exit;
    }
  }

  function checkPassword($user_email) {
    $db = dbConnect();
    $sql = 'SELECT user_password, user_email FROM users WHERE user_email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $user_email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    echo 'sql results fetched <br />';
    if (!is_array($results)) {
      return 0;
      echo 'Nothing found <br />';
      //exit;
    } else {
      return $results;
      echo 'found array';
      //exit;
    }
  }

  function insertComment($comment_text, $user_id, $img_id) {
    // Create a connection object using the db connection function
    $db = dbConnect();
    // The SQL statement
    $sql = 'INSERT INTO comments (comment_text, user_id, img_id) VALUES (:comment_text, :user_id, :img_id)';
    // Create the prepared statement using the db connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':comment_text', $comment_text, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':img_id', $img_id, PDO::PARAM_INT);
    
    //Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
  }
  
  // Get the comments left by a specific user
  function getCommentsByUser($user_id) {
    $db = dbConnect();
    $sql = 'SELECT comment_id, comment_date, comment_text, user_id FROM comments WHERE user_id = :user_id ORDER BY comment_date DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $userComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userComments;
  }

  // Delete a specific comment
function deleteComment($commentId) {
  // Create a connection
    $db = dbConnect();
  // The SQL statement to be used with the database
    $sql = 'DELETE FROM comments WHERE comment_id = :commentId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;  
  }

  function getCommentById($commentId) {
    $db = dbConnect();
    $sql = 'SELECT * FROM comments WHERE comment_id = :commentId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->execute();
    $commentById = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $commentById;
  }

  function updateComment($comment_text, $comment_id) {
    // Create a connection object using the acme connection function
    $db = dbConnect();
    // The SQL statement
    $sql = 'UPDATE comments SET comment_text = :comment_text WHERE comment_id = :comment_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
    $stmt->bindValue(':comment_text', $comment_text, PDO::PARAM_STR);
    //Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
  }


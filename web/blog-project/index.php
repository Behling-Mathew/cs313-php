<?php
session_start();

require_once 'library/connections.php';
require_once 'model/categories-model.php';
require_once 'library/functions.php';

$categories = getCategories();


$navList = buildNav($categories);

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){

    case 'logout':
    session_destroy();
    header('Location: view/home.php');
    break;

    case 'login':
    header('Location: view/login.php');
    break;

    case 'Login2':

    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    $user_email_checked = checkEmail($user_email);
    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);
    

// Run basic checks, return if errors
    if (empty($user_email_checked)) {
      $_SESSION['message'] = '<p class="message">Please provide a valid email address</p>';
      header('Location: view/login.php');
      exit;
    }
    $userLogin = checkPassword($user_email);
    $db_password = $userLogin[0]['user_password'];
    if (password_verify($user_password, $db_password))
    {
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['message'] = '<p class="message">You have successfully logged in using ' . $user_email . '.</p>';

      $userData = getUser($user_email);
      $_SESSION['userData'] = $userData;
      header('Location: view/home.php');
      exit;
      
    } else {
      $_SESSION['message'] = '<p class="message">Incorrect password.</p>';
      header('Location: view/login.php');
      exit;
    }
    break;


    case 'register':

    $user_first_name = filter_input(INPUT_POST, 'user_first_name', FILTER_SANITIZE_STRING);
    $user_last_name = filter_input(INPUT_POST, 'user_last_name', FILTER_SANITIZE_STRING);
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);
     

    if(empty($user_first_name) || empty($user_last_name) || empty($user_email) || empty($user_password)){
        $_SESSION['message'] = '<p class="message">Please provide information for all empty form fields.</p>';
        include 'view/register.php';
        exit; 
       }

       $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

       // Send the data to the model
    //$regOutcome = regClient($user_first_name, $user_last_name, $user_email, $user_password);
    $regOutcome = regClient($user_first_name, $user_last_name, $user_email, $hashed_password);
     

     // Check and report the result
    if($regOutcome === 1){
        
        $_SESSION['message'] = "<p class='message'>Thanks for registering $user_first_name. Please use your email and password to login.</p>";
        
        header('Location: view/login.php');
        exit;
       } else {
        $_SESSION['message'] = "<p class='message'>Sorry $user_first_name, but the registration failed. Please try again.</p>";
        include 'view/register.php';
        exit;
       }
       break;

       case 'addNewComment':
       $comment_text = filter_input(INPUT_POST, 'comment_text', FILTER_SANITIZE_STRING);
       //$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
       $img_id = filter_input(INPUT_POST, 'img_id', FILTER_SANITIZE_STRING);

       $user_id = $_SESSION['userData']['user_id'];


       // Check for missing data
    if (empty($comment_text) || empty($user_id) || empty($img_id)) {
        $message = '<p class="message">Error. Please provide information for all empty form fields. ' . $comment_text . ' ' . $user_id . ' ' . $img_id . '</p>';
        $_SESSION['message'] = $message;
        
        header('Location: view/Playoffs.php');
        exit;
      }

      // send data to the model
      $commentOutcome = insertComment($comment_text, $user_id, $img_id);

      if ($commentOutcome === 1) {

        $_SESSION['message'] = "<p class='message'>Your comment was successfully added to the database!</p>";
        header('Location: view/Playoffs.php');
        exit;
      } else {
        $_SESSION['message'] = "<p class='message'>Error. Your comment could not be added.</p>";
        header('Location: view/Playoffs.php');
        exit;
      }

       break;

       case 'viewComments':
       $user_id = $_SESSION['userData']['user_id'];
       $userComments = getCommentsByUser($user_id);

       //$userCommentsDisplay = buildUserComments($userComments);
       if (!count($userComments)) {
        //$_SESSION['message'] = "<p class='message'>No comments were found.</p>";
        $_SESSION['hasComments'] = FALSE;
        include 'view/account.php';
        exit;
      } else {
        $userCommentsDisplay = buildUserComments($userComments);
        $_SESSION['hasComments'] = TRUE;
        include 'view/account.php';
        exit;
      }
      
      break;

      case 'deleteComment':
      $commentId = filter_input(INPUT_GET, 'commentId');
      $deleteResult = deleteComment($commentId);

      if ($deleteResult) {
        $message = "<p class='message'>The comment was successfully deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /blog-project/index.php/?action=viewComments');
        exit;
      } else {
        $message = "<p class='message'>Error: Comment was not deleted." . $commentId . "</p>";
        $_SESSION['message'] = $message;
        header('location: /blog-project/index.php/?action=viewComments');
        exit;
      }
      break;

      case 'updateCommentView':
      $commentId = filter_input(INPUT_GET, 'commentId');
      $toUpdate = getCommentById($commentId);
      if (!count($toUpdate)) {
        $_SESSION['message'] = "<p class='message'>Error. This comment cannot be updated at this time.</p>";
        header('location: /blog-project/index.php/?action=viewComments');
        exit;
      } else {
        include 'view/comment-update.php';
      }
      break;

      case 'updateComment':
      $commentId = filter_input(INPUT_POST, 'comment_id');
      $commentText = filter_input(INPUT_POST, 'comment_text');
      $toUpdate = getCommentById($commentId);

      // Check for missing data
    if (empty($commentId) || empty($commentText)) {
      
      $_SESSION['message'] = "<p class='message'>Form cannot be empty.</p>";
      header("Location: /blog-project/?action=updateCommentView&comment_id='" . $commentId ."'");
      exit;
    }

    $updateOutcome = updateComment($commentText, $commentId);

    if ($updateOutcome === 1) {
      $_SESSION['message'] = "<p class='message'>The update has been successfully recorded!</p>";
      header('location: /blog-project/index.php/?action=viewComments');
      exit;
    } else {
      $_SESSION['message'] = "<p class='message'>Error. The comment was not updated.</p>";
      header('location: /blog-project/index.php/?action=viewComments');
      exit;
    }
    break;


      



    default:
     header('Location: view/home.php');
   }
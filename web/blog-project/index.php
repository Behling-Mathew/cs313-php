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
    //header('Location: /blog-project/index.php');
    break;

    case 'register':

    $user_first_name = filter_input(INPUT_POST, 'user_first_name', FILTER_SANITIZE_STRING);
    $user_last_name = filter_input(INPUT_POST, 'user_last_name', FILTER_SANITIZE_STRING);
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);
     

    if(empty($user_first_name) || empty($user_last_name) || empty($user_email) || empty($user_password)){
        $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
        include 'view/register.php';
        exit; 
       }

       // Send the data to the model
    $regOutcome = regClient($user_first_name, $user_last_name, $user_email, $user_password);
     

     // Check and report the result
    if($regOutcome === 1){
        
        $_SESSION['message'] = "<p>Thanks for registering $user_first_name. Please use your email and password to login.</p>";
        
        header('Location: view/register.php');
        exit;
       } else {
        $_SESSION['message'] = "<p>Sorry $user_first_name, but the registration failed. Please try again.</p>";
        include 'view/register.php';
        exit;
       }
       break;
    default:
     header('Location: view/home.php');
   }
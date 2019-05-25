<?php

function buildNav($categories) {

    $navList = '<button class="toggle-button" onclick="toggleMenu()">&#9776;</button>';
    $navList .= '<div class="menu-outer" id="nav-bar-hide">';        
    $navList .= '<div class="table">';       
    $navList .= '<ul class="main-nav" id="nav-hide">';          
    $navList .= '<li><a class="active" href="/blog-project/view/home.php" title="Home Page">Home</a></li>';
    
    foreach ($categories as $category) {
        $navList .= "<li><a href='#' title='View the $category[category_name] page'>$category[category_name]</a></li>";
    }          
       $navList .= '</ul>';
       $navList .= '</div>';
       $navList .= '</div>';
       return $navList;
}

function buildImageDisplay($imageArray) {
    $id = '<div>';
    foreach ($imageArray as $x) {
        $id .= '<img class="player-image" src="' . $x['img_path'] . '" alt=Player image name:' . $x['img_name']; 
    }
    $id .= '</div>';
    return $id;
}
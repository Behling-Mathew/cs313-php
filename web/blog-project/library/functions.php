<?php

function buildNav($categories) {

    $navList = '<button class="toggle-button" onclick="toggleMenu()">&#9776;</button>';
    $navList .= '<div class="menu-outer" id="nav-bar-hide">';        
    $navList .= '<div class="table">';       
    $navList .= '<ul class="main-nav" id="nav-hide">';          
    $navList .= '<li><a class="active" href="/blog-project/view/home.php" title="Home Page">Home</a></li>';
    
    foreach ($categories as $category) {
        $navList .= "<li><a href='/blog-project/view/". $category[category_name] . ".php'" . " title='View the $category[category_name] page'>$category[category_name]</a></li>";
    }          
       $navList .= '</ul>';
       $navList .= '</div>';
       $navList .= '</div>';
       return $navList;
}

function buildPlayerTable($playersArray) {
    $id = '';
    foreach ($playersArray as $x) {
        $id .= '<tr>';
        $id .= '<td><img class="player-image" src="' . $x['img_path'] . '" alt="Player image of ' . $x['first_name'] . " " . $x['last_name'] . '"></td>';
        $id .= '<td>' . $x['first_name'] . '</td>';
        $id .= '<td>' . $x['last_name'] . '</td>';
        $id .= '<td>' . $x['team'] . '</td>';
        $id .= '<td>' . $x['salary'] . '</td>';
        $id .= '<td>' . $x['age'] . '</td>';
        $id .= '</tr>';
    }
    return $id;
}

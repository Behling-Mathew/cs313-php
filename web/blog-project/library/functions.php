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

function buildImageDisplay($playersArray) {
    $id = '<tr>';
    foreach ($playersArray as $x) {
        $id .= '<td><img class="player-image" src="' . $x['img_path'] . '" alt="Player image of ' . $x['first_name'] . " " . $x['last_name'] . '"></td>';
        $id .= '<td>' . $x['first_name'] . '</td>';
        $id .= '<td>' . $x['last_name'] . '</td>';
        $id .= '<td>' . $x['team'] . '</td>';
        $id .= '<td>' . $x['salary'] . '</td>';
        $id .= '<td>' . $x['age'] . '</td>';
    }
    $id .= '</tr>';
    return $id;
}

<tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>

            <th>Portrait</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Age</th>
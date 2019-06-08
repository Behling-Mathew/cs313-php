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

function buildCommentsTable($commentsArray) {
    $ca = '';
    foreach ($commentsArray as $x) {
        $ca .= '<tr>';   
        $ca .= '<td>' . $x['user_first_name'] . '</td>';
        $ca .= '<td>' . $x['user_last_name'] . '</td>';
        $ca .= '<td>' . $x['comment_text'] . '</td>';
        $ca .= '<td>' . $x['comment_date'] . '</td>';
        $ca .= '</tr>';
    }
    return $ca;
}

 //Build a display for comments for a specific user
 function buildUserComments($userComments){
    $uc = "<div>";
    foreach ($userComments as $userComment){
      $uc .= '<div><p> '. date("F jS, Y", strtotime($userComment['comment_date'])).'</p>';
      $uc .= "<p><q><em>$userComment[comment_text]</em></q></p>";
      $uc .= "<p><a class='delete' href='/blog-project/index.php?action=deleteComment&commentId=" . urlencode($userComment['comment_id']) . "' title='Click here to delete this comment. $userComment[comment_id].'>Delete</a>";
      $uc .= "<a class='update' href='/blog-project/index.php?action=updateCommentView&commentId=" . urlencode($userComment['comment_id']) . "' title='Click here to update this comment. $userComment[comment_id].'>Update</a></p></div>";
    }
    $uc .= "</div>";
    
    return $uc;
  }
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

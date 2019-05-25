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

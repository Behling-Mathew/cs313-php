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

function getImages() {
    $db = dbConnect();
    $sql = 'SELECT img_id, img_name, img_path FROM images';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $imageArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $imageArray; 
}

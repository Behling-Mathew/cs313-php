<?php

function getCategories() {
    $db = dbConnect();
    $sql = 'SELECT category_name, category_id FROM categories ORDER BY category_name ASC';
    $stm = $db->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    $stmt->closeCursor();
    return $categories;
}

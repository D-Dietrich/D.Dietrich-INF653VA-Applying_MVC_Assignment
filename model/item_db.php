<?php
function get_items_by_category ($category_id) {
    global $db;

    if ($category_id == NULL || $category_id == FALSE) {
        $query = "SELECT T.Title, T.Description, T.ItemNum, C.categoryName
                     FROM todoitems T
                     INNER JOIN categories C
                     ON T.categoryID = C.categoryID";
                     $statement=$db->prepare($query);
                     $statement->execute();
                     $results = $statement->fetchAll();
                     $statement->closeCursor();
        return $results;
    }
    else{
        $query = "SELECT * FROM todoitems
        WHERE todoitems.categoryID = :category_id
        ORDER BY ItemNum" ;
        $statement=$db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
}

function get_item ($ItemNum) {
    global $db;
    $query = "SELECT * FROM todoitems
    WHERE todoitems.ItemNum = :ItemNum" ;
    $statement=$db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function delete_item($ItemNum) { 
    global $db;
    $query = 'DELETE FROM todoitems
    WHERE ItemNum = :ItemNum'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum); 
    $statement->execute(); 
    $statement->closeCursor();
    }

function add_item ($categoryID, $title, $description) {
    global $db;
    $query = "INSERT INTO todoitems (Title, Description, categoryID) VALUES (:title, :description, :categoryID)";
            $statement=$db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->execute();
            $statement->closeCursor();
			
}
?>
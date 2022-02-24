<?php
require('model/database.php'); 
require('model/item_db.php'); 
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action'); 
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL) {
        $action = 'list_items'; } 
} 

if ($action == 'list_items')
{
    $category_id = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    $category_name = get_category_name($category_id); 
    $categories = get_categories();
    $results = get_items_by_category($category_id); 
    include('view/item_list.php');
} //Done

else if ($action == 'delete_item') { 
    $ItemNum = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($ItemNum == NULL || $ItemNum == FALSE) 
        { $error = "Missing or incorrect Item Number."; 
        include('view/error.php');
    }
    else {
        delete_item($ItemNum); 
        header("Location: .?category_id=$category_id");
    }
} //Done

else if ($action == 'show_add_item_form') { 
    $categories = get_categories(); 
    include('view/add_item_form.php'); //Done
} 
else if ($action == 'add_item') {
    $category_id = filter_input(INPUT_POST, 'category_ID', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING); 
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING); 
    if ($category_id == NULL || $category_id == FALSE || $title == NULL || $title == FALSE || $description == NULL || $description == FALSE) 
        { $error = "Invalid data. Check all fields and try again."; 
            include('view/error.php');
    } 
    else {
        add_item($category_id, $title, $description); 
        header("Location: .?category_id=$category_id");
    } //Done
}
else if ($action == 'show_categories') { 
    $results = get_categories(); 
    include('view/category_list.php'); //Done
}
else if ($action == 'delete_category') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id == NULL || $id == FALSE ) 
        { $error = "Missing or incorrect Category Number."; 
        include('view/error.php');
    }
    else {
        delete_category($id); 
        header("Location: .?category_id=$category_id");
    }
}
else if ($action == 'add_category') {
    $categoryName = filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING);

    if ($categoryName == NULL || $categoryName == FALSE) 
    { $error = "Invalid data. Check all fields and try again."; 
        include('view/error.php');
} 
else {
    add_category($categoryName); 
    header("Location: .?category_id=$category_id");
}
}

?>

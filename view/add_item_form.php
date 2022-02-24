
<?php include('view/header.php');?>

<form id="myForm" action="." method="POST">
        <label for="category">Category:</label>
            <select name="category_ID" id="category_ID" required>
            <option disabled selected value> -- Select Category -- </option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
                <label for='title'>Title:</label>
                <input type="text" id="title" name="title" required>
                <label for='description'>Description:</label>
                <input type="text" id="description" name="description" required>
                <input type="hidden" name="action" value="add_item">
                <button type="submit" name="submit" id="submit" class="sub_button">Add Item</button>
            </form>
            <?php include('view/footer.php');?>
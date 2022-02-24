<?php 
            include('view/header.php');?>
           

            <?php if(!$results){?>
               <h2> There are no To Do items to display</h2> 
                    
                     <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th >Action</th>
                        <th> Category</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php foreach($results as $result) {
                        $id = $result["ItemNum"];
                        $title = $result["Title"];
                        $description = $result["Description"]; 
                        if($category_id == NULL || $category_id == FALSE)
                            {$category = $result["categoryName"];}
                        else {$category = $category_name;}?>
                        <tr>
                            <td> <?php echo $title; ?> </td>
                            <td > <?php echo "Description: ", $description; ?> </td>
                            <td > <?php echo $category; ?> </td>

                            <td id="delete_button" > 
                                <form id="delete" action = "." method="POST">
                                <input type="hidden" name="action" value="delete_item">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button> X </button>
                                </form>
                            </td>
                        </tr>
                    <?php } }?>	
                </tbody>
            </table>
            <form id="myForm">
           <label for="categoryID"></label>
            <select name="categoryID" id="categoryID">
            <option disabled selected value> -- Filter By Category -- </option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            <option value="<?php echo FALSE; ?>">
                    <?php echo '**Remove Filter**'; ?>
                </option>
            <input type="hidden" name="action" value="list_items">
                <button type="submit" name="submit" id="submit" class="sub_button">Filter</button>
            </form>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="show_add_item_form">
                <button type="submit" name="submit" id="submit" class="sub_button">Add Item</button>
            </form>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="show_categories">
                <button type="submit" name="submit" id="submit" class="sub_button">Manage Catergories</button>
            </form>
            <?php include('view/footer.php');?>
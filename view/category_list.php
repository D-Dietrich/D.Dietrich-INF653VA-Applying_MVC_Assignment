
<?php include ('view/header.php');?>
             

            <?php if(!$results){?>
               <h2> There are Catagories to display</h2> 
                    
                     <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php foreach($results as $result) {
                        $id = $result["categoryID"];
                        $catName = $result["categoryName"];?>
                        <tr>
                            <td> <?php echo $catName; ?> </td>
                            <td id="delete_button" > 
                                <form id="delete" action = "." method="POST">
                                <input type="hidden" name="action" value="delete_category">
                                <input type="hidden" name="id" value="<?php echo $result['categoryID'] ?>">
                                <button> X </button>
                            </form>
                            </td>
                        </tr>
                        
                    <?php } }?>	
                </tbody>
            </table>
            <form id="myForm" action="." method="POST">
                <label for='category'>Category Name:</label>
                <input type="text" id="category" name="category" required>
                <input type="hidden" name="action" value="add_category">
                <button type="submit" name="submit" id="submit" class="sub_button">Add Category</button>
            </form>
            <form id="myForm" action="." method="POST">
                <input type="hidden" name="action" value="list_items">
                <button type="submit" name="submit" id="submit" class="sub_button">View Item List</button>
            </form>
            
 <?php include ('view/footer.php');
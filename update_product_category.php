<?php

include "product_class.php";
include "categories_class.php";
$category = new Categories();
$catList = $category->displayCategory();

$update = new Products();

if (isset($_POST["edit_id"])) {
  $editId = $_POST["edit_id"];
  $product = $update->displyaRecordById($editId);

  $catTitle = $category->displyaRecordById($product['category_id']);
  
}

?>

<div class="row g-3 mb-4">
    <div class="col-sm">
    <label for="category">Category:</label>
    <select name="category" id="">
        <option value = "<?php echo $product['category_id']?>" checked = "checked"> <?php echo $catTitle['title']?> </opttion>
        <?php
        foreach($catList as $cl){ 
        ?>
        <?php
            if ($product['category_id'] != $cl['id']){
        ?>
        <option value="<?php  echo $cl['id'] ?>"> <?php echo $cl['title'] ?></option>
        <?php
            }
        }
        ?>
    </select>
    </div>
</div>

<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="catId" value="<?php echo $product['category_id']; ?>">

</div>

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
  <div class="col-sm-6">
  <label for="name">Model</label>
    <input type="text" class="form-control" name="model" value="<?php echo $product['model']; ?>" >
  </div>
  <div class="col-sm">
  <label for="email">Title:</label>
    <input type="text" class="form-control" name="title" value="<?php echo $product['title']; ?>">
  </div>
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
<div class="row g-3 mb-4">
  <div class="col-sm-4">
  <label for="username">Display</label>
    <input type="text" class="form-control" name="display" value="<?php echo $product['display']; ?>">
  </div>
  <div class="col-sm">
  <label for="email">Battery</label>
    <input type="text" class="form-control" name="battery" value="<?php echo $product['battery']; ?>">
  </div>
  <div class="col-sm">
  <label for="email">Qty</label>
    <input type="text" class="form-control" name="qty" value="<?php echo $product['qty']; ?>">
  </div>
</div>
  <div class="row g-3">
  <div class="col-sm-4">
  <label for="username">Hardware</label>
    <input type="text" class="form-control"  name="hardware" value="<?php echo $product['hardware']; ?>">
  </div>
  <div class="col-sm">
  <label for="username">Price</label>
    <input type="text" class="form-control"  name="price" value="<?php echo $product['price']; ?>">
  </div>
  <div class="col-sm">
  <label for="username">Camera</label>
    <input type="text" class="form-control"  name="camera" value="<?php echo $product['camera']; ?>">
  </div>
</div>
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

  </div>

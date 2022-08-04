<?php


include "categories_class.php";

$update = new Categories();

if (isset($_POST["edit_id"])) {
  $editId = $_POST["edit_id"];
  $category = $update->displyaRecordById($editId);
}

?>

  <div class="row g-3 mb-4">
 
  <div class="col-sm">
  <label for="email">Title:</label>
    <input type="text" class="form-control" name="title" value="<?php echo $category['title']; ?>">
  </div>
</div>

 
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

  </div>


<?php
require_once 'scripts/config.php';
confirm_logged_in();

$cat_tbl   = 'tbl_category';

$product_categories = getAll($cat_tbl);

if (isset($_POST['submit'])) {
    $pic     = $_FILES['pic'];
    $name    = $_POST['name'];
    $text    = $_POST['text'];
    $price   = $_POST['price'];
    $cat     = $_POST['catList'];
    if(empty($name) || empty($text) || empty($pic) || empty($price) || empty($cat)){
        $message = 'all fields required';

    }else{

        $result  = addProduct($pic, $name, $text, $price, $cat);        
        $message = $result;

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Product</title>
</head>

<body>
<a href="scripts/caller.php?caller_id=logout" >Logout</a>
  <main>
    <div>
    <div>
<h2>Add a Product</h2>
<div>

<form  action="admin_addproduct.php" method="post" enctype="multipart/form-data">
<input type="text" name="name"  id="input name" class="form-control" placeholder="Product Name">
<input type="text" name="text" id="input text"  placeholder="Product ID Number">
<input type="text" name="price" id="input price" placeholder="Product Price">

<select name="catList" id="catlist select" >
        <option value="" disabled selected>Category</option>
        <?php while ($product_category = $product_categories->fetch(PDO::FETCH_ASSOC)): ?>
<option value="<?php echo $product_category['category_id']; ?>">
    <?php echo $product_category['category_name']; ?>
</option>
<?php endwhile; ?>
    </select>
<div>
    <div >
        <input type="file" name="pic" id="fileInput pic">
    </div>
</div>

<button type="submit" name="submit">Submit</button>
</form>
</div>
</div>

<a href="../admin"><button>Back</button></a>

</div>
  </main>
 
</body>
</html>



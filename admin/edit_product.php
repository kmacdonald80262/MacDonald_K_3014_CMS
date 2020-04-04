<?php

	require_once('scripts/config.php');
	include('scripts/connect.php');
	confirm_logged_in();

	if(isset($_REQUEST['update_id'])){
		try{

			$id = $_REQUEST['update_id']; 
			$update_user_query = 'SELECT * FROM tbl_products WHERE prod_id =:id';
			$update_set = $pdo->prepare($update_user_query);
			$update_set->execute(
				array(

					':id'=>$id

				)
			);
		}

		catch(PDOException $e) {
			$e->getMessage();

		}
	}

	$cat_tbl  = 'tbl_category';
	$product_categories = getAll($cat_tbl);

	if(isset($_REQUEST['update_prod'])){

		$name  	= trim($_POST['name']);
		$num   = trim($_POST['num']);
		$price  = trim($_POST['price']);
		$result = editProduct($pic, $name, $num, $price, $category);
		$message = $result;

	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Product Details</title>
</head>
<body>
        
<a href="scripts/caller.php?caller_id=logout">Logout</a>

  <main>
    <div>
<div>

<h2>Edit a Product
</h2>
<div>

<?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>
	<?php if($row = $update_set->fetch(PDO::FETCH_ASSOC)):?>
<form  method="post">

<input type="text" name="name"  value="<?php echo $row['prod_name'];?>" id="prod-name">
<input type="text" id="prod-num" name="num" value="<?php echo $row['prod_num'];?>">
<input type="text" name="price" id="prod-price" value="<?php echo $row['prod_price'];?>">
<button type="submit" name="update_prod" value="update" name="submit">Submit</button>
</form>

<?php endif; ?>
</div>
</div>

<a href="../admin"><button>Back</button></a>

</div>
  </main>


</body>
</html>
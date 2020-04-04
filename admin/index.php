<?php 
	require_once('scripts/config.php');
	confirm_logged_in();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin</title>

</head>
<body>
<a href="scripts/caller.php?caller_id=logout">Logout</a>
<a href="admin_addproduct.php"> <button type="button">Add Products </button></a>
<a href="admin_product.php"><button type="button" >Edit or Delete Products</button></a>
</body>

</html>

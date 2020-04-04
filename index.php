<?php require_once('admin/scripts/config.php');
if(isset($_GET['filter'])){
	$tbl = 'tbl_products';
	$tbl_2 = 'tbl_category';
	$tbl_3 = 'tbl_product_category';
	$col = 'prod_id';
	$col_2 = 'category_id';
  $col_3 = 'category_name';
  
	$filter = $_GET['filter'];
	$results = filterResults($tbl,$tbl_2,$tbl_3,$col,$col_2,$col_3,$filter);
}else{
	$results = getAll('tbl_products');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sportchek Inventory</title>
</head>

<body>
  <a href="admin/">Admin</a>
      <a href="index.php?filter=jersey">Jersey</a>
      <a href="index.php?filter=equipment">Equipment</a>
      <a href="index.php?filter=electronics">Electronics</a>
      <a href="index.php?filter=shoes">Shoes</a>
			<a href="index.php?filter=hiking">Hiking</a>
      <a  href="index.php?filter=kids">Kids</a>
      <a  href="index.php?filter=shirts">Shirts</a>
      <a href="index.php">All</a>
 <?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>

<div>
  <div>
	<img src="images/<?php echo $row['prod_img'];?>" alt="<?php echo $row['prod_name'];?> "alt="">
  </div>
 
	<h2>
	<?php echo $row['prod_name'];?>
	 	</h2>

	<h3>
	 <?php echo $row['prod_price'];?>
  </h3>
<h3>
<?php echo $row['prod_num'];?>
</h3>

</div>

<?php endwhile;?>
</div>
    </section>
    </div>
  </main>
  
</body>
</html>

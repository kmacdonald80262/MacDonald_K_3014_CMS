<?php require_once('scripts/config.php');
    $results = getAll('tbl_products');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Edit or Delete</title>
<body>

<a href="scripts/caller.php?caller_id=logout">Logout</a>
  <main>
    <div class="container">

	<table>
			<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
        <td><img src="../images/<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name'];?>" width="100px" height="60px"></td>
				<td ><?php echo $row['prod_name'];?></td>
				
				<td><a href="edit_product.php?update_id=<?php echo $row['prod_id']; ?>"><button type="button">Edit</button></a></td>
				<td><a href="scripts/caller.php?caller_id=erase&id=<?php echo $row['prod_id']; ?>"><button type="button">Delete</button></a></td>
            </tr>
            <?php endwhile; ?>
        </body>
    </table>

	<a href="../admin"><button>Back</button></a>
</div>
  </main> 
</body>
</html>

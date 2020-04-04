<?php 
	require_once('scripts/config.php');
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = 'Please log in';
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$message = login($username,$password,$ip);
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Page</title>
 
</head>
<body>
    <h1>
    	Admin Login
    </h1>
  <main>
    <div>
	<?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>
	<form action="admin_login.php" method="post">
		<label>Username:
			<input type="text" name="username" placeholder="admin" value="" required>
		</label>
		<br>
		<label>Password:
			<input type="password" name="password" placeholder="password" required>
		</label>
		<br>
		<button type="submit">Submit</button>
	</form>

<a href="../index.php"><button>Back</button></a>

</div>
  </main>
</body>

</html>

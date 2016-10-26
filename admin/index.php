<?php 

session_start();

include_once('../includes/connection.php');


	if (isset($_SESSION['logged_in'])) {
	?>	

	<html>
	<head>
		<title> FIRST CMS </title>
	    <link rel="stylesheet" type="text/css" href="../styless.css">
	</head>

	<body>
	
		<div class="container">	
		<a href="index.php" id="logo">FirstCMS</a>

		<br>

		<ol>
			<li> <a href="add.php">Add Article</a></li>
			<li> <a href="delete.php">Delete Article</a></li>
			<li> <a href="logout.php">Log Out</a></li>

		</ol>

		 
		</div>

	</body>
	</html>



	<?php
}

	else {	
		if (isset($_POST['username'], $_POST['password'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			if (empty($username) or empty($password)) {
				$error = 'All field are required';
			}
			else {
				$query = $connect->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

				$query->bindValue(1, $username);
				$query->bindValue(2, $password);

				$query->execute();

				$num = $query->rowCount();

				if ($num == 1) {
					$_SESSION['logged_in'] = true;
					header('Location: index.php');
					exit();
				}
				else {
					$error = "Incorrect details";
				}
			}
		}

		?>

	<html>
	<head>
		<title> FIRST CMS </title>
	    <link rel="stylesheet" type="text/css" href="../styless.css">
	</head>

	<body>
	
		<div class="container">	
		<a href="index.php" id="logo">FirstCMS</a>

		<br>
		<br>

		<?php if(isset($error)) { ?>
			<small style="color:#aa0000;"> 
			<?php echo $error;?> 
			<br><br>
			</small>
		<?php } ?>


		<form action="index.php" method="post" autocomplete="off"> 

			<input type="text" name="username" placeholder="username" />
			<input type="password" name="password" placeholder="password" />
			<input type="submit" value="Log In">

		</form>
		 

		<a href="../index.php">&larr; back</a>
		</div>

	</body>
	</html>




		<?php
}

	?>
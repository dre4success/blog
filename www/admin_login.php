<?php
		
	# include db connection
	include 'includes/db.php';

	# page Title
	$page_title = "Login";

	# include header
	include 'includes/header.php';

	# include function
	include 'includes/functions.php';

	# error caching
	$errors = [];
?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
				<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<?php
					if(isset($_GET['msg']))
					echo '<span class="err">'. $_GET['msg']. '</span>';
					
						$display = displayErrors($errors, 'email');
						echo $display;

				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
					if(isset($_GET['msg']))
					echo '<span class="err">'. $_GET['msg']. '</span>';
					
					$display = displayErrors($errors, 'password');
					echo $display;
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="register" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
		</div>


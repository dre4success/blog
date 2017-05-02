<?php
		
	# include db connection
	include 'includes/db.php';

	# include header
	include 'includes/header.php';

	# error caching
	$errors = [];

	# form validation
	if(array_key_exists('register', $_POST)){

		if(empty($_POST['fname'])){
			$errors['fname'] = "Please Enter Your Firstname";
		}

		if(empty($_POST['lname'])){
			$errors['lname'] = "Please Enter Your Lastname";
		}

		if(empty($_POST['email'])){
			$errors['email'] = "Please Enter Your Email";
		}

		if(empty($_POST['password'])){
			$errors['password'] = "Please Enter Your Password";
		}

		if(empty($_POST['pword'])){
			$errors['pword'] = "Please Confirm Your Password";
		}

		if($_POST['pword'] != $_POST['password']){
			$errors['pword'] = "Password Does not match";
		}
	}
			
?>

	
	<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

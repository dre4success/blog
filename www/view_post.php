<?php

session_start();
	
# include db connection
	include 'includes/db.php';

	# page Title
	$page_title = "Add Post";

	# include function
	include 'includes/functions.php';
	Tools::LoginCheck();

	# include header
	include 'includes/view.php';


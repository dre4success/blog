<?php

	$blogTitle = "Trial and Error";

	$blogDesc = "Testing This Blog";

	include 'includes/front_header.php';

	include 'includes/functions.php';

	include 'includes/db.php';
?>

	<div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
		<div class="blog-post">
            
            	<?php
            			$view = Tools::ViewPostFrontend($conn);
            			echo $view;
            	?>
       </div>
       </div>
       </div>
       </div>
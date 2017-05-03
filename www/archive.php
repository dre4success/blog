<?php

	include 'includes/front_header.php';

	include 'includes/functions.php';

	include 'includes/db.php';

	if(isset($_GET['post_id'])){

		$postID = $_GET['post_id'];
	}

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
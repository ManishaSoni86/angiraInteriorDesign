<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-Edge">
	<meta name="author" content="webThemez.com">
	<title>Interior-Design-Responsive-Website-Templates-Edge</title>
	<link rel="favicon" href="<?php echo $this->config->item('host_url'); ?>assets/app/images/favicon.png">
	<link rel="stylesheet" media="screen" href="<?php echo $this->config->item('host_url'); ?>assets/app/font/font-family=Open+Sans.html">
	<link rel="stylesheet" href="<?php echo $this->config->item('host_url'); ?>assets/app/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('host_url'); ?>assets/app/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="<?php echo $this->config->item('host_url'); ?>assets/app/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="<?php echo $this->config->item('host_url'); ?>assets/app/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='<?php echo $this->config->item('host_url'); ?>assets/app/css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

		
	<script type='text/javascript' src='<?php echo $this->config->item('host_url'); ?>assets/js/jquery-1.11.1.min.js'></script>
	<link href="<?php echo $this->config->item('host_url'); ?>assets/boxerPlugin/jquery.fs.boxer.css" rel="stylesheet" type="text/css" media="all">
		<script src="<?php echo $this->config->item('host_url'); ?>assets/boxerPlugin/jquery.fs.boxer.js"></script>

		<!--[DEMO:START-RESOURCES]-->

		<style>
			.boxer { border: none; }
			.inline_content { width: 300px; overflow: hidden; padding: 0 20px; }
			#boxer h3 { font-style: italic; font-size: 16px; margin: 0; padding: 15px 10px 10px; }

			#boxer.mobile.inline .boxer-content { background: #fff; }
			#boxer.mobile.inline .inline_content { height: 10000px; overflow: scroll; padding: 30px 50px; width: 100%; }
		</style>

		<script type='text/javascript'>
			jQuery(document).ready(function() {
				jQuery(".boxer").not(".retina, .boxer_fixed, .boxer_top, .boxer_format, .boxer_mobile, .boxer_object").boxer();

				jQuery(".boxer.boxer_fixed").boxer({
					fixed: true
				});

				jQuery(".boxer.retina").boxer({
					retina: true
				});

				jQuery(".boxer.boxer_object").click(function(e) {
					e.preventDefault();
					e.stopPropagation();

					jQuery.boxer( $('<div class="inline_content"><h2>More Content!</h2><p>This was created by jQuery and loaded into the new Boxer instance.</p></div>') );
				});

				jQuery(window).one("pronto.load", function() {
					jQuery.boxer("close");
					jQuery(".boxer").boxer("destroy");
				});
				
				// for move at deliverable menu single product on click of all product title
				jQuery(".MainProdTitle").click(function(){
		 			jQuery("html,body").animate({scrollTop:jQuery(".singlepageContainer").offset().top},1000);	
		 		});
		 		//for move on top
		 		 jQuery("#moveTop").click(function(){
		 			jQuery("html,body").animate({scrollTop:0},1000);	
				 });
			});
		</script>
		

</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">		
		 <?php if(isset($topWidgets['navbarMenu'])){$this->load->view($topWidgets['navbarMenu']);} ?>
	</div>
	<!-- /.navbar -->

	<!-- Header -->	
		 <?php if(isset($topWidgets['topGalleryHome'])){$this->load->view($topWidgets['topGalleryHome']);} ?>
		 <?php if(isset($topWidgets['topGallery'])){$this->load->view($topWidgets['topGallery']);} ?>
	<!-- /Header -->
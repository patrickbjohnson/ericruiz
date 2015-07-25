<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ) ?>Eric Ruiz</title>
	<meta name="author" content="">
	<link rel="author" href="">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<?php wp_head() ?>
	<script src="//use.typekit.net/xvy1guw.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

</head>
<body <?php body_class() ?>>
	<header class="header">
		<div class="container">
			<div class="blog-header">
				<div class="title">
					<span class="page-subtitle">The blog of</span>
					<h1><a class="page-title flag" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
							<?php bloginfo('name') ?>
						</a></h1>
						<!-- <span class="content-flag"></span> -->
				</div>
			</div>
			<?php wp_nav_menu(array(
				'theme_location' => 'main-nav',
				'container'      => 'nav',
				'container_class' => 'nav-main',
				'container_id'   => 'primary-nav'
			)) ?>
			
		</div>
	</header>
	<div class="container">


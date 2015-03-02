<!doctype html>
<html lang="pt-br">
<?php define('TITLE',wp_title( '|', false, 'right' ).' '.NAME.' - '.DESCRIPTION); ?>
<head>

	<meta charset="UTF-8">
	<meta name="author" content="Jefferson Mexkiv" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="revisit-after" content="7 days"  />
	<meta name="description" content="<?php echo DESCRIPTION; ?>">

	<meta itemprop="name" content="<?php echo TITLE; ?>" />
	<meta itemprop="description" content="<?php echo DESCRIPTION; ?>" />
	<meta itemprop="image" content="<?php echo TEMPLATE; ?>/img/facebook.jpg" />

	<meta property="og:title" content="<?php echo TITLE; ?>" />
	<meta property="og:image" content="<?php echo TEMPLATE; ?>/img/facebook.jpg" />
	<meta property="og:url" content="<?php echo URL; ?>" />
	<meta property="og:description" content="<?php echo DESCRIPTION; ?>" />
	<meta property="og:site_name" content="<?php echo TITLE; ?>" />

	<?php wp_head(); ?>

	<title><?php echo TITLE; ?></title>

</head>

<body>
	
	<div class="wrap">

		<header>

			<h1><a href="<?php echo URL; ?>" title="<?php echo NAME; ?>"><?php echo NAME; ?></a></h1>

		</header>
		



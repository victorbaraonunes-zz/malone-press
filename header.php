<!doctype html>
<html lang="pt-br">
	<?php define('TITLE', wp_title( '|', false, 'right' ) . ' ' . NAME . ' - ' . DESCRIPTION); ?>

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />

		<meta name="robots" content="noindex,nofollow" />
		<meta name="revisit-after" content="7 days" />
		<meta name="author" content="Jefferson Mexkiv" />
		<meta name="description" content="<?php echo DESCRIPTION; ?> " />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<meta itemprop="name" content="<?php echo TITLE; ?>" />
		<meta itemprop="description" content="<?php echo DESCRIPTION; ?>" />
		<meta itemprop="image" content="<?php echo TEMPLATE; ?>/img/facebook.jpg" />

		<meta property="og:type" content="website" />
		<meta property="og:locale" content="pt_BR" />
		<meta property="og:url" content="<?php echo URL; ?>" />
		<meta property="og:title" content="<?php echo TITLE; ?>" />
		<meta property="og:site_name" content="<?php echo TITLE; ?>" />
		<meta property="og:description" content="<?php echo DESCRIPTION; ?>" />
		<meta property="og:image" content="<?php echo TEMPLATE; ?>/img/facebook.jpg" />
		<meta property="og:image:type" content="image/jpeg" />
		<meta property="og:image:width" content="880" />
		<meta property="og:image:height" content="660" />

		<meta name="application-name" content="<?php echo TITLE; ?>" />
		<meta name="msapplication-TileColor" content="#2A82BE" />
		<meta name="msapplication-square150x150logo" content="<?php echo TEMPLATE; ?>/img/mstile.jpg" />

		<meta name="theme-color" content="#2A82BE" />

		<?php wp_head(); ?>

		<title><?php echo TITLE; ?></title>
	</head>

	<body>
		<header class="header header--main u-cf">
			<div class="container u-cf">
				<h1 class="title title--main">
					<a class="title--main__link" href="<?php echo URL; ?>" title="<?php echo NAME; ?>">
						<?php echo NAME; ?>
					</a>
				</h1>
			</div>
		</header>

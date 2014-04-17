<?php

/**
 * Define URL estáticas para WP_HOME e WP_SITEURL.
 */

$endPhpSelf = strrpos($_SERVER['PHP_SELF'],"/");
$self_PHP = substr($_SERVER['PHP_SELF'],0,$endPhpSelf);
$notEndPhpSelf = strrpos($self_PHP,"/");

if($notEndPhpSelf>1)
	$self_PHP = substr($self_PHP,0,$notEndPhpSelf);

$http_generic = 'http://'.$_SERVER['HTTP_HOST'].$self_PHP;
$http_generic = str_ireplace("/wp-admin", "", $http_generic);
$http_generic = str_ireplace("/wp-content/plugins", "", $http_generic);

define('WP_HOME',$http_generic);
define('WP_SITEURL',$http_generic);

/**
 * Define dados e URLs para utilização no Front ou Functions.
 */

$site_name = 'MalonePress';
$site_desc = 'Minimal framework for developement';

define('NAME',get_bloginfo('name'));
define('URL',get_bloginfo('url'));
define('TEMPLATE',get_bloginfo('template_directory'));
define('TITLE',wp_title( '|', false, 'right' ).' '.$site_name);
define('PATH',get_template_directory());

/**
 * Define tempo de save automático e seta revisões de posts.
 */

define('AUTOSAVE_INTERVAL', 300 );
define('WP_POST_REVISIONS', false );
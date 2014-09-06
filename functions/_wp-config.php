<?php

########## MOVER PARA WP-CONFIG.PHP E DELETAR ESSE ARQUIVO ##########

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
 * Visão do plugin Contact Form somente para admin.
 */

define( 'WPCF7_ADMIN_READ_CAPABILITY', 'manage_options' );
define( 'WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'manage_options' );
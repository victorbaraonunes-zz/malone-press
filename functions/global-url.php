<?php

/**
 * Important constants.
 */

define('NAME',get_bloginfo('name'));
define('DESCRIPTION',get_bloginfo('description'));
define('URL',get_bloginfo('url'));
define('TEMPLATE',get_bloginfo('template_directory').'/assets');
define('THEME',get_bloginfo('template_directory'));
define('PATH',get_template_directory());

/**
 * Autosave constants.
 */

define('AUTOSAVE_INTERVAL', 300 );
define('WP_POST_REVISIONS', false );
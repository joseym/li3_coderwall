<?php

use li3_coderwall\extensions\Coderwall;
use lithium\core\Libraries;

$library = Libraries::get('li3_coderwall');

/**
 * Set coderwall config to the user set in `Libraries::add()`
 * Only sets if username is defined.
 */
if(isset($library['username'])){
	Coderwall::config(array(
		'username' => $library['username']
	));
}

print_r(Coderwall::get());

?>
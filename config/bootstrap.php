<?php

use li3_coderwall\extensions\Coderwall;
use lithium\core\Libraries;

$library = Libraries::get('li3_coderwall');

Coderwall::config(array(
	'username' => $library['username']
));

print_r(Coderwall::get());

?>
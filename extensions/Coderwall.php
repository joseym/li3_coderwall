<?php

namespace li3_coderwall\extensions;

use lithium\util\String;
use lithium\util\Inflector;

class Coderwall extends \lithium\core\Adaptable {

	public static $name = 'Coderwall';

	protected static $_adapter;

	protected static $_username;

	/**
	 * Path where to look for tracking adapters.
	 *
	 * @var string
	 */
	protected static $_adapters = 'adapter.service';

	public static function config($config = null) {

		$defaults = array(
			'adapter'     => 'Coderwall',
			'username' => ''
		);

		$config += $defaults;

		static::$_username = $config['username'];

		if ($config && is_array($config)) {
			return parent::config(array('default' => $config));
		}

		return parent::config($config);

	}

	public static function get(){
		return static::adapter('default')->request();
	}

	public static function user($user = null){
		if($user !== null);
	}

}
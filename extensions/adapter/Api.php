<?php

namespace li3_coderwall\extensions\adapter;

use lithium\util\String;

class Api extends \lithium\core\Object {

	protected $_curl;

	protected $_uri = "http://coderwall.com/{:username}.json";

	protected $_username;

	protected $_classes = array(
		'entity' => 'lithium\data\entity\Document',
		'set' => 'lithium\data\collection\DocumentSet',
		'array' => 'lithium\data\collection\DocumentArray'
	);

	public function __construct(array $config = array()){
		$this->username($config['username']);
		$this->_curl = function_exists('curl_init');
	}

	public function request(){
		return ($this->_curl) ? $this->_curlRequest() : $this->_getContents();
		// return $this->_getContents();
	}

	public function username($username = null){
		if($username !== null) $this->_username = $username;
		return $this->_username;
	}

	private function _curlRequest(){

		// Curl Handler
		$handler = curl_init();

		// Set url
		curl_setopt($handler, CURLOPT_URL, $this->url());

		// Return results
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);

		// set timeout
		curl_setopt($handler, CURLOPT_TIMEOUT, 15);

		// assign results to a var
		$return = curl_exec($handler);

		// close that mother
		curl_close($handler);
		
		return json_decode($return);
	}

	private function _getContents(){
		return file_get_contents($this->url());
	}

	public function url(){
		return String::insert(
			$this->_uri,
			array('username' => $this->_username)
		);
	}

}
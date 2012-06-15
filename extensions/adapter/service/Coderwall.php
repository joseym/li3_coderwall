<?php

namespace li3_coderwall\extensions\adapter\service;

use li3_coderwall\extensions\adapter\Api;

class Coderwall extends \lithium\core\Object {

	protected $_username = "";

	protected $_request;

	protected $_autoConfig = array('username');

	public function __construct($config){
		$this->username($config['username']);
		$this->_request = new Api(array('username' => $this->username()));
		parent::__construct($config);
	}

	public function request(){
		return $this->_request->request();
	}

	public function username($username = null){
		if($username !== null) $this->_username = $username;
		return $this->_username;
	}

}
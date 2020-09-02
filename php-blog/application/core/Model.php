<?php

/**
 * Абстрактный класс Model
 */

namespace application\core;

use application\lib\Db;

abstract class Model {

	public $db;

	//подключение к бд
	public function __construct() {
		$this->db = new Db;
	}

}
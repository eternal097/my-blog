<?php

/**
 * Абстрактный класс Controller
 * Служит родительским классом других контроллеров
 */


namespace application\core;

use application\core\View;

abstract class Controller {

	public $route;
	public $view;
	public $acl;
	public $model;

	//Проверка доступа и подключение вида
	public function __construct($route) {
		$this->route = $route;
		if (!$this->checkAcl()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	//Подключение модели
	public function loadModel($name) {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	//Подключает файл с массивом доступа по названию контроллера и сравнивает с сессией
	public function checkAcl() {
		$this->acl = require 'application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) {
			return true;
		}
		elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
			return true;
		}
		elseif (!isset($_SESSION['authorize']['id']) and $this->isAcl('guest')) {
			return true;
		}
		elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
			return true;
		}
		return false;
	}

	//Проверяет есть ли доступ к экшкну у пользователя $key
	public function isAcl($key) {
		return in_array($this->route['action'], $this->acl[$key]);
	}

}
<?php

/**
 * Класс View
 * Компонент для работы с видами
 */

namespace application\core;

class View {

	public $path;
	public $route;
	public $layout = 'default';

	//Записывает в переменную $path путь к виду в соответствии с контроллером и экшеном
	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	//Подключает виды в соответсвии с переменной $path
	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}
	}

	//Редиректит на страницу
	public function redirect($url) {
		header('location: /'.$url);
		exit;
	}

	//Подключает страницу с видами 403 и 404
	public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	//Выводит сообщение по завершению скрипта аякс запроса
	public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	//Редирект для аякс запроса
	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

}	
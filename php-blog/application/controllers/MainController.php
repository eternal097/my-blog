<?php

/**
 * Класс MainController
 * Компонент для работы с гостевой частью сайта
 */

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller {

    //Вывод данных на главную страницу
	public function indexAction() {
		$pagination = new Pagination($this->route, $this->model->postsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
		];
		$this->view->render('Главная страница', $vars);
	}

	//Страница "Обо мне"
	public function aboutAction() {
		$this->view->render('Обо мне');
	}

	//Страница "Контакты"
	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			mail('titef@p33.org', 'Сообщение из блога', $_POST['name'].'|'.$_POST['email'].'|'.$_POST['text']);
			$this->view->message('success', 'Сообщение отправлено Администратору');
		}
		$this->view->render('Контакты');
	}

	//Выводит пост по id
	public function postAction() {
		$adminModel = new Admin;
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $adminModel->postData($this->route['id'])[0],
		];
		$this->view->render('Пост', $vars);
	}

}
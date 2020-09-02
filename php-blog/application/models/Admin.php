<?php

/**
 * Класс Admin
 * Компонент для работы с моделью Admin
 */

namespace application\models;

use application\core\Model;

class Admin extends Model {

	public $error;

	//Валидация логина и пароля при входе в панель администратора
	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	//Валидация постов
	public function postValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$descriptionLen = iconv_strlen($post['description']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 100) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		} elseif ($textLen < 10 or $textLen > 5000) {
			$this->error = 'Текст должнен содержать от 10 до 5000 символов';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	//Добавление поста в бд
	public function postAdd($post) {
		$params = [
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('INSERT INTO `posts` (`name`, `description`, `text`) VALUES (:name, :description, :text)', $params);
		return $this->db->lastInsertId();
	}

	//Редактирование поста из бд по id
	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('UPDATE `posts` SET name = :name, description = :description, text = :text WHERE id = :id', $params);
	}

	//Загрузка изображений
	public function postUploadImage($path, $id) {
        move_uploaded_file($path, 'public/materials/'.$id.'.jpg');
	}

	//Возвращает id строки из бд по запросу id
    //Нужно для проверки наличия id в бд
	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	//Удаление поста из бд
	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM posts WHERE id = :id', $params);
		unlink('public/materials/'.$id.'.jpg');
	}

	//Возвращает строку из бд с конкретным id
	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

}
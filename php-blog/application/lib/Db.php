<?php


/**
 * Класс Db
 * Компонент для работы с базой данных
 */


namespace application\lib;

use PDO;

class Db {

	protected $db;

    // Получаем параметры подключения из файла и устанавливаем соединение с бд
	public function __construct() {
		$config = require 'application/config/db.php';
		try {
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

	}
    //Подготавливает sql запрос и принимает передаваемые параметры
	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val, (is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR));
			}
		}
		$stmt->execute();
		return $stmt;
	}

	//Возвращает массив, содержащий все строки результирующего набора
	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	//Возвращает данные одного столбца следующей строки результирующего набора
	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	//Возвращает ID последней вставленной строки или значение последовательности
	public function lastInsertId() {
		return $this->db->lastInsertId();
	}

}
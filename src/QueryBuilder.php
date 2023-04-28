<?php

namespace App;

use PDO;

/**
 * Класс для запросов к БД
 */
class QueryBuilder extends DB
{
    /**
     * Метод подсчета количества строк (для пагинации).
     * @param string $table название таблицы
     * @return int количество строк
     */
    public function countRow($table)
	{
        $sql = "SELECT COUNT(*) FROM $table";
        $statement = $this->pdo->prepare($sql);
		$statement->execute(); //выполнить
		$result = $statement->fetchColumn();
		return $result;
	}

    /**
     * Получение всех пользователей.
     * @param int $limit количество записей на странице
     * @param int $offset сдвиг для получения данных на конкретной странице
     * @param string $offset способ сортировки
     * @return array данные выобрки
     */
    public function getAllUsers($limit, $offset, $order='asc') {
        $sql = "SELECT * FROM users  ORDER BY 1 $order LIMIT $limit OFFSET $offset";
        $statement = $this->pdo->prepare($sql);
		$statement->execute(); //выполнить
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
    }

    /**
     * Получение всех по дате.
     * @param string $datetime дата по которой фильтруем данные
     * @param string $flag оператор сравнения
     * @return array данные выобрки
     */
    public function getByBirth($datetime, $flag = '>=') {
        $sql = "SELECT * FROM users WHERE birth_date $flag '$datetime' ORDER BY 3";
        $statement = $this->pdo->prepare($sql);
		$statement->execute(); //выполнить
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
    }
}


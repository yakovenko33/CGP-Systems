<?php

namespace App\Models;


use TestFramework\Components\Database\DB;

class TaskModel
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * TaskModal constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance()->getConnecting();
    }

    /**
     * @param array $data
     * @return int|null
     */
    public function insert(array $data): ?int
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO
                tasks (full_name, email, text)
                VALUES (:full_name, :email, :text)");

            $stmt->bindParam(':full_name', $data["full_name"]);
            $stmt->bindParam(':email', $data["email"]);
            $stmt->bindParam(':text', $data["task"]);
            $stmt->execute();

            $result = $this->db->lastInsertId();
        } catch (\PDOException $e) {
            $result = null;
        }

        return $result;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTaskById(int $id): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $result = $stmt->fetch();
        } catch (\PDOException $e) {
            $result = [];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getTaskAll(): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tasks");

            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $result = [];
        }

        return $result;
    }

    private function debug($data): void
    {
        $file = "D:/ProgramFiles/OSPanel/domains/CGP-Systems/test.txt";
        file_put_contents($file, print_r($data, true));
    }
}
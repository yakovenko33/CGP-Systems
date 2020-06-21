<?php

namespace App\Models;


use TestFramework\Components\Database\Model;

class TaskModel extends Model
{
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
            $stmt = $this->db->prepare("SELECT * FROM tasks ORDER BY id DESC;");

            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $result = [];
        }

        return $result;
    }

    /**
     * @param array $data
     * @return array
     */
    public function adminEditTask(array $data): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE tasks
                SET text = :task, status = :status
                WHERE id = :id");

            $stmt->bindParam(':task', $data["task"]);
            $stmt->bindParam(':status', $data["status"]);
            $stmt->bindParam(':id', $data["id"]);

            $stmt->execute();
            $result = true;
        } catch (\PDOException $e) {
            $result = false;
        }

        return $result;
    }
}
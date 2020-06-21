<?php


namespace App\Models;


use TestFramework\Components\Database\Model;

class UserModel extends Model
{
    /**
     * @param string $email
     * @return array
     */
    public function getUserByEmail(string $email): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindValue(':email', $email);

            $stmt->execute();
            $result = $stmt->fetch();
        } catch (\PDOException $e) {
            $result = [];
        }

        return $result;
    }
}
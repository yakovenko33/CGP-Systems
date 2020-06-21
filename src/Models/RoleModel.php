<?php


namespace App\Models;


use TestFramework\Components\Database\Model;

class RoleModel extends Model
{
    /**
     * @param int $id
     * @return array
     */
    public function getRolesByUserId(int $id): array
    {
        try {
            $stmt = $this->db->prepare("SELECT r.name 
                FROM users_roles as u_r
                INNER JOIN roles as r
                ON u_r.id = r.id
                WHERE u_r.user_id = :id");
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            $result = [];
        }

        return $result;
    }
}
<?php


namespace App\Controllers;


class UserController
{
    public function adminSingIn()
    {
        require_once(ROOT . '/src/Views/admin/singIn.php');
    }

    public function getList()
    {
        require_once(ROOT . '/src/Views/admin/taskList.php');
    }

    public function admin()
    {
        echo json_encode(["work" => "Admin"], true);
    }
}
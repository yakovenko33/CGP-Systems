<?php

namespace App\Services\AdminSingIn;

use App\CommonModule\Service\ServiceRoot;
use App\Services\AdminSingIn\Validator;
use \App\Models\UserModel;
use \App\Models\RoleModel;
use \TestFramework\Components\HttpComponents\AuthComponent;

class AdminSingIn extends ServiceRoot
{
    /**
     * AdminSingIn constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(new Validator(), $data);
    }

    protected function handle()
    {
        $userData = (new UserModel())->getUserByEmail($this->data["email"]);

        if (empty($userData)) {
            $this->setUserNotExist();
            return false;
        }

        if (!\password_verify($this->data["password"], $userData["password"])) {
            $this->setUserNotExist();
            return false;
        } else {
            $this->singIn($userData);

            $this->result = [
                "status" => "success",
                "data" => ["url" => '/admin/editor'],
                "code" => 200,
            ];
        }
    }

    /**
     * @param array $userData
     */
    private function singIn(array $userData) {
        $roles = [];

        foreach ((new RoleModel())->getRolesByUserId(1) as $role){
            $roles[] = $role["name"];
        }

        (new AuthComponent())->auth($userData, $roles);
    }

    private function setUserNotExist()
    {
        $this->result = [
            "status" => "error",
            "errors" => ["user" => ["Пользователя не существует или не верен пароль"]],
            "code" => 403,
        ];
    }
}
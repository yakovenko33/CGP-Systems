<?php


namespace TestFramework\Components\HttpComponents;

session_start();

class AuthComponent
{
    /**
     * @param array $userData
     * @param array $roles
     */
    public function auth(array $userData, array $roles)
    {
        $_SESSION["is_auth"] = true;
        $_SESSION["user_data"] = $userData;
        $_SESSION["user_roles"] = $roles;
    }

    /**
     *
     */
    public function logOut(): void
    {
        $_SESSION = [];
        session_destroy();
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $_SESSION["user_roles"];
    }

    /**
     * @param array $roles
     * @return bool
     */
    public function hasRoles(array $roles): bool
    {
        foreach($roles as $role) {
            if (in_array($role, $_SESSION["user_roles"])) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $_SESSION["user_data"];
    }

    /**
     * @return bool
     */
    public function isAuth(): bool
    {
        if (empty($_SESSION["is_auth"])) {
            return false;
        }

        return $_SESSION["is_auth"];
    }
}
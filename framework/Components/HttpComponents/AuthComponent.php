<?php


namespace TestFramework\Components\HttpComponents;

session_start();

class AuthComponent
{
    /**
     * @param string $plainPassword
     * @param string $userData
     */
    public function auth(string $plainPassword, string $userData) //hashedPassword
    {
        //$_SESSION["is_auth"]
        if (\password_verify($plainPassword, $userData["password"])) {
            $_SESSION["is_auth"] = true;
        } else {

        }
    }

    /**
     *
     */
    public function logOut(): void
    {
        $_SESSION = [];
        session_destroy();
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getData(): array
    {
        return [];
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
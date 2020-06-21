<?php

namespace TestFramework\Components\HttpComponents;

class Request
{
    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $cookies;

    /**
     * @var array
     */
    private $files;

    /**
     * @var array
     */
    private $server;

    /**
     * @var
     */
    private $put;

    /**
     * Request constructor.
     * @param array $get
     * @param array $post
     * @param array $cookies
     * @param array $files
     * @param array $server
     */
    public function __construct(array $get = [], array $post = [], array $cookies = [], array $files = [], array $server = [])
    {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;

        $this->setPutParams();
    }

    private function setPutParams(): void
    {
        if ('PUT' === $_SERVER['REQUEST_METHOD']) {
            $this->put = json_decode(file_get_contents('php://input'),true);
        }
    }

    /**
     * @return bool
     */
    public function isAjax(): bool
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            &&  (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) ? true : false;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->post;
    }

    /**
     * @return array
     */
    public function getGet(): array
    {
        return $this->get;
    }
}
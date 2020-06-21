<?php


namespace TestFramework\Components\Database;


class Model
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance()->getConnecting();
    }
}
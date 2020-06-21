<?php

namespace App\CommonModule\Service;


use \App\CommonModule\Validator\ValidatorRootInterface;

abstract class ServiceRoot
{
    /**
     * @var array
     */
    protected $result;

    /**
     * @var array
     */
    protected $data;

    /**
     * ServiceRoot constructor.
     * @param ValidatorRootInterface $validator
     * @param $data
     */
    public function __construct(ValidatorRootInterface $validator, $data)
    {
        $this->data = $data;

        if(!$validator->validate($data)) {
            $this->result = [
                "errors" => $validator->getErrors(),
                "status" => "error",
                "code" => 422
            ];
        } else {
            $this->handle();
        }
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    abstract protected function handle();
}
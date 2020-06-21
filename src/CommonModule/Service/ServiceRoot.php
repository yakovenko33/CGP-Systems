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
     * ServiceRoot constructor.
     * @param ValidatorRootInterface $validator
     * @param $data
     */
    public function __construct(ValidatorRootInterface $validator, $data)
    {
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

    abstract protected function handle();
}
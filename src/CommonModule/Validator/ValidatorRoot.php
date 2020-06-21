<?php

namespace App\CommonModule\Validator;


use Valitron\Validator as ValidatorLib;

abstract class ValidatorRoot implements ValidatorRootInterface
{
    /**
     * @var ValidatorLib
     */
    protected $validator;

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        $this->validator = new ValidatorLib($data, [], 'ru');
        $this->setRules();

        return $this->validator->validate();
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->validator->errors();
    }

    abstract protected function setRules(): void;
}
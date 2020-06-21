<?php


namespace App\CommonModule\Validator;


interface ValidatorRootInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool;

    /**
     * @return array
     */
    public function getErrors(): array;
}
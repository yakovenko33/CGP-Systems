<?php


namespace App\Services\EditTask;


use App\CommonModule\Validator\ValidatorRoot;

class Validator extends ValidatorRoot
{
    protected function setRules(): void
    {
        $this->validator->rule('required', ["task"])
            ->message('Поле {field} обязательно')
            ->labels(['задача']);

        $this->validator->rule('lengthMax', 'task', 80)->message('Максимальная длина поля {field} 80')->label('задача');
    }
}
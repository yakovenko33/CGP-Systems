<?php


namespace App\Services\AddTask;


use App\CommonModule\Validator\ValidatorRoot;

class Validator extends ValidatorRoot
{
    /**
     *
     */
    protected function setRules(): void
    {
        $this->validator->rule('required', ['full_name', 'email', 'task'])
            ->message('Поле {field} обязательно')
            ->labels(['имя', 'email', 'задача']);

        $this->validator->rule('email', 'email')->message('Email не является валидным');

        $this->validator->rule('lengthMax', 'full_name', 100)->message('Максимальная длина поля {field} 100')->label('имя');
        $this->validator->rule('lengthMax', 'email', 80)->message('Максимальная длина поля {field} 80')->label('email');
        $this->validator->rule('lengthMax', 'task', 80)->message('Максимальная длина поля {field} 80')->label('задача');
    }
}
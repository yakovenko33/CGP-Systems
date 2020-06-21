<?php

namespace App\Services\AdminSingIn;


use App\CommonModule\Validator\ValidatorRoot;

class Validator extends ValidatorRoot
{
    protected function setRules(): void
    {
        $this->validator->rule('required', ['email', 'password'])
            ->message('Поле {field} обязательно')
            ->labels(['email', 'пароль']);

        $this->validator->rule('email', 'email')->message('Email не является валидным');

        $this->validator->rule('lengthMax', 'email', 80)->message('Максимальная длина поля {field} 80')->label('email');
        $this->validator->rule('lengthMax', 'пароль', 50)->message('Максимальная длина поля {field} 80')->label('задача');
    }
}
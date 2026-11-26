<?php
namespace App\Validators;

class UserValidator
{
    public function validate(array $input): array
    {
        $errors = [];

        $name = $input['name'] ?? '';

        if (trim($name) === '') {
            $errors['name'] = 'Informe seu nome.';
        } elseif (mb_strlen($name) > 100) {
            $errors['name'] = 'Nome muito grande.';
        }

        $email = $input['email'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Informe um e-mail válido.';
        } elseif (mb_strlen($email) > 150) {
            $errors['email'] = 'E-mail muito grande.';
        }

        $login = $input['login'] ?? '';

        if (!is_string($login) || !preg_match('/^[a-zA-Z0-9_.-]{4,50}$/', $login)) {
            $errors['login'] =
                'Use de 4 a 50 caracteres: letras, números, ponto, hífen ou underline.';
        }

        $password = $input['password'] ?? '';

        if (!is_string($password) || strlen($password) < 8) {
            $errors['password'] =
                'A senha deve ter pelo menos 8 caracteres.';
        }

        return $errors;
    }
}


// cod cadrastro onde fica a parte de validação do usuário, como nome, email, login e senha.
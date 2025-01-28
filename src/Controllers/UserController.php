<?php

namespace App\Controllers;

use App\DTOs\CreateUserRequest;
use App\UseCases\CreateUserUseCase;

class UserController
{
    private CreateUserUseCase $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    public function store($requestData)
    {
        extract($requestData);
        $request = new CreateUserRequest(
            $nombres,
            $email,
            $password,
            $phonenumber
        );

        try {
            $user = $this->createUserUseCase->execute($request);
            echo "Usuario creado: " . $user->getNombres() . " " . ($user->getEmail());
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

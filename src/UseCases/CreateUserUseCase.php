<?php

namespace App\UseCases;

use App\DTOs\CreateUserRequest;
use App\Entities\User;
use App\Interfaces\IUserRepository;

class CreateUserUseCase
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserRequest $request)
    {
        if (!filter_var($request->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("El correo electrónico no es válido.");
        }

        $user = new User(
            $request->getName(),
            $request->getEmail(),
            $request->getPassword(),
            $request->getPhoneNumber()
        );

        $this->userRepository->store($user);

        return $user;
    }
}

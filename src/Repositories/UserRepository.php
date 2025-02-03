<?php

namespace App\Repositories;

use App\Entities\User;
use App\Exceptions\UserDoesNotExistException;
use App\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    private $users = array();
    public function store(User $user)
    {
        $this->users[$user->getEmail()] = $user;
    }

    public function update(User $user)
    {
        $this->users[$user->getEmail()] = $user;
    }

    public function delete($email)
    {
        unset($this->users[$email]);
    }

    public function getByEmailOrFail($email)
    {
        $user = $this->findByEmail($email);

        if (!$user) {
            throw new UserDoesNotExistException("No se encontró usuario con {$email}.");
        }

        return $user;
    }

    public function findByEmail( $email)
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }

        return null;
    }
}

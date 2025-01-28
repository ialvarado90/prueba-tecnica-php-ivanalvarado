<?php

namespace App\Interfaces;

use App\Entities\User;

interface IUserRepository
{
    public function store(User $user);
    public function update(User $user);
    public function delete($email);
    public function getByEmailOrFail($email);
    public function findByEmail($email);
}

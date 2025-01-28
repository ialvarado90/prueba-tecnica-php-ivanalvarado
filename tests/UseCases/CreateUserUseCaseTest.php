<?php

use App\DTOs\CreateUserRequest;
use App\Entities\User;
use App\Exceptions\UserDoesNotExistException;
use App\Respositories\UserRepository;
use App\UseCases\CreateUserUseCase;
use PHPUnit\Framework\TestCase;

class CreateUserUseCaseTest extends TestCase
{
    public function testExecuteCreatesUserSuccessfully(): void
    {
        $repository = new UserRepository();
        $useCase = new CreateUserUseCase($repository);

        $request = new CreateUserRequest('Ivan Alvarado', 'ivan.alvarado@mail.com', 'abc123def', '+51999999999');
        $user = $useCase->execute($request);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Ivan Alvarado', $user->getNombres());
        $this->assertEquals('ivan.alvarado@mail.com', $user->getEmail());
        $this->assertEquals('+51999999999', $user->getPhoneNumber());
    }

    public function whenUserIsNotFoundByIdErrorIsThrown()
    {
        $repository = new UserRepository();
        $this->expectException(UserDoesNotExistException::class);
        $repository->getByEmailOrFail("ivan@mail.com");
    }
}

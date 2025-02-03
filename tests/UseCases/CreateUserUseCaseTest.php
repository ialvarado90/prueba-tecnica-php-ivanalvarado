<?php

use App\DTOs\CreateUserRequest;
use App\Entities\User;
use App\Exceptions\UserDoesNotExistException;
use App\Repositories\UserRepository;
use App\UseCases\CreateUserUseCase;
use PHPUnit\Framework\TestCase;

class CreateUserUseCaseTest extends TestCase
{

    public function testWhenUserIsNotFoundByIdErrorIsThrown()
    {
        $repository = new UserRepository();
        $email_test = "ivan@mail.com";
        $this->expectException(UserDoesNotExistException::class);
        $this->expectExceptionMessage("No se encontró usuario con {$email_test}.");
        $user = $repository->getByEmailOrFail($email_test);
        $this->assertEquals('ivan.alvarado@mail.com', $user->getEmail());
    }

    public function testExecuteCreatesUserSuccessfully()
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
}

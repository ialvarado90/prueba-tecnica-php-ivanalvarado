<?php

namespace App\Exceptions;

use Exception;

class UserDoesNotExistException extends Exception
{
    public function __construct($message = "Usuario no Existe", $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

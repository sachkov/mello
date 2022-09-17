<?php
namespace App\Exceptions;


class AuthenticationException extends \Exception
{
    protected $statusCode = 401;

    protected $message = 'Authentication exception';
}

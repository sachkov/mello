<?php
namespace App\Exceptions;


class AuthenticationException extends \Exception
{
    protected $code = 401;

    protected $message = 'Authentication exception';
}

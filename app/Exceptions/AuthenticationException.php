<?php
namespace App\Exceptions;


class AuthenticationException extends AppBaseException
{
    protected $code = 401;

    protected $message = 'Authentication exception';
}

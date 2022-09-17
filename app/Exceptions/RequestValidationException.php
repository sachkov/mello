<?php
namespace App\Exceptions;


class RequestValidationException extends \Exception
{
    protected $code = 401;

    protected $message = 'Request validation exception';
}

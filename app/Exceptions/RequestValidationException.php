<?php
namespace App\Exceptions;


class RequestValidationException extends AppBaseException
{
    protected $code = 400;

    protected $message = 'Request validation exception';
}

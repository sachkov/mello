<?php
namespace App\Exceptions;


class AppBaseException extends \Exception
{
    protected $code = 500;

    protected $message = 'Application internal exception';
}

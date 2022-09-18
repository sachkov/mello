<?php
namespace App\Exceptions;


class PermissionException extends AppBaseException
{
    protected $code = 401;

    protected $message = 'Permission Denied.';
}

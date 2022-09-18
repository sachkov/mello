<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (AppBaseException $e, $request) {
            $payload = [
                'result'    => 'error',
                'code'      => $e->getCode() ?: 400,
                'message'   => json_decode($e->getMessage()) ?? $e->getMessage(),
                'exception' => get_class($e)
            ];
            $code = 400;
            if($payload['code'] > 100 && $payload['code'] < 600) $code = $payload['code'];
            return response()->json($payload, $code);
        });
    }
}

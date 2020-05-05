<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($request->is('api/*')) {
            if($exception instanceof ValidationException) {
                return response()->json(
                    $exception->errors()
                ,$exception->status);
            }
        }

        if ($exception instanceof UnauthorizedHttpException){
            return $exception;
            if(get_parent_class($exception) instanceof TokenExpiredException){
                return JR::JWTTokenExpired();
            }elseif (get_parent_class($exception) instanceof TokenBlacklistedException){
                return JR::JWTTokenBlacklisted();
            }else{
                return JR::JWTTokenInvalid();
            }
        }
        return parent::render($request, $exception);
    }
}

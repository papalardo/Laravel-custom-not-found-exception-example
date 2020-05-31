<?php

namespace App\Exceptions;

use Throwable;
use App\Custom\ModelNotFound\CustomModelNotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Custom\CustomModelNotFoundResponse\Traits\CustomModelNotFoundResponse;


class Handler extends ExceptionHandler
{
    use CustomModelNotFoundResponse;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Foi necessário para usar as views de erros publicadas do pakage laravel com `php artisan vendor:publish --tag=laravel-errors`
        $this->registerErrorViewPaths();
        
        if($exception instanceof ModelNotFoundException && $response = $this->handleModelNotFoundException($request, $exception)) {
            return $response;
        }

        return parent::render($request, $exception);
    }
}

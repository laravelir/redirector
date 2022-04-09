<?php

namespace Laravelir\Redirector\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HttpNotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        //
        return false;
    }

    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException) {
            dd("dd");
        }

    }
}


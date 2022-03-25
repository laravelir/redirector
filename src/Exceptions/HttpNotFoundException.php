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

// if ($this->isHttpException($exception)) {
//     switch ($exception->getStatusCode()) {
//             // not found
//         case 404:
//             return redirect()->route('notfound');
//             break;

//             // internal error
//         case '500':
//             return redirect()->route('notfound');
//             break;

//         default:
//             return $this->renderHttpException($e);
//             break;
//     }
// } else {
//     return parent::render($request, $exception);
// }

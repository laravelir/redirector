<?php

use Symfony\Component\HttpFoundation\Response;

final class HttpStatusCode
{
    const S301 = Response::HTTP_MOVED_PERMANENTLY;
    const S302 = Response::HTTP_FOUND;
}

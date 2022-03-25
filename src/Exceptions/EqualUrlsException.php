<?php

namespace Laravelir\Redirector\Exceptions;

use Exception;

class EqualUrlsException extends Exception
{
    /**
     * throws when source_url exact equal to destination_url.
     *
     * @return static
     */
    public static function equalUrls(): self
    {
        return new static("The source_url does not equal to destination_url!!!");
    }
}

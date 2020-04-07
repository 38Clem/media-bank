<?php


namespace App\Service\Exception;

use Exception;
use Throwable;

class EmailExistsException extends Exception
{

    public function __construct($message = "", $code = 1, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
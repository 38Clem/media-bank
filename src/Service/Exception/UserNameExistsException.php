<?php


namespace App\Service\Exception;

use Exception;
use Throwable;

class UserNameExistsException extends Exception
{
    public function __construct($message = "", $code = 2, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class RoleDeniedException extends Exception
{
    /**
     * @param string $role
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $role = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf("You don't have a required ['%s'] role.", $role);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }
}

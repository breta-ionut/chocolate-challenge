<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidBoxSizeException extends InvalidArgumentException
{
    /**
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('A chocolate box must contain at least one chocolate.', $code, $previous);
    }
}

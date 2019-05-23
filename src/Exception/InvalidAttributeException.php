<?php

declare(strict_types=1);

namespace Frogg\Exception;

class InvalidAttributeException extends \RuntimeException
{
    /**
     * InvalidAttributeException constructor.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct('Attribute \'' . $message . '\' does not exist on the current object');
    }
}

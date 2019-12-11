<?php
namespace MyApp\Exception;

use Throwable;

use KnotLib\Exception\KnotPhpException;

class MyAppException extends KnotPhpException implements MyAppExceptionInterface
{
    /**
     * MyAppException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|NULL $prev
     */
    public function __construct( string $message, int $code = 0, Throwable $prev = NULL )
    {
        parent::__construct($message, $code, $prev );
    }
}
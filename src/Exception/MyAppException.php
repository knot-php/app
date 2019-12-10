<?php
namespace MyApp\Exception;

use Throwable;

use CalgamoLib\Exception\CalgamoException;
use CalgamoLib\Exception\Runtime\RuntimeExceptionInterface;

class MyAppException extends CalgamoException implements MyAppExceptionInterface, RuntimeExceptionInterface
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
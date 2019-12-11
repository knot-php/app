<?php
namespace MyApp\Exception;

use KnotLib\Exception\KnotPhpExceptionInterface;
use KnotLib\Exception\Runtime\RuntimeExceptionInterface;

interface MyAppExceptionInterface extends KnotPhpExceptionInterface, RuntimeExceptionInterface
{
}


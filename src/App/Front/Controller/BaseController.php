<?php
namespace MyApp\App\Front\Controller;

use KnotLib\Service\LoggerService;

class BaseController
{
    /** @var LoggerService */
    private $logger;

    /**
     * BaseController constructor.
     *
     * @param LoggerService $logger
     */
    public function __construct(LoggerService $logger)
    {
        $this->logger = $logger;
    }
}
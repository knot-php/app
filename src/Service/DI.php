<?php
declare(strict_types=1);

namespace MyApp\Service;

use KnotLib\Service\DI as ServiceDI;
use KnotLib\HttpService\DI as HttpServiceDI;
use KnotLib\DataStoreService\DI as DataStoreDI;

final class DI
{
    //==================================
    // Components
    //==================================

    //==================================
    // Services
    //==================================
    const URI_SERVICE_LOGGER                = ServiceDI::URI_SERVICE_LOGGER;
    const URI_SERVICE_FILESYSTEM            = ServiceDI::URI_SERVICE_FILESYSTEM;
    const URI_SERVICE_VALIDATION            = ServiceDI::URI_SERVICE_VALIDATION;

    const URI_SERVICE_SESSION               = HttpServiceDI::URI_SERVICE_SESSION;
    const URI_SERVICE_COOKIE                = HttpServiceDI::URI_SERVICE_COOKIE;

    const URI_SERVICE_REPOSITORY            = DataStoreDI::URI_SERVICE_REPOSITORY;
    const URI_SERVICE_TRANSACTION           = DataStoreDI::URI_SERVICE_TRANSACTION;
    const URI_SERVICE_CONNECTION            = DataStoreDI::URI_SERVICE_CONNECTION;
}
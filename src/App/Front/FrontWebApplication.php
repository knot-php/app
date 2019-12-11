<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front;

use Throwable;

use KnotLib\Kernel\Kernel\ApplicationType;
use KnotLib\Module\Application\SimpleApplication;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Logger\LoggerUtil;

use KnotPhp\Module\AuraSession\AuraSessionModule;
use KnotPhp\Framework\KnotFrameworkPackage;
use KnotPhp\Module\GuzzleHttp\Package\GuzzleHttpPackage;


use MyApp\App\Front\Module\FrontRouterModule;
use MyApp\App\Front\Module\FrontDiModule;

class FrontWebApplication extends SimpleApplication
{
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::WEB_APP);
    }

    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        $this->requirePackage(KnotFrameworkPackage::class);
        $this->requirePackage(GuzzleHttpPackage::class);
        $this->requireModule(FrontRouterModule::class);
        $this->requireModule(FrontDiModule::class);
        $this->requireModule(AuraSessionModule::class);
        return $this;
    }

    /**
     * Handle exception
     *
     * @param Throwable $e
     */
    public function handleException(Throwable $e)
    {
        LoggerUtil::logException($e, $this->logger());
    }
}
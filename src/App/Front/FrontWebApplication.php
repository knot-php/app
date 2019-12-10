<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front;

use Throwable;

use Calgamo\Kernel\Kernel\ApplicationType;
use Calgamo\Module\AuraSession\AuraSessionModule;
use Calgamo\Module\Application\SimpleApplication;
use Calgamo\Kernel\Kernel\ApplicationInterface;
use Calgamo\Kernel\Logger\LoggerUtil;
use Calgamo\Framework\CalgamoFrameworkPackage;
use Calgamo\Module\GuzzleHttp\Package\GuzzleHttpPackage;
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
        $this->requirePackage(CalgamoFrameworkPackage::class);
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
     *
     * @return bool
     */
    public function handleException(Throwable $e) : bool
    {
        LoggerUtil::logException($e, $this->logger());

        return true;
    }
}
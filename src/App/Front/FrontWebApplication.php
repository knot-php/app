<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front;

use KnotLib\Router\DispatcherInterface;
use MyApp\App\Front\Dispatcher\FrontDispatcher;
use Throwable;

use KnotLib\Kernel\Kernel\ApplicationType;
use KnotPhp\Framework\Application\KnotHttpApplication;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Logger\LoggerUtil;

use KnotPhp\Module\AuraSession\AuraSessionModule;
use KnotPhp\Framework\Package\KnotFrameworkDefaultPackage;
use KnotPhp\Module\GuzzleHttp\Package\GuzzleHttpPackage;
use KnotPhp\Module\KnotRouter\ArrayConfigKnotRouterModule;

use MyApp\App\Front\Module\FrontDiModule;

class FrontWebApplication extends KnotHttpApplication
{
    /**
     * {@inheritDoc}
     */
    public function getDispatcher(): DispatcherInterface
    {
        return new FrontDispatcher($this);
    }

    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        $this->requirePackage(KnotFrameworkDefaultPackage::class);
        $this->requirePackage(GuzzleHttpPackage::class);
        $this->requireModule(ArrayConfigKnotRouterModule::class);
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
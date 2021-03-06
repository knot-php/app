<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front;

use Throwable;

use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Logger\LoggerUtil;
use KnotLib\Router\DispatcherInterface;
use KnotPhp\Framework\Application\KnotHttpApplication;
use KnotPhp\Module\KnotExceptionHandler\Html\HtmlExceptionHandlerModule;

use MyApp\App\Front\Module\FrontDiModule;
use MyApp\App\Front\Dispatcher\FrontDispatcher;

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
        parent::configure();

        $this->requireModule(HtmlExceptionHandlerModule::class);
        $this->requireModule(FrontDiModule::class);

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
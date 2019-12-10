<?php
namespace MyApp\App\Front\Module;

use Calgamo\Kernel\FileSystem\Dir;
use Calgamo\Kernel\FileSystem\FileSystemInterface;
use Calgamo\Kernel\Pipeline\MiddlewareInterface;
use Calgamo\Module\CalgamoRouter\CalgamoRouterModule;
use Calgamo\Kernel\Kernel\ApplicationInterface;
use Calgamo\Kernel\Module\ModuleInterface;
use Calgamo\Http\Middleware\WebServerRoutingMiddleware;
use Calgamo\Module\CalgamoService\CalgamoServiceModule;
use Calgamo\Service\DI;
use MyApp\App\Front\Dispatcher\FrontDispatcher;

class FrontRouterModule extends CalgamoRouterModule implements ModuleInterface
{
    /** @var FileSystemInterface */
    private $fs;

    /**
     * {@inheritDoc}
     */
    public static function requiredModules(): array
    {
        return [
            CalgamoServiceModule::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getDispatcher(ApplicationInterface $app)
    {
        $di = $app->di();

        $logger = $di[DI::SERVICE_LOGGER];

        $this->fs = $app->filesystem();

        return new FrontDispatcher($logger, $di);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutingRule(): array
    {
        $config_file = $this->fs->getFile(Dir::CONFIG, 'route.config.php');
        /** @noinspection PhpIncludeInspection */
        return require($config_file);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutingMiddleware(ApplicationInterface $app): MiddlewareInterface
    {
        return new WebServerRoutingMiddleware($app);
    }
}
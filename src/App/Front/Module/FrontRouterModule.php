<?php
namespace MyApp\App\Front\Module;

use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\FileSystem\FileSystemInterface;
use KnotLib\Kernel\Pipeline\MiddlewareInterface;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleInterface;
use KnotLib\Http\Middleware\WebServerRoutingMiddleware;
use KnotLib\Service\DI;

use KnotPhp\Module\KnotRouter\KnotRouterModule;
use KnotPhp\Module\KnotService\KnotServiceModule;

use MyApp\App\Front\Dispatcher\FrontDispatcher;

class FrontRouterModule extends KnotRouterModule implements ModuleInterface
{
    /** @var FileSystemInterface */
    private $fs;

    /**
     * {@inheritDoc}
     */
    public static function requiredModules(): array
    {
        return [
            KnotServiceModule::class,
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
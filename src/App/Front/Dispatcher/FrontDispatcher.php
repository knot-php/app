<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front\Dispatcher;

use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Router\DispatcherInterface;
use KnotLib\Router\Router;
use KnotLib\Service\LoggerService;
use KnotLib\Service\Util\DiServiceTrait;

use MyApp\Service\DI;
use MyApp\App\Front\Controller\HomeController;
use MyApp\App\Front\View\HomeView;
use MyApp\App\Front\Controller\ErrorController;
use MyApp\App\Front\View\ErrorView;
use MyApp\Exception\RouteNotFoundException;

class FrontDispatcher implements DispatcherInterface
{
    use DiServiceTrait;

    /** @var ApplicationInterface */
    private $app;

    /** @var LoggerService */
    private $logger;

    public function __construct(ApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Get logger
     *
     * @return LoggerService
     *
     * @throws
     */
    public function getLoggerService() : LoggerService
    {
        if (!$this->logger){
            $this->logger = $this->app->di()->get(DI::URI_SERVICE_LOGGER);
        }
        return $this->logger;
    }

    /**
     * Dispatch event
     *
     * @param string $path
     * @param array $vars
     * @param string $route_name
     *
     * @return bool
     *
     * @throws
     */
    public function dispatch(string $path, array $vars, string $route_name)
    {
        $logger = $this->getLoggerService();

        $logger->debug('dispatched: ' . $route_name);

        $di = $this->app->di();

        $filesystem  = $di[DI::URI_SERVICE_FILESYSTEM];

        switch($route_name){
            case Router::ROUTE_NOT_FOUND:
                $vars = (new ErrorController($logger))->status404($vars);
                (new ErrorView($filesystem, $logger, 'error', 'error/status404'))
                    ->status404($vars);
                break;
            case 'internal_server_error':
                $vars = (new ErrorController($logger))->status500($vars);
                (new ErrorView($filesystem, $logger, 'error', 'error/status500'))
                    ->status500($vars);
                break;

            // Home
            case 'home':
                $vars = (new HomeController($logger))
                    ->index();
                (new HomeView($filesystem, $logger))
                    ->index($vars);
                break;

            default:
                throw new RouteNotFoundException($route_name);
        }
        return true;
    }
}
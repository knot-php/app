<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front\Dispatcher;

use KnotLib\Kernel\Di\DiContainerInterface;
use KnotLib\Router\DispatcherInterface;
use KnotLib\Router\Router;
use KnotLib\Service\DI;
use KnotLib\Service\LoggerService;

use MyApp\App\Front\Controller\HomeController;
use MyApp\App\Front\View\HomeView;
use MyApp\App\Front\Controller\ErrorController;
use MyApp\App\Front\View\ErrorView;
use MyApp\Exception\RouteNotFoundException;

class FrontDispatcher implements DispatcherInterface
{
    /** @var LoggerService */
    private $logger;

    /** @var DiContainerInterface */
    private $container;

    public function __construct(LoggerService $logger, DiContainerInterface $container)
    {
        $this->logger = $logger;
        $this->container = $container;
    }

    /**
     * Get logger
     *
     * @return LoggerService
     */
    public function getLogger() : LoggerService
    {
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
        $this->logger->debug('dispatched: ' . $route_name);

        $vars['path'] = $path;
        $vars['route_name'] = $path;

        $logger  = $this->container[DI::SERVICE_LOGGER];
        $fs  = $this->container[DI::SERVICE_FILESYSTEM];

        switch($route_name){
            case Router::ROUTE_NOT_FOUND:
                $vars = (new ErrorController($logger))->status404($vars);
                (new ErrorView($fs, $logger, 'error', 'error/status404'))
                    ->status404($vars);
                break;
            case 'internal_server_error':
                $vars = (new ErrorController($logger))->status500($vars);
                (new ErrorView($fs, $logger, 'error', 'error/status500'))
                    ->status500($vars);
                break;

            // Home
            case 'home':
                $vars = (new HomeController($logger))
                    ->index();
                (new HomeView($fs, $logger))
                    ->index($vars);
                break;

            default:
                throw new RouteNotFoundException($route_name);
        }
        return true;
    }
}
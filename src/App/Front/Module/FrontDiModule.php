<?php
namespace MyApp\App\Front\Module;

use KnotLib\Service\LoggerService;
use Throwable;

use KnotLib\Service\Util\DiServiceTrait;
use KnotLib\Kernel\Module\ComponentTypes;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleInterface;
use KnotLib\Kernel\Exception\ModuleInstallationException;

use MyApp\Service\DI;
use MyApp\Constants\LogChannels;

class FrontDiModule implements ModuleInterface
{
    use DiServiceTrait;

    /**
     * Declare dependency on another modules
     *
     * @return array
     */
    public static function requiredModules() : array
    {
        return [];
    }
    
    /**
     * Declare dependent on components
     *
     * @return array
     */
    public static function requiredComponentTypes() : array
    {
        return [
            ComponentTypes::SESSION,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function declareComponentType(): string
    {
        return ComponentTypes::APPLICATION;
    }

    /**
     * Install module
     *
     * @param ApplicationInterface $app
     *
     * @throws  ModuleInstallationException
     */
    public function install(ApplicationInterface $app)
    {
        try{
            $di = $app->di();
            
            //$fs = $app->fileSystem();
            //$session = $app->session();
            //$logger = $app->logger();

            // services.logger factory
            $di->extend(DI::URI_SERVICE_LOGGER, function($component){
                /** @var LoggerService $component */
                $component->setChannelId(LogChannels::FRONT);
                return $component;
            });
        }
        catch(Throwable $e)
        {
            throw new ModuleInstallationException('Failed to install di module', $e);
        }
    }
}
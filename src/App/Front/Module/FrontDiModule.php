<?php
namespace MyApp\App\Front\Module;

use Throwable;

use KnotLib\Service\Util\DiServiceTrait;
use KnotLib\Kernel\Module\ComponentTypes;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleInterface;
use KnotLib\Kernel\Exception\ModuleInstallationException;

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
        return ComponentTypes::DI;
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
            //$c = $app->di();
            
            //$fs = $app->fileSystem();
            //$session = $app->session();
            //$logger = $app->logger();

        }
        catch(Throwable $e)
        {
            throw new ModuleInstallationException('Failed to install di module', $e);
        }
    }
}
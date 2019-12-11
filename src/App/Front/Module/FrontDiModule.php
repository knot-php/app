<?php
namespace MyApp\App\Front\Module;

use Throwable;

use KnotLib\Service\DiServiceTrait;
use KnotLib\Kernel\Module\Components;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleInterface;
use KnotLib\Kernel\Module\AbstractModule;
use KnotLib\Kernel\Exception\ModuleInstallationException;

class FrontDiModule extends AbstractModule implements ModuleInterface
{
    use DiServiceTrait;

    /**
     * Declare dependent on components
     *
     * @return array
     */
    public static function requiredComponents() : array
    {
        return [
            Components::SESSION,
            Components::ENV,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function declareComponentType(): string
    {
        return Components::DI;
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
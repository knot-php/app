<?php
namespace MyApp\App\Front\View;

use KnotLib\Service\FileSystemService;
use KnotLib\Service\LoggerService;

class HomeView extends BaseView
{
    /**
     * HomeView constructor.
     *
     * @param FileSystemService $filesystem_s
     * @param LoggerService $logger
     */
    public function __construct(FileSystemService $filesystem_s, LoggerService $logger)
    {
        parent::__construct($filesystem_s, $logger, 'default', 'home/index');
    }

    /**
     * @return array
     */
    public function getCustomPageInfo() : array
    {
        return [
            'css' => [
            ],
            'javascript' => [
            ],
        ];
    }

    /**
     * @return array
     */
    public function getRequiredPackages() : array
    {
        return [
        ];
    }

    /**
     * index
     *
     * @param array $data
     *
     * @throws
     */
    public function index(array $data)
    {
        $this->render($data);
    }

}
<?php /** @noinspection PhpIncludeInspection */

namespace MyApp\App\Front\View;

use Stk2k\File\File;
use Calgamo\Kernel\FileSystem\Dir;
use Calgamo\Service\FileSystemService;
use Calgamo\Service\LoggerService;
use MyApp\View\ViewHelper;

abstract class BaseView
{
    /** @var LoggerService */
    private $logger;

    /** @var  string */
    private $layout_file;

    /** @var  array */
    private $page_info;

    /**
     * BaseView constructor.
     *
     * @param FileSystemService $filesystem_s
     * @param LoggerService $logger
     * @param string $layout
     * @param string $page
     */
    public function __construct(FileSystemService $filesystem_s, LoggerService $logger, string $layout, string $page)
    {
        $this->logger = $logger;

        $js_files = [];
        $css_files = [];

        $template_dir = $filesystem_s->getDirectory(Dir::TEMPLATE);
        $logger->debug('template_dir: ' . $template_dir);

        $layout_file = "layouts/{$layout}.layout.php";
        $page_file = "pages/{$page}.page.php";

        $this->layout_file = new File( $layout_file, $template_dir );
        $page_file = new File($page_file, $template_dir);

        $logger->debug('layout_file: ' . $this->layout_file);
        $logger->debug('page_file: ' . $page_file);

        $cache_dir = $filesystem_s->getDirectory(Dir::CACHE);
        $logger->debug('cache_dir: ' . $cache_dir);

        $include_dir = $filesystem_s->getDirectory(Dir::INCLUDE);
        $site_config = require_once($include_dir . '/config.inc.php');

        $this->page_info = [
            'site_name' => $site_config['site']['site_name'],
            'page_file' => $page_file->getPath(),
            'helper' => new ViewHelper($template_dir, $cache_dir),
            'css' => $css_files,
            'javascript' => $js_files,
            'site_config' => $site_config,
        ];

        $this->page_info = array_merge_recursive($this->page_info, $this->getCustomPageInfo());
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
     * @return array
     */
    public abstract function getCustomPageInfo() : array;

    /**
     * @return array
     */
    public function getRequiredPackages() : array
    {
        return [];
    }

    /**
     * @param array $data
     */
    public function render(array $data)
    {
        $page_info = array_merge_recursive($this->page_info, $data);

        extract($page_info);

        require_once $this->layout_file;

        $this->logger->debug('view rendered: ' . get_class($this));
    }

    
}
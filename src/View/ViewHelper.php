<?php
namespace MyApp\View;

use Stk2k\File\File;

class ViewHelper
{
    /** @var string */
    private $template_dir;

    /** @var  string */
    private $cache_dir;

    /**
     * ViewHelper constructor.
     *
     * @param string $template_dir
     * @param string $cache_dir
     */
    public function __construct(string $template_dir, string $cache_dir)
    {
        $this->template_dir = $template_dir;
        $this->cache_dir = $cache_dir;
    }

    /**
     * Get parts path
     *
     * @param string $parts_id
     *
     * @return string
     */
    public function parts(string $parts_id) : string
    {
        $parts_file = new File( "parts/$parts_id.parts.php", $this->template_dir );
        
        if (!$parts_file->exists()){
            die('Template not found: ' . "parts/$parts_id.parts.php");
        }

        /** @noinspection PhpIncludeInspection */
        return $parts_file->getPath();
    }
}
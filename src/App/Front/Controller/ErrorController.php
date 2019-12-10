<?php
namespace MyApp\App\Front\Controller;

class ErrorController extends BaseController
{
    /**
     * 404: Not Found
     *
     * @param array $vars
     *
     * @return array
     */
    public function status404(array $vars)
    {
        return $vars;
    }
    /**
     * 500: Internal server error
     *
     * @param array $vars
     *
     * @return array
     */
    public function status500(array $vars)
    {
        return $vars;
    }
    /**
     * Show error
     *
     * @param array $vars
     *
     * @return array;
     *
     * @throws
     */
    public function showError(array $vars) : array
    {
        $error_code = $vars['error_code'] ?? 0;

        return [
            'message' => $error_message_map[$error_code] ?? 'Unknown error',
        ];
    }
}
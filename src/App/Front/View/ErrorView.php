<?php
namespace MyApp\App\Front\View;

class ErrorView extends BaseView
{
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
     * 404: Not Found
     *
     * @param array $data
     *
     * @throws
     */
    public function status404(array $data)
    {
        $this->render($data);
    }
    /**
     * 500: Internal server error
     *
     * @param array $data
     *
     * @throws
     */
    public function status500(array $data)
    {
        $this->render($data);
    }
    /**
     * show error
     *
     * @param array $data
     *
     * @throws
     */
    public function showError(array $data)
    {
        $this->render($data);
    }
}
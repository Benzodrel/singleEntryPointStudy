<?php

namespace Benzo\SingleEntryPoint\Product\Controller;

use Benzo\SingleEntryPoint\Application\Request;

class BaseController

{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function render(string $template, array $data = [])
    {
        // буферизация повторить важная штука для понимания
        ob_start();
        extract($data, EXTR_SKIP);
        include($template);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function renderError(string $message)
    {
        // буферизация повторить важная штука для понимания
        ob_start();
        include(__DIR__ . '/../View/error.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
        exit();
    }

}
<?php

namespace Benzo\SingleEntryPoint\Application\Presenter;
class HtmlPresenter implements BasePresenter
{
    private string $view;
    private array $data;

    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render(): string
    {
        ob_start();
        extract($this->data, EXTR_SKIP);
        include($this->view);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
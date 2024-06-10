<?php

namespace Benzo\SingleEntryPoint\Application\Presenter;
class JsonPresenter implements BasePresenter
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return json_encode($this->data);
    }
}
<?php

namespace Benzo\SingleEntryPoint\Application;
class Request
{
    private bool $isApiRequest = false;

    public function __construct(private string $method, private array $data, private array $headers = [])
    {

    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function get(string $paramName, $default = null)
    {
        if (array_key_exists($paramName, $this->data)) {
            return $this->data[$paramName];
        }

        return $default;
    }

    public function getUri(): string
    {
        return preg_replace('#\?.*#', '', $_SERVER['REQUEST_URI']);
    }

    public function isApiRequest(): bool
    {
        if ($this->headers['Accept'] === "application/json") {
            $this->isApiRequest = true;
        }
        return $this->isApiRequest;
    }


}
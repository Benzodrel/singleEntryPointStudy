<?php

namespace Benzo\SingleEntryPoint\Application;
class Logger
{
    const FILE = __DIR__ . '/../tmp/logs.txt';
    private static Logger $instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    public
    function error(string $message): void
    {
        $message = date('Y-m-d H:i:s') . ' [ERROR] ' . $message;

        file_put_contents(self::FILE, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public
    function info(string $message): void
    {
        $message = date('Y-m-d H:i:s') . ' [INFO] ' . $message;

        file_put_contents(self::FILE, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}
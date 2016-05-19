<?php

namespace Tetris\MonoStash;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonoStash extends Logger
{
    public function __construct(string $appName)
    {
        $monostash = new Handler();

        $monostash->setFormatter(new Formatter("{$appName}@" . gethostname()));
        $handlers[] = $monostash;

        if (PHP_SAPI === 'cli') {
            $handlers[] = new StreamHandler("php://stdout");
        }

        parent::__construct($appName, $handlers);
    }
}
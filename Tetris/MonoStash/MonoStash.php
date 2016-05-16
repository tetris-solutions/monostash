<?php

namespace Tetris\MonoStash;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonoStash extends Logger
{
    public function __construct($app)
    {
        $monostash = new Handler();

        $monostash->setFormatter(new Formatter("{$app}@" . gethostname()));
        $handlers[] = $monostash;

        if (PHP_SAPI === 'cli') {
            $handlers[] = new StreamHandler("php://stdout");
        }

        parent::__construct($app, $handlers);
    }
}
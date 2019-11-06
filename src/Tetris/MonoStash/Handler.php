<?php

namespace Tetris\MonoStash;

use Exception;
use Httpful\Request as HttpRequest;
use Monolog\Handler\AbstractProcessingHandler;

class Handler extends AbstractProcessingHandler
{
    public function write(array $record)
    {
        try {
            /*HttpRequest::post(getenv('LOGSTASH_HTTP_URL'), $record['formatted'], 'application/json')
                ->mime('text/plain')
                ->authenticateWith(getenv('LOGSTASH_HTTP_USER'), getenv('LOGSTASH_HTTP_PWD'))
                ->send();*/
        } catch (Exception $e) {
//            echo "{$e->getCode()} : {$e->getMessage()}\n";
//            echo $e->getTraceAsString();
        }
    }
}
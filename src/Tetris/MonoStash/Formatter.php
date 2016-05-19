<?php

namespace Tetris\MonoStash;

use Monolog\Formatter\NormalizerFormatter;

class Formatter extends NormalizerFormatter
{
    private $label;

    public function __construct(string $label)
    {
        parent::__construct('c');
        $this->label = $label;
    }

    public function format(array $record)
    {
        $message = [
            'message' => $record['message'],
            '@timestamp' => gmdate('c'),
            '@version' => 1,
            'label' => $this->label,
            'level' => $record['level']
        ];

        if (isset($record['channel'])) {
            $message['channel'] = $record['channel'];
        }

        if (isset($record['level_name']) && empty($record['level'])) {
            $message['level'] = $record['level_name'];
        }

        if (isset($record['context']) && is_array($record['context'])) {
            $message = array_merge($record['context'], $message);
        }

        return $this->toJson($message);
    }
}
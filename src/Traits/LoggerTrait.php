<?php

namespace Src\Traits;

trait LoggerTrait
{
    public function log(string $message): void
    {
        // В реальном проекте - запись в файл. Здесь - вывод с меткой времени.
        echo sprintf("[%s] LOG: %s" . PHP_EOL, date('H:i:s'), $message);
    }
}
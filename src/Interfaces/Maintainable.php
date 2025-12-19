<?php

namespace Src\Interfaces;

interface Maintainable
{
    public function wash(int $temperature): string;
    public function iron(): string;
}
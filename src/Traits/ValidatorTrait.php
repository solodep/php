<?php

namespace Src\Traits;

use Exception;

trait ValidatorTrait
{
    public function validatePrice(float $price): void
    {
        if ($price < 0) {
            throw new Exception("Цена не может быть отрицательной!");
        }
    }

    public function validateSize(string $size): void
    {
        $allowedSizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Universal'];
        if (!in_array($size, $allowedSizes)) {
            throw new Exception("Недопустимый размер: {$size}");
        }
    }
}
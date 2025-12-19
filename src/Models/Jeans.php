<?php

namespace Src\Models;

use Src\Interfaces\Maintainable;

class Jeans extends ClothingItem implements Maintainable
{
    public function getCategory(): string
    {
        return "Брюки/Джинсы";
    }

    // Переопределение метода (3.4)
    public function calculateDiscount(int $percent): float
    {
        // Джинсы менее 5% скидки не получают
        if ($percent < 5) return $this->price;
        return parent::getPrice() * (1 - $percent / 100);
    }

    public function wash(int $temperature): string
    {
        return "Стирка джинсов {$this->name} вывернутыми наизнанку при {$temperature}°C.";
    }

    public function iron(): string
    {
        return "Джинсы гладить не обязательно.";
    }
}
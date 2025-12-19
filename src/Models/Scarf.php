<?php

namespace Src\Models;

class Scarf extends ClothingItem
{
    public function getCategory(): string
    {
        return "Аксессуары";
    }

    public function calculateDiscount(int $percent): float
    {
        return $this->price - ($percent * 2); // Особая логика скидки
    }
}
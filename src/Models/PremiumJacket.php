<?php

namespace Src\Models;

// 3.9 Класс объявлен как final, от него нельзя наследоваться
final class PremiumJacket extends ClothingItem
{
    public function getCategory(): string
    {
        return "Верхняя одежда (Premium)";
    }

    // 3.9 Метод объявлен как final
    final public function calculateDiscount(int $percent): float
    {
        // На премиум максимум 10% скидки
        $realPercent = min($percent, 10);
        return $this->price * (1 - $realPercent / 100);
    }
}
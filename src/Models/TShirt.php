<?php

namespace Src\Models;

use Src\Interfaces\Maintainable;

class TShirt extends ClothingItem implements Maintainable
{
    public function getCategory(): string
    {
        return "Футболки";
    }

    public function calculateDiscount(int $percent): float
    {
        return $this->price * (1 - $percent / 100);
    }

    // Реализация интерфейса
    public function wash(int $temperature): string
    {
        $this->isClean = true;
        return "Стирка футболки {$this->name} при {$temperature}°C.";
    }

    public function iron(): string
    {
        return "Глажка футболки при среднем режиме.";
    }
}
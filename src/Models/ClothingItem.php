<?php

namespace Src\Models;

use Src\Traits\LoggerTrait;
use Src\Traits\ValidatorTrait;

abstract class ClothingItem
{
    use LoggerTrait;
    use ValidatorTrait;

    protected string $name;
    protected float $price;
    protected string $size;
    protected bool $isClean = true;
    
    protected string $databaseConnection = "Active"; 

    public function __construct(string $name, float $price, string $size)
    {
        $this->validatePrice($price);
        $this->validateSize($size);

        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        
        $this->log("Создан объект: {$this->name} ({$this->size})");
    }

    abstract public function getCategory(): string;
    abstract public function calculateDiscount(int $percent): float;

    public function __toString(): string
    {
        return "Товар: {$this->name}, Размер: {$this->size}, Цена: {$this->price} руб.";
    }

    public function __debugInfo(): array
    {
        return [
            'Info' => "Это объект одежды",
            'Name' => $this->name,
            'Current Price' => $this->price
        ];
    }

    public function __clone()
    {
        $this->name = "Копия " . $this->name;
        $this->price = 0;
        $this->log("Объект был клонирован.");
    }

    public function __sleep(): array
    {
        return ['name', 'price', 'size'];
    }

    public function __wakeup(): void
    {
        $this->databaseConnection = "Reconnected";
        $this->log("Объект восстановлен после сериализации.");
    }

    /**
     * 3.2 Деструктор
     */
    public function __destruct()
    {
        echo "Уничтожение объекта: {$this->name}" . PHP_EOL;
    }

    public function getName(): string { return $this->name; }
    public function getPrice(): float { return $this->price; }
}
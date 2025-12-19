<?php

/**
 */
spl_autoload_register(function ($class) {
    $prefix = 'Src\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

use Src\Models\TShirt;
use Src\Models\Jeans;
use Src\Models\PremiumJacket;

echo "<pre>"; // Для красивого вывода в браузере
echo "=== ЗАПУСК ПРОГРАММЫ 'МАГАЗИН ОДЕЖДЫ' ===" . PHP_EOL . PHP_EOL;

try {
    // 1. Создание объектов и работа конструктора (с валидацией)
    $shirt = new TShirt("Polo Ralph", 5000, "M");
    $jeans = new Jeans("Levis 501", 8000, "L");
    $jacket = new PremiumJacket("Gucci Leather", 50000, "S");

    // Попытка создать невалидный объект (раскомментировать для теста)
    // $badItem = new TShirt("Bad Item", -100, "Z"); 

    echo PHP_EOL . "=== 3.4 Наследование и Интерфейсы ===" . PHP_EOL;
    echo $shirt->wash(40) . PHP_EOL;
    echo $jeans->iron() . PHP_EOL;
    echo "Категория куртки: " . $jacket->getCategory() . PHP_EOL;

    echo PHP_EOL . "=== 3.3 Магический метод __toString ===" . PHP_EOL;
    echo $shirt . PHP_EOL;

    echo PHP_EOL . "=== 3.3 Магический метод __debugInfo (var_dump) ===" . PHP_EOL;
    var_dump($jeans);

    echo PHP_EOL . "=== 3.10 Клонирование объектов ===" . PHP_EOL;
    $shirtClone = clone $shirt;
    echo "Оригинал: " . $shirt->getName() . " | Цена: " . $shirt->getPrice() . PHP_EOL;
    echo "Клон:     " . $shirtClone->getName() . " | Цена: " . $shirtClone->getPrice() . " (сброшена в __clone)" . PHP_EOL;

    echo PHP_EOL . "=== 3.11 Сериализация ===" . PHP_EOL;
    $serialized = serialize($jacket);
    echo "Сериализованная строка (часть): " . substr($serialized, 0, 50) . "..." . PHP_EOL;
    
    // Эмуляция задержки
    sleep(1);
    
    $unserializedJacket = unserialize($serialized);
    echo "Восстановленный объект: " . $unserializedJacket->getName() . PHP_EOL;

    echo PHP_EOL . "=== 3.8 Анонимные классы ===" . PHP_EOL;
    // Создаем анонимный класс для генерации тестовых данных
    $dataGenerator = new class {
        public function generateSku(string $prefix): string {
            return $prefix . '-' . rand(1000, 9999);
        }
        
        public function logOperation(): void {
            echo "Анонимный класс: Генерация артикула завершена." . PHP_EOL;
        }
    };

    echo "Сгенерированный SKU для джинс: " . $dataGenerator->generateSku("JNS") . PHP_EOL;
    $dataGenerator->logOperation();

    echo PHP_EOL . "=== Конец работы скрипта (далее сработают деструкторы) ===" . PHP_EOL;

} catch (Exception $e) {
    echo "ОШИБКА: " . $e->getMessage();
}

echo "</pre>";
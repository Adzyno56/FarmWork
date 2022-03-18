<?php


class Farm
{
    // Массив объектов животных
    static array $arrayAnimals = [];
    // Масств названий и количества собранного продукта
    static array $countProducts = [];
    // Функция создания объекта животного (параметры: создаваемый объект и количество животных)
    public static function createAnimal(Animal $animal, $count = 1) {
        // Получение типа класса объекта
        $typeAnimal = $animal->getTypeClass();
        // Создание и запись объекта в массив
        for ($i = 0; $i < $count; $i++) {

            $newAnimal = new $typeAnimal;
            self::$arrayAnimals[] = $newAnimal;
        }
        echo "Добавлено $count шт. животных типа $typeAnimal на ферму". PHP_EOL;

    }

    public static function showAnimals() {

        $countAnimals =[];

        // Подсчет конкретных объектов животных
        foreach (self::$arrayAnimals as $animal) {
            $typeAnimal = $animal->getTypeClass();
            if (array_key_exists($typeAnimal, $countAnimals)) {
                 $countAnimals[$typeAnimal]++;
            }
            else $countAnimals[$typeAnimal] = 1;

        }
        foreach ($countAnimals as $nameAnimal => $countCurrentAnimal) {
            echo "Животных типа $nameAnimal на ферме: " . $countCurrentAnimal . " шт" . PHP_EOL;
        }
        echo '====================================='. PHP_EOL;
    }

    public static function collectProducts($count) {
        $arrayProducts = [];
        while ($count > 0) {
            // Проход по списку объектов
            foreach (self::$arrayAnimals as $animal) {
                // Получение названия продукта
                $typeProduct = $animal->getNameProduct();
                // Добавление в массив собранные продукты
                if (!array_key_exists($typeProduct,$arrayProducts)) {
                    $arrayProducts[$typeProduct] = 0;
                }

                $product = $animal->getProduct();
                $arrayProducts[$typeProduct] += $product;
            }
            $count--;
        }
        // Добавление в статистическую переменную собранные продукты.
        foreach ($arrayProducts as $productName => $countCurrentProduct) {
            // Вывод продуктов, собранных за неделю (count = 7 дней)
            echo "Продукта типа $productName собрано за неделю: " . $countCurrentProduct . PHP_EOL;

            if (!array_key_exists($productName, self::$countProducts)) {
                self::$countProducts[$productName] = $countCurrentProduct;
            }

            else self::$countProducts[$productName] += $countCurrentProduct;
        }
        echo '===================================='. PHP_EOL;
    }
    // Вывод продуктов за все вреия работы скрипта
    public static function showProducts() {
        foreach (self::$countProducts as $productName => $countProducts) {
            echo "Всего продукта типа $productName на складе = " . $countProducts .  PHP_EOL;
        }
        echo '===================================='. PHP_EOL;
    }


}
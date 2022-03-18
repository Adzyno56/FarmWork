<?php


    // Основной абстрактный класс животных

    abstract class Animal
    {
        // Счетчик объектов
        protected static $idAnimal = 0;
        // Идентификатор животного
        public int $currentAnimalId;
        // Получение продукта конкретного животного
        public abstract function getProduct();
        // Получение названия продукта
        public abstract function getNameProduct();

        // Получение имя класса, названия конкретного животного
        public function getTypeClass() {

            return static::class;

        }

    }

    // Класс животного Курица

    class Chicken extends Animal  {
        // Инициализация идентификатора животного
        function __construct() {

            $this->currentAnimalId = parent::$idAnimal++;
           // parent::$idAnimal++;

        }
        // Количество продукта - яиц, которое можно получить с одной курицы (от 0 до 1)
        public function getProduct(): int {
            return mt_rand(0, 1);
        }
        // Название продукта
        public function getNameProduct(): string {
            return "Eggs";
        }
    }

    // Класс животного Корова

    class Cow extends Animal {
        function __construct() {

            $this->currentAnimalId = parent::$idAnimal++;
           // parent::$idAnimal++;

        }
        public function getProduct(): int
        {
            return mt_rand(8,12);
        }
        public function getNameProduct(): string {
            return "Litres of milk";
        }

    }
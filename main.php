<?php

require_once 'Farm.php';
require_once 'Animal.php';

// Инициализация объекта Ферма
$FarmFactory = new Farm();

// Создание объектов животных
$FarmFactory::createAnimal(new Chicken, 20);
$FarmFactory::createAnimal(new Cow, 10);
// Вывод всех животных на ферме
$FarmFactory::showAnimals();
// Сбор продуктов за одну неделю (7 дней)
$FarmFactory::collectProducts(7);
// Вывод всех собранных продуктов на ферме
$FarmFactory::showProducts();

$FarmFactory::createAnimal(new Chicken, 5);
$FarmFactory::createAnimal(new Cow, 1);

$FarmFactory::showAnimals();
$FarmFactory::collectProducts(7);
$FarmFactory::showProducts();

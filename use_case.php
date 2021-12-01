<?php

// This file shows how the usage of Fridge (a.k.a. "Dolap") and Shelf (a.k.a. "Raf").

// It is not allowed to use a package manager like Composer.
// Import everything manually instead using Auto Loader.

include_once "src/AbstractFridge.php";
include_once "src/AbstractShelf.php";
include_once "src/Fridge.php";
include_once "src/Shelf.php";
include_once "tests/AbstractTest.php";
include_once "tests/FridgeTestCase.php";
include_once "tests/ShelfTestCase.php";

// Shelfs (each shelf has a capacity of 20.)
$shelf1 = new Shelf();
$shelf2 = new Shelf();
$shelf3 = new Shelf();

// Fridge (has a shelf capacity of 3.)
$fridge = new Fridge();

$fridge->openDoor(); // Opens the door of the fridge.
$fridge->closeDoor(); // Closes the door of the fridge.
$fridge->isDoorOpened(); // Shows if the door of the fridge is opened or not.
$fridge->isDoorClosed(); // Shows if the door of the fridge is closed or not.

// Add shelfs to the fridge.
$fridge->addShelf($shelf1);
$fridge->addShelf($shelf2);
$fridge->addShelf($shelf3);

$fridge->isEmpty(); // Shows whether the fridge is empty.

// Fill the fridge completely with the drinks
for ($i = 0; $i <= $fridge->getFridgeCapacity(); $i++) {
    $fridge->addDrink();
}

$fridge->isFull(); // Shows whether the fridge is full.

$fridge->addDrink(); // Must return false, because the fridge is full at the moment and there is no space for additional drinks.

$fridge->removeDrink(); // Removes a drink from the fridge, create a space for one drink.

$fridge->addDrink(); // Must return true, because we got a space for one drink.
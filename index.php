<?php

// It is not allowed to use a package manager like Composer.
// Import everything manually instead using Auto Loader.

include_once "src/AbstractFridge.php";
include_once "src/AbstractShelf.php";
include_once "src/Fridge.php";
include_once "src/Shelf.php";
include_once "tests/AbstractTest.php";
include_once "tests/FridgeTestCase.php";
include_once "tests/ShelfTestCase.php";

// Run test cases for Fridge.
FridgeTestCase::run();

// Run test cases for Shelf.
ShelfTestCase::run();
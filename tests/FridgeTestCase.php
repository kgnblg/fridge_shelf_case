<?php

class FridgeTestCase extends AbstractTest
{
    /**
     * Test cases for fridge.
     * 
     * @return void
     */
    public static function run(): void
    {
        self::test_door_opened();
        self::test_door_closed();
        self::test_shelf_amount();
        self::test_add_shelf_to_fridge();
        self::test_remove_shelf_from_fridge();
        self::test_add_drink_to_fridge();
        self::test_remove_drink_from_fridge();
        self::test_overload_fridge();
        self::test_remove_drink_when_zero_drink_in_fridge();
        self::test_add_drink_when_no_shelf_added_to_fridge();
    }

    /**
     * Test if the fridge's door is opened successfully.
     * 
     * @return void
     */
    public static function test_door_opened(): void
    {
        $fridge = new Fridge();
        $fridge->openDoor();
        self::assertEqual(__METHOD__, $fridge->isDoorOpened(), true);
    }

    /**
     * Test if the fridge's door is closed successfully.
     * 
     * @return void
     */
    public static function test_door_closed(): void
    {
        $fridge = new Fridge();
        $fridge->closeDoor();
        self::assertEqual(__METHOD__, $fridge->isDoorClosed(), true);
    }

    /**
     * Test the shelf amount in the fridge.
     * 
     * @return void
     */
    public static function test_shelf_amount(): void
    {
        $fridge = new Fridge();
        self::assertEqual(__METHOD__, $fridge->getShelfAmount(), 0);
    }

    /**
     * Test adding shelf to the fridge.
     * 
     * @return void
     */
    public static function test_add_shelf_to_fridge(): void
    {
        $fridge = new Fridge();
        $fridge->addShelf(new Shelf());
        self::assertEqual(__METHOD__, $fridge->getShelfAmount(), 1);
    }

    /**
     * Test removing shelf from the fridge.
     * 
     * @return void
     */
    public static function test_remove_shelf_from_fridge(): void
    {
        $fridge = new Fridge();
        $fridge->addShelf(new Shelf());
        $fridge->removeShelf();
        self::assertEqual(__METHOD__, $fridge->getShelfAmount(), 0);
    }

    /**
     * Test add a drink to the fridge.
     * 
     * @return void
     */
    public static function test_add_drink_to_fridge(): void
    {
        $fridge = new Fridge();
        $fridge->addShelf(new Shelf());
        self::assertEqual(__METHOD__, $fridge->addDrink(), true);
    }

    /**
     * Test remove drink from the fridge.
     * 
     * @return void
     */
    public static function test_remove_drink_from_fridge(): void
    {
        $fridge = new Fridge();
        $fridge->addShelf(new Shelf());
        $fridge->addDrink();
        self::assertEqual(__METHOD__, $fridge->removeDrink(), true);
    }

    /**
     * Test overload the fridge.
     * 
     * @return void
     */
    public static function test_overload_fridge(): void
    {
        $fridge = new Fridge();
        $fridge->addShelf(new Shelf());
        $fridge->addShelf(new Shelf());

        for ($i = 0; $i <= $fridge->getFridgeCapacity(); $i++) {
            $fridge->addDrink();
        }

        self::assertEqual(__METHOD__, $fridge->addDrink(), false);
    }

    /**
     * Test remove drink from the fridge, when there is no drink in the fridge.
     * 
     * @return void
     */
    public static function test_remove_drink_when_zero_drink_in_fridge(): void
    {
        $fridge = new Fridge();
        self::assertEqual(__METHOD__, $fridge->removeDrink(), false);
    }

    /**
     * Test add drink to the fridge, when there is no shelf inside of the fridge.
     * 
     * @return void
     */
    public static function test_add_drink_when_no_shelf_added_to_fridge(): void
    {
        $fridge = new Fridge();
        self::assertEqual(__METHOD__, $fridge->addDrink(), false);
    }
}

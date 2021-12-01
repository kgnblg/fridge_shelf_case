<?php

class ShelfTestCase extends AbstractTest
{
    /**
     * Test cases for shelf.
     * 
     * @return void
     */
    public static function run(): void
    {
        self::test_shelf_is_empty();
        self::test_remove_drink_when_shelf_is_empty();
        self::test_shelf_is_full();
        self::test_overload_shelf();
        self::test_remove_drink();
        self::test_add_drink();
    }

    /**
     * Test whether the shelf is empty or not.
     * 
     * @return void
     */
    public static function test_shelf_is_empty(): void
    {
        $shelf = new Shelf();
        self::assertEqual(__METHOD__, $shelf->isEmpty(), true);
    }

    /**
     * Test remove drink when the shelf is empty.
     * 
     * @return void
     */
    public static function test_remove_drink_when_shelf_is_empty(): void
    {
        $shelf = new Shelf();
        self::assertEqual(__METHOD__, $shelf->removeDrink(), false);
    }

    /**
     * Test whether the shelf is full or not.
     * 
     * @return void
     */
    public static function test_shelf_is_full(): void
    {
        $shelf = new Shelf();

        for ($i = 0; $i < $shelf::DRINK_LIMIT; $i++) {
            $shelf->addDrink();
        }

        self::assertEqual(__METHOD__, $shelf->isFull(), true);
    }

    /**
     * Test add drink when the shelf is full.
     * 
     * @return void
     */
    public static function test_overload_shelf(): void
    {
        $shelf = new Shelf();

        for ($i = 0; $i < $shelf::DRINK_LIMIT; $i++) {
            $shelf->addDrink();
        }

        self::assertEqual(__METHOD__, $shelf->addDrink(), false);
    }

    /**
     * Test remove drink.
     * 
     * @return void
     */
    public static function test_remove_drink(): void
    {
        $shelf = new Shelf();
        $shelf->addDrink();
        self::assertEqual(__METHOD__, $shelf->removeDrink(), true);
    }

    /**
     * Test add drink.
     * 
     * @return void
     */
    public static function test_add_drink(): void
    {
        $shelf = new Shelf();
        self::assertEqual(__METHOD__, $shelf->addDrink(), true);
    }
}

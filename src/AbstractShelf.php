<?php

abstract class AbstractShelf
{
    private $drinkAmount = 0;

    /**
     * Returns the drink amount in the shelf.
     * 
     * @return int
     */
    public function getDrinkAmount(): int
    {
        return $this->drinkAmount;
    }

    /**
     * Checks whether the shelf is empty or not.
     * 
     * @return bool
     */
    public function isEmpty(): bool
    {
        return ($this->drinkAmount == 0);
    }

    /**
     * Checks whether the shelf is full or not.
     * 
     * @return bool
     */
    public function isFull(): bool
    {
        return ($this->drinkAmount == static::DRINK_LIMIT);
    }

    /**
     * Adds drink to the shelf, if there is enough space.
     * Returns true, if the drink has been added.
     * Returns false, if the shelf is full and drink could not be added.
     * 
     * @return bool
     */
    public function addDrink(): bool
    {
        if ($this->isFull()) {
            return false;
        }

        $this->drinkAmount++;
        return true;
    }

    /**
     * Removes a drink from the shelf.
     * Returns true, if the drink has been removed.
     * Returns false, if the shelf is empty and drink could not be removed.
     * 
     * @return bool
     */
    public function removeDrink(): bool
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->drinkAmount--;
        return true;
    }
}

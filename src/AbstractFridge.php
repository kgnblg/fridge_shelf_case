<?php

abstract class AbstractFridge
{
    private $shelfs = [];
    private $doorStatus = false;

    /**
     * Opens the fridge door.
     * 
     * @return void
     */
    public function openDoor(): void
    {
        $this->doorStatus = true;
    }

    /**
     * Closes the fridge door.
     * 
     * @return void
     */
    public function closeDoor(): void
    {
        $this->doorStatus = false;
    }

    /**
     * Shows whether the fridge's door is open or not.
     * 
     * @return bool
     */
    public function isDoorOpened(): bool
    {
        return $this->doorStatus;
    }

    /**
     * Shows whether the fridge's door is closed or not.
     * 
     * @return bool
     */
    public function isDoorClosed(): bool
    {
        return (! $this->doorStatus);
    }

    /**
     * Adds shelf to the fridge until the fridge's shelf limit.
     * 
     * @param AbstractShelf $shelf
     * @return bool
     */
    public function addShelf(AbstractShelf $shelf): bool
    {
        if (count($this->shelfs) < static::SHELF_LIMIT) {
            $this->shelfs[] = $shelf;
            return true;
        }

        return false;
    }

    /**
     * Removes the last shelf from the fridge.
     * 
     * @return void
     */
    public function removeShelf(): void
    {
        array_pop($this->shelfs);
    }

    /**
     * Returns the total shelf amount in the fridge.
     * 
     * @return int
     */
    public function getShelfAmount(): int
    {
        return count($this->shelfs);
    }

    /**
     * Returns the fridge's drink capacity.
     * 
     * @return int
     */
    public function getFridgeCapacity(): int
    {
        $capacity = 0;

        foreach ($this->shelfs as $shelf) {
            $capacity += $shelf::DRINK_LIMIT;
        }

        return $capacity;
    }

    /**
     * Checks whether the fridge is empty or not.
     * 
     * @return bool
     */
    public function isEmpty(): bool
    {
        foreach ($this->shelfs as $shelf) {
            if (! $shelf->isEmpty()) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks whether the fridge is full or not.
     * 
     * @return bool
     */
    public function isFull(): bool
    {
        if (! empty($this->shelfs)) {
            foreach ($this->shelfs as $shelf) {
                if (! $shelf->isFull()) {
                    return false;
                }
            }
            return true;
        }

        return false;
    }

    /**
     * Adds drink to the fridge, if there is enough place.
     * Returns true if the drink has been added or returns false,
     * if there is no place for the drink.
     * 
     * @return bool
     */
    public function addDrink(): bool
    {
        foreach ($this->shelfs as $shelf) {
            if ($shelf->addDrink()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Removes a drink from the fridge.
     * Returns true, if the drink has been successfully removed.
     * Returns false, if the fridge is empty and no drink has been removed.
     * 
     * @return bool
     */
    public function removeDrink(): bool
    {
        foreach ($this->shelfs as $shelf) {
            if ($shelf->removeDrink()) {
                return true;
            }
        }

        return false;
    }
}

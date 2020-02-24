<?php


// Avoids primitive obsession and readability
// Helps with consistency
// Immutable

// Can be overused, only use it when it is required
class Age
{
    /**
     * @var int
     */
    private int $age;

    /**
     * Age constructor.
     * @param  int  $age
     */
    public function __construct(int $age)
    {
        if ($age < 0 || $age > 120) {
            throw new \http\Exception\InvalidArgumentException('That makes no sense');
        }

        $this->age = $age;
    }

    /**
     * @return Age
     */
    public function increment(): Age
    {
        return new self($this->age + 1);
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->age;
    }
}

function register(string $name, Age $age)
{
}

$age = new Age(35);

register('John Doe', $age);


class Coordinates
{
    /**
     * @var int
     */
    private int $x;

    /**
     * @var int
     */
    private int $y;

    /**
     * Coordinates constructor.
     * @param  int  $x
     * @param  int  $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function pin(Coordinates $coordinates)
{
}

function distance(Coordinates $begin, Coordinates $end)
{
}
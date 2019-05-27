<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Card;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

class CardCollection implements IteratorAggregate, ArrayAccess, Countable
{
    private $cards;

    public function __construct($cards = [])
    {
        $this->cards = $cards;
    }

    public function isEmpty(): bool
    {
        return count($this->cards) === 0;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->cards);
    }

    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            $this->cards[] = $value;

            return;
        }

        $this->cards[$offset] = $value;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->cards[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->cards[$offset] ?? null;
    }

    public function count()
    {
        return count($this->cards);
    }

    public function exists(CardInterface $card): bool
    {
        foreach ($this->cards as $item) {
            if ($card->describe() === $item->describe()) {
                return true;
            }
        }

        return false;
    }
}

<?php

declare(strict_types=1);


namespace PropertyFinder\BoardingChallenge\Tests\Card;

use PropertyFinder\BoardingChallenge\Card\CardInterface;

class DummyCard implements CardInterface
{
    /** @var string */
    private $departure;
    /** @var string */
    private $arrival;

    public function __construct(string $departure, string $arrival)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
    }

    public function departure(): string
    {
        return $this->departure;
    }

    public function arrival(): string
    {
        return $this->arrival;
    }

    public function describe(): string
    {
        return $this->departure . '-' . $this->arrival;
    }
}

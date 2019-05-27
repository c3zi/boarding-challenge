<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Card;

use function sprintf;

final class FlightCard implements CardInterface
{
    /** @var string */
    protected $departure;
    /** @var string */
    protected $arrival;
    /** @var string */
    protected $number;
    /** @var string */
    protected $seat;
    /** @var string */
    protected $description;

    public function __construct(
        string $departure,
        string $arrival,
        string $number,
        string $seat,
        ?string $description = null
    ) {
        $this->seat = $seat;
        $this->description = $description;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->number = $number;
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
        return sprintf(
            'From %s, take flight %s to %s. %s.%s',
            $this->departure,
            $this->number,
            $this->arrival,
            $this->seat,
            $this->description ? ' '.$this->description. '.' : ''
        );
    }
}

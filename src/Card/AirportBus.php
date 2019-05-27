<?php

declare(strict_types=1);


namespace PropertyFinder\BoardingChallenge\Card;

use function sprintf;

final class AirportBus implements CardInterface
{
    /** @var string */
    protected $departure;
    /** @var string */
    protected $arrival;
    /** @var string */
    private $seat;

    public function __construct(
        string $departure,
        string $arrival,
        ?string $seat = null
    ) {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->seat = $seat;
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
            'Take the airport bus from %s to %s. %s',
            $this->departure,
            $this->arrival,
            $this->seat ? 'Sit in seat ' . $this->seat.'.' : 'No seat assignment.'
        );
    }
}

<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Card;

use function sprintf;

final class TrainCard implements CardInterface
{
    /** @var string */
    protected $departure;
    /** @var string */
    protected $arrival;
    /** @var string */
    protected $number;
    /** @var string */
    protected $seat;

    public function __construct(
        string $departure,
        string $arrival,
        string $number,
        string $seat
    ) {
        $this->seat = $seat;
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
            'Take train %s from %s to %s. %s.',
            $this->number,
            $this->departure,
            $this->arrival,
            $this->seat ? 'Sit in seat ' . $this->seat : 'No seat assignment'
        );
    }
}

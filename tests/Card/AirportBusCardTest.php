<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Tests\Card;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\AirportBus;

final class AirportBusCardTest extends TestCase
{
    public function testWhenSeatAssignmentIsNotGiven(): void
    {
        $bus = new AirportBus('Barcelona', 'Gerona Airport');
        $expected = 'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.';

        $this->assertEquals($expected, $bus->describe());
    }

    public function testWhenSeatAssignmentIsGiven(): void
    {
        $bus = new AirportBus('Barcelona', 'Gerona Airport', '22');
        $expected = 'Take the airport bus from Barcelona to Gerona Airport. Sit in seat 22.';

        $this->assertEquals($expected, $bus->describe());
    }
}

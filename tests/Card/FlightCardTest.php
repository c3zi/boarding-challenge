<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Tests\Card;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\FlightCard;

final class FlightCardTest extends TestCase
{
    public function testDescribeWhenDescriptionIsGiven(): void
    {
        $flight = new FlightCard(
            'Gerona Airport',
            'Stockholm',
            'SK455',
            'Gate 45B, seat 3A',
            'Baggage drop at ticket counter 344'
        );

        $expected = 'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.';
        $this->assertEquals($expected, $flight->describe());
    }

    public function testDescribeWhenDescriptionIsNotGiven(): void
    {
        $flight = new FlightCard(
            'Gerona Airport',
            'Stockholm',
            'SK455',
            'Gate 45B, seat 3A'
        );

        $expected = 'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.';
        $this->assertEquals($expected, $flight->describe());
    }
}

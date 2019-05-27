<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Tests\Card;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\TrainCard;

final class TrainCardTest extends TestCase
{
    public function testDescribe(): void
    {
        $train = new TrainCard('Madrid', 'Barcelona', '78A', '45B');

        $expected = 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.';
        $this->assertEquals($expected, $train->describe());
    }
}

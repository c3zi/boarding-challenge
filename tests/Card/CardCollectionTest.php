<?php

declare(strict_types=1);


namespace PropertyFinder\BoardingChallenge\Tests\Card;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\CardCollection;

final class CardCollectionTest extends TestCase
{
    public function testIsEmptyAndCountable(): void
    {
        $card = new DummyCard('a', 'b');

        $collection1 = new CardCollection();
        $collection2 = new CardCollection([$card]);

        $this->assertTrue($collection1->isEmpty());
        $this->assertFalse($collection2->isEmpty());
    }

    public function testArrayable(): void
    {
        $card1 = new DummyCard('a', 'b');
        $card2 = new DummyCard('b', 'c');
        $card3 = new DummyCard('z', 'a');

        $collection = new CardCollection([$card1, $card2, $card3]);

        $this->assertEquals('a', $collection[0]->departure());
        $this->assertEquals('b', $collection[1]->departure());
        $this->assertEquals('z', $collection[2]->departure());
    }
}

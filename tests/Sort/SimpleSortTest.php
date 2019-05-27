<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Tests\Formatter;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Sort\SimpleSort;
use PropertyFinder\BoardingChallenge\Tests\Card\DummyCard;

final class SimpleSortTest extends TestCase
{
    public function testWhenNoCards(): void
    {
        $sort = new SimpleSort();
        $this->assertCount(0, $sort->sort(new CardCollection()));
    }

    public function testWhenTwoCards(): void
    {
        $cards = [
            new DummyCard('d', 'e'),
            new DummyCard('c', 'd'),
        ];

        $collection = new CardCollection($cards);
        $sorted = (new SimpleSort())->sort($collection);

        $this->assertEquals('c', $sorted[0]->departure());
        $this->assertEquals('d', $sorted[0]->arrival());
        $this->assertEquals('d', $sorted[1]->departure());
        $this->assertEquals('e', $sorted[1]->arrival());
    }

    public function testSortAlgorithm(): void
    {
        $cards = [
            new DummyCard('d', 'e'),
            new DummyCard('b', 'c'),
            new DummyCard('f', 'g'),
            new DummyCard('c', 'd'),
            new DummyCard('g', 'h'),
            new DummyCard('e', 'f'),
            new DummyCard('a', 'b'),
            new DummyCard('h', 'i'),
        ];

        $collection = new CardCollection($cards);
        $sorted = (new SimpleSort())->sort($collection);

        $this->assertEquals('a-b', $sorted[0]->describe());
        $this->assertEquals('b-c', $sorted[1]->describe());
        $this->assertEquals('c-d', $sorted[2]->describe());
        $this->assertEquals('d-e', $sorted[3]->describe());
        $this->assertEquals('e-f', $sorted[4]->describe());
        $this->assertEquals('f-g', $sorted[5]->describe());
        $this->assertEquals('g-h', $sorted[6]->describe());
        $this->assertEquals('h-i', $sorted[7]->describe());
    }
}

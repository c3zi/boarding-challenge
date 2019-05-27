<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Tests\Formatter;

use PHPUnit\Framework\TestCase;
use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Formatter\ConsoleFormatter;
use PropertyFinder\BoardingChallenge\Tests\Card\DummyCard;

final class ConsoleFormatterTest extends TestCase
{
    public function testPrintWhenCollectionIsEmpty(): void
    {
        $formatter = new ConsoleFormatter();
        $formatter->print(new CardCollection());

        $this->expectOutputString("\nNo boarding cards. Route cannot be displayed.\n");
    }

    public function testPrintWhenCollectionIsNotEmpty(): void
    {
        $cards = [
            new DummyCard('d', 'e'),
            new DummyCard('b', 'c'),
            new DummyCard('f', 'g'),
        ];

        (new ConsoleFormatter())->print(new CardCollection($cards));

        $this->expectOutputString("1. d-e\n2. b-c\n3. f-g\n4. You have arrived at your final destination.\n");
    }
}

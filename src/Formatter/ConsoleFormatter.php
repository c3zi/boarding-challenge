<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Formatter;

use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Card\CardInterface;
use function sprintf;

class ConsoleFormatter implements FormatterInterface
{
    public function print(CardCollection $collection): void
    {
        if ($collection->isEmpty()) {
            print("\nNo boarding cards. Route cannot be displayed.\n");

            return;
        }

        $i = 1;

        /** @var CardInterface $card */
        foreach ($collection as $card) {
            print(sprintf("%d. %s\n", $i++, $card->describe()));
        }

        print(sprintf("%d. You have arrived at your final destination.\n", $i));
    }
}

<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Sort;

use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Card\CardInterface;
use RuntimeException;

class SimpleSort implements SortInterface
{
    public function sort(CardCollection $cards): CardCollection
    {
        if (count($cards) < 2) {
            return $cards;
        }

        $mergedDepartureAndArrival = [];
        $departures = [];

        /** @var CardInterface $card */
        foreach ($cards as $key => $card) {
            $departure = $card->departure();
            $arrival = $card->arrival();

            $mergedDepartureAndArrival[$departure][] = ['type' => 'departure', 'index' => $key];
            $mergedDepartureAndArrival[$arrival][] = ['type' => 'arrival', 'index' => $key];

            $departures[$departure] = $card;
        }

        $firstIndex = $this->findFirstCardInRoutePath($mergedDepartureAndArrival);

        $currentCard = $cards[$firstIndex];
        unset($cards[$firstIndex]);

        $size = count($cards);

        $sorted = new CardCollection();
        $sorted[] = $currentCard;

        while ($size > 0) {
            $arrival = $currentCard->arrival();

            if (!isset($departures[$arrival])) {
                throw new RuntimeException('Broken route path.');
            }

            $sorted[] = $departures[$arrival];
            $currentCard = $departures[$arrival];
            --$size;
        }

        return $sorted;
    }

    private function findFirstCardInRoutePath(array $temp): int
    {
        $first = null;

        foreach ($temp as $name => $details) {
            if (count($details) === 1) {
                $index = $details[0]['index'];

                if ($details[0]['type'] === 'departure') {
                    $first = (int)$index;
                    break;
                }
            }
        }

        if ($first === null) {
            throw new RuntimeException('Could not find the first element.');
        }

        return $first;
    }
}

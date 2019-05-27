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

        [$firstIndex, $lastIndex] = $this->findFirstAndLastIndexes($mergedDepartureAndArrival);

        $currentCard = $cards[$firstIndex];
        $lastCard = $cards[$lastIndex];
        unset($cards[$firstIndex], $cards[$lastIndex]);

        $size = count($cards);

        $sorted = new CardCollection();
        $sorted[] = $currentCard;

        while ($size > 0) {
            $arrival = $currentCard->arrival();

            if (!isset($departures[$arrival])) {
                throw new RuntimeException('Broken route path.');
            }

            if (!$sorted->exists($departures[$arrival])) {
                $sorted[] = $departures[$arrival];
            }

            $currentCard = $departures[$arrival];
            --$size;
        }

        $sorted[] = $lastCard;

        return $sorted;
    }

    private function findFirstAndLastIndexes(array $temp): array
    {
        $firstIndex = null;
        $lastIndex = null;

        foreach ($temp as $name => $details) {
            if (count($details) === 1) {
                $index = $details[0]['index'];

                if ($details[0]['type'] === 'departure') {
                    $firstIndex = $index;
                }

                if ($details[0]['type'] === 'arrival') {
                    $lastIndex = $index;
                }
            }
        }

        if ($firstIndex === null) {
            throw new RuntimeException('Could not find the first element.');
        }

        if ($lastIndex === null) {
            throw new RuntimeException('Could not find the last element.');
        }

        return [$firstIndex, $lastIndex];
    }
}

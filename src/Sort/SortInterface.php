<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Sort;

use PropertyFinder\BoardingChallenge\Card\CardCollection;

interface SortInterface
{
    public function sort(CardCollection $cards): CardCollection;
}

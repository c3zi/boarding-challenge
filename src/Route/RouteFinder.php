<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Route;

use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Formatter\FormatterInterface;
use PropertyFinder\BoardingChallenge\Sort\SortInterface;

class RouteFinder
{
    /** @var CardCollection */
    private $collection;
    /** @var SortInterface */
    private $sort;
    /** @var FormatterInterface */
    private $formatter;

    public function __construct(CardCollection $collection, SortInterface $sort, FormatterInterface $formatter)
    {
        $this->collection = $collection;
        $this->sort = $sort;
        $this->formatter = $formatter;
    }

    public function find(): CardCollection
    {
        return $this->sort->sort($this->collection);
    }

    public function display(): void
    {
        $sorted = $this->sort->sort($this->collection);
        $this->formatter->print($sorted);
    }
}

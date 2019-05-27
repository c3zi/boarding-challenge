<?php

namespace PropertyFinder\BoardingChallenge\Formatter;


use PropertyFinder\BoardingChallenge\Card\CardCollection;

interface FormatterInterface
{
    public function print(CardCollection $collection): void;
}

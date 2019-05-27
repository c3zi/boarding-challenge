<?php

declare(strict_types=1);

namespace PropertyFinder\BoardingChallenge\Card;

interface CardInterface
{
    public function departure(): string;

    public function arrival(): string;

    public function describe(): string;
}

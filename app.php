<?php

require 'vendor/autoload.php';

use PropertyFinder\BoardingChallenge\Card\FlightCard;
use PropertyFinder\BoardingChallenge\Card\TrainCard;
use PropertyFinder\BoardingChallenge\Card\AirportBus;
use PropertyFinder\BoardingChallenge\Sort\SimpleSort;
use PropertyFinder\BoardingChallenge\Card\CardCollection;
use PropertyFinder\BoardingChallenge\Route\RouteFinder;
use PropertyFinder\BoardingChallenge\Formatter\ConsoleFormatter;

$cards = new CardCollection([
    new AirportBus('Koszalin', 'Warsaw', '12'),
    new AirportBus('Barcelona', 'Gerona Airport', '45'),
    new FlightCard(
        'Gerona Airport',
        'Stockholm',
        'SK455',
        'Gate 45B, seat 3A',
        'Baggage drop at ticket counter344'
    ),
    new TrainCard('Poznan', 'Koszalin', '12B', '45B' ),
    new FlightCard(
        'Stockholm',
        'New York JFK',
        'SK22',
        'Gate 22, seat 7B',
        'Baggage will we automatically transferred from your last leg'
    ),
    new AirportBus('Warsaw', 'Valencia'),
    new TrainCard('Valencia', 'Barcelona', '78A', '45B' ),
    new FlightCard(
        'New York JFK',
        'Warsaw',
        'PL48',
        'Gate 1, seat 1'
    ),
]);

$route = new RouteFinder($cards, new SimpleSort(), new ConsoleFormatter());
$route->display();

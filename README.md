# Boarding Challenge
## The problem 
> You are given a stack of boarding cards for various transportations that will take you from a point A to point B via
several stops on the way. All of the boarding cards are out of order and you don't know where your journey starts,
nor where it ends. Each boarding card contains information about seat assignment, and means of transportation
(such as flight number, bus number etc).

**Assumptions:**
1. `departure` and `arrival` data are provided by an external DTO.              
The API is responsible only for sorting and printing found routes.
2. The API throws an internal PHP exception (RuntimeException) for simplicity.
3. The API does not use PHP docblock regarding to the PHP version (> 7.0) and type hinting.
4. The boarding cards are unique.

### Installation
1. Make sure you're using PHP 7.1 or higher and have composer installed
2. Clone repository: git clone https://github.com/c3zi/boarding-challenge
3. Install all dependencies using composer: `composer install`

### Usage
To run an example just execute: `php app.php`

### Quality
To run unit tests execute: `./vendor/bin/phpunit tests`

# PHP Scraping Project

This project is a PHP scraping application that retrieves data from a website using the DomCrawler component of Symfony.

We retrieve the following information from the website [https://www.planete-sonic.com/univers/personnages/personnages-des-jeux/](https://www.planete-sonic.com/univers/personnages/personnages-des-jeux/):
- Character name
- Character image
- Character description

## Prerequisites

- PHP 8.0 or later

## Installation

1. Clone the repository:

```bash
    git clone
```

2. Install the dependencies:

```bash
    composer install
```

## Usage of Symfony Components

This project uses the following Symfony components:

- DomCrawler
- HttpClient
- CssSelector

These components provide powerful functionalities for web scraping, allowing you to navigate through HTML and extract desired data.

## Tests

To perform static code analysis, use PHPStan:
```bash
   php vendor/bin/phpstan analyze src --level=max
```

To run unit tests, use PHPUnit:
```bash
    php vendor/bin/phpunit tests
```


## Contributors

- Joanne Massillon @joannemas

## Licence

This project is licensed under the MIT License.
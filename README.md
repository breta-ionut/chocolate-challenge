# Chocolate Challenge application

### Prerequisites

1. Git
2. Docker

### Installation

1. Clone the repository
2. Copy .env.dist to .env
3. Run docker-compose up -d
4. Run docker-compose exec php composer install

### Usage

1. To write a poesy, run in the project dir the following:
```
docker-compose exec php bash

bin/console write-poesy <boxSize> (where <boxSize> should be the initial number of chocolates in the box. It will default to 48 if not specified)

Examples:

bin/console write-poesy 3
bin/console write-poesy 5
bin/console write-poesy
```

### Tests

1. Run docker-compose exec php vendor/bin/phpunit

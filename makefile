bash:
	docker-compose exec php-fpm bash

test:
	docker-compose exec php-fpm ./vendor/bin/phpunit --testdox
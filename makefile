up:
	docker-compose up -d

stop:
	docker-compose stop

bash:
	docker-compose exec php-fpm bash

test:
	docker-compose exec php-fpm ./vendor/bin/phpunit --testdox --coverage-text --coverage-html log
	
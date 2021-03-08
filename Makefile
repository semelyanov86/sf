test: api-test

api-test:
	docker-compose run --rm app composer test

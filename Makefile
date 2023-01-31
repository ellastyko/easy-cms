OS := $(shell uname)
DC := docker-compose exec
SAIL := ./vendor/bin/sail

NODE := npm # or yarn
APP := $(DC) app
ARTISAN := $(APP) php artisan


setup: env keygen deps start migrate seeds chmod
good: deps clear refresh seeds node-install node-dev
build: deps start migrate node-build

restart: stop start

start:
	@$(SAIL) up -d --build

stop:
	@$(SAIL) down

node-install:
	@$(NODE) install

node-dev:
	@$(NODE) run dev

node-build:
	@$(NODE) run build

ssh:
	@$(APP) bash

# DB commands
migrate:
	@$(APP) $(ARTISAN) migrate

refresh:
	@$(ARTISAN) migrate:refresh

fresh:
	@$(ARTISAN) migrate:fresh

seeds:
	@$(ARTISAN) db:seed

truncate:
	@$(ARTISAN) db:wipe

# Dev
env:
	@cp .env.example .env

keygen:
	@$(ARTISAN) key:generate

deps:
	@$(APP) composer install
	@$(NODE) install

clear:
	@$(ARTISAN) optimize:clear

chmod:
	@sudo chmod -R 777 .

frontend:
	@$(ARTISAN) frontend:translations && $(ARTISAN) frontend:validation


schedule:
	$(ARTISAN) schedule:run

queue:
	@$(ARTISAN) queue:work

routes:
	$(ARTISAN) route:list

# Tests
test:
	$(ARTISAN) test

# Code style
phpcs:
	@$(APP) ./vendor/bin/phpcs --standard=./phpcs.xml

phpcbf:
	@$(APP) ./vendor/bin/phpcbf --standard=./phpcs.xml

phpmd:
	@$(APP) ./vendor/bin/phpmd app xml phpmd.xml  --reportfile reports/phpmd-report.xml

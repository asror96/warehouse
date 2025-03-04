.PHONY: all

init: build # Запуск проекта и установка зависимостей

up: # Запуск контейнеров
	docker compose -f docker-compose.yml up -d --force-recreate --remove-orphans

down: # Остановка контейнеров
	docker compose -f docker-compose.yml down --remove-orphans


build: # Сборка контейнеров
	docker compose -f docker-compose.yml build
	make copy-env
	make composer-install
	make up


init-front: # Сборка фронтенда
	docker compose run --rm frontend yarn install -ci


copy-env: # Копирование файла .env
	cp ./.env.example ./.env


composer-install: # Установка пакетов Composer
	docker compose -f docker-compose.yml run --rm app composer install --no-scripts --prefer-dist
	docker compose -f docker-compose.yml run --rm app php artisan key:generate


composer-validate: # Валидация файла composer.json
	docker compose -f docker-compose.yml run --rm app composer validate --strict


composer-audit: # Аудит пакетов Composer
	docker compose -f docker-compose.yml run --rm app composer audit --format=plain


cache-clear: # Очистка кеша приложения
	docker compose -f docker-compose.yml run --rm app php artisan cache:clear


fixer-check: # Проверка стиля написания кода
	docker compose -f docker-compose.yml run --rm app ./vendor/bin/pint --test --config=pint.json


fixer-fix: # Исправление стиля написания кода
	docker compose -f docker-compose.yml run --rm app ./vendor/bin/pint -v --config=pint.json


help: # Справка по командам
	@grep -E '^[a-zA-Z0-9_-]+:.*#' Makefile | sort | while read -r l; do printf "\033[1;32m$$(echo $$l | cut -f 1 -d':')\033[00m:$$(echo $$l | cut -f 2- -d'#')\n"; done

RED=\033[31m
GREEN=\033[32m
YELLOW=\033[33m
RESET=\033[0m

install build:
	@echo "$(YELLOW)Creating container network...$(RESET)"
	@docker network create --driver bridge app-network || true
	@echo "$(YELLOW)Copying env files...$(RESET)"
	@cp .env.example .env
	@echo "$(YELLOW)Building containers...$(RESET)"
	@docker compose up -d --build
	@echo "$(YELLOW)Installing backend dependencies...$(RESET)"
	@docker compose exec app composer install
	@echo "$(YELLOW)Generating app key...$(RESET)"
	@docker compose exec app php artisan key:generate --ansi
	@echo "$(YELLOW)Setting up permissions...$(RESET)"
	@docker compose exec app chmod -R 777 storage bootstrap/cache
	@echo "$(YELLOW)Setting up database...$(RESET)"
	@${MAKE} migrate

up start:
	@echo "$(YELLOW)Starting containers...$(RESET)"
	@docker compose up -d

stop:
	@echo "$(YELLOW)Stopping containers...$(RESET)"
	@docker compose stop

down:
	@echo "$(YELLOW)Stopping containers [DOWN]...$(RESET)"
	@docker compose down -v

ps status:
	@echo "$(YELLOW)Containers:$(RESET)"
	@docker compose ps

restart:
	@echo "$(YELLOW)Restarting containers...$(RESET)"
	@docker compose restart

migrate:
	@echo "$(YELLOW)Setting up database...$(RESET)"
	@docker compose exec app php artisan migrate:refresh --seed

test:
	@echo "$(YELLOW)Running tests...$(RESET)"
	@docker compose exec app php artisan test

clear-logs:
	@echo "$(YELLOW)Clearing logs...$(RESET)"
	@rm -rf storage/logs/*.log

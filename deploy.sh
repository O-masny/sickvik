#!/bin/bash

ENV=$1

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[1;36m'
NC='\033[0m' # No Color

# Kontrola docker daemonu
if ! docker info > /dev/null 2>&1; then
  echo -e "${RED}❌ Docker není spuštěný. Spusť Docker Desktop a zkus to znovu.${NC}"
  exit 1
fi

if [[ -z "$ENV" ]]; then
  echo -e "${YELLOW}Použití: ./deploy.sh [dev|prod]${NC}"
  exit 1
fi

COMPOSE_FILES="-f docker-compose.yml -f docker-compose.${ENV}.yml"

case $ENV in
  dev)
    echo -e "${GREEN}🔧 Spouštím vývojové prostředí...${NC}"

    if [[ ! -f .env.development ]]; then
      echo -e "${RED}❌ Chybí .env.development soubor.${NC}"
      exit 1
    fi

    cp .env.development .env
    docker compose $COMPOSE_FILES up --build &

    sleep 3
    echo -e "${CYAN}🌐 Projekt by měl být dostupný na:${NC} ${GREEN}http://localhost${NC}"

    echo -e "${CYAN}📦 Běžící služby:${NC}"
    docker compose $COMPOSE_FILES ps

    echo -e "${CYAN}🧪 Testuji přístupnost aplikace:${NC}"
    curl -I http://localhost 2>/dev/null | head -n 1 || echo -e "${RED}❌ Nelze se připojit k aplikaci.${NC}"
    ;;
  
  prod)
    echo -e "${GREEN}🚀 Spouštím produkční prostředí...${NC}"

    if [[ ! -f .env.production ]]; then
      echo -e "${RED}❌ Chybí .env.production soubor.${NC}"
      exit 1
    fi

    cp .env.production .env
    docker compose $COMPOSE_FILES up -d --build

    echo -e "${GREEN}🧹 Laravel cache optimalizace...${NC}"
    docker compose $COMPOSE_FILES exec app php artisan config:clear
    docker compose $COMPOSE_FILES exec app php artisan route:clear
    docker compose $COMPOSE_FILES exec app php artisan view:clear
    docker compose $COMPOSE_FILES exec app php artisan config:cache
    docker compose $COMPOSE_FILES exec app php artisan route:cache
    docker compose $COMPOSE_FILES exec app php artisan view:cache

    SERVER_IP=$(hostname -I | awk '{print $1}')
    echo -e "${CYAN}🌐 Produkce by měla běžet na:${NC} ${GREEN}http://${SERVER_IP}${NC}"

    echo -e "${CYAN}📦 Stav kontejnerů:${NC}"
    docker compose $COMPOSE_FILES ps

    echo -e "${CYAN}🧪 Testuji dostupnost aplikace:${NC}"
    curl -I http://$SERVER_IP 2>/dev/null | head -n 1 || echo -e "${RED}❌ Nelze se připojit k aplikaci.${NC}"
    ;;

  *)
    echo -e "${RED}❌ Neplatná volba: $ENV (použij 'dev' nebo 'prod')${NC}"
    exit 1
    ;;
esac

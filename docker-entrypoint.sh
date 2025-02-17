#!/bin/bash
set -e

# Attendre que la base de données soit prête (ajustez l'URL selon votre configuration)
until php bin/console doctrine:query:sql "SELECT 1" > /dev/null 2>&1; do
  echo "Waiting for database to be ready..."
  sleep 2
done

# Exécuter les migrations
php bin/console doctrine:migrations:migrate --no-interaction

# Exécuter la commande originale (CMD)
exec "$@"

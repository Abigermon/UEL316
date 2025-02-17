#!/bin/bash
set -e

# Attendre que la base de données soit prête
until php bin/console doctrine:query:sql "SELECT 1" > /dev/null 2>&1; do
  echo "Waiting for database to be ready..."
  sleep 2
done

# Mettre à jour le schéma de manière sûre
php bin/console doctrine:schema:update --force

# Exécuter la commande originale (CMD)
exec "$@"

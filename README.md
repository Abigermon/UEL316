# 📚 UE L316 - Diversification des langages


## 🎯 Description du Cours
UE L316 est un module dédié à la diversification des langages de programmation, permettant aux étudiants d'explorer différents paradigmes et approches de programmation.

## 💻 Installation et Configuration

1. **Cloner le repository**
```bash
git clone [URL_du_repository]
```

2. **Installer les dépendances**
```bash
composer install
npm install  
```

3. **Configuration de la base de donnée**
   
Chacun doit configurer sa base de données locale, si votre configuration MySQL est différente
adaptée l'URL en fonction des identifiants et de vos paramètres de connexion.
Dans le fichier .env, il faudra donc modifier  :
DATABASE_URL="mysql://nodejs:nodejs@127.0.0.1:3306/UE316"

Ensuite, exécuter ces commandes pour créer et configurer la base de données :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. **Démarrer le serveur**
```bash
symfony server:start
```

# Livre d'Or

Le projet Livre d'Or est une application PHP simple permettant aux utilisateurs de laisser des commentaires. Ce projet utilise PHP et MySQL pour la gestion des données.

Pour configurer votre environnement de développement local, suivez les étapes ci-dessous.
- Serveur web Apache
- PHP version 7.x ou supérieure
- MySQL/MariaDB
- phpMyAdmin pour gérer la base de données via l'interface web (facultatif)

### Installation

1. Clonez le dépôt Git sur votre machine locale 
2. Accédez au répertoire du projet cloné.
3. Copiez `config.example.php` en `config.php`
4. Ouvrez `config.php` avec votre éditeur de texte favori et remplacez les valeurs par défaut par vos informations de connexion à la base de données MySQL.

### Configuration de la base de données

1. Ouvrez phpMyAdmin dans votre navigateur et connectez-vous.

2. Créez une nouvelle base de données appelée `livreor`.

3. Importez le schéma de la base de données à partir du fichier `.sql` fourni dans le répertoire du projet.

### Démarrage de l'application

1. Lancez WAMP, MAMP ou XAMPP et démarrez les services Apache et MySQL.

2. Placez le dossier du projet dans le répertoire `www` de WAMP, `htdocs` de MAMP ou XAMPP.

3. Ouvrez votre navigateur et accédez à l'application via `http://localhost/chemin_vers_le_projet/`.


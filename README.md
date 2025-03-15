# Gestion d'une École Primaire - Application Laravel

Ce projet est une application web développée avec **Laravel** pour la gestion d'une école primaire. Il permet de gérer les élèves, les enseignants, les classes, les matières, les notes, les paiements, et bien plus encore.

## Fonctionnalités principales

- **Gestion des élèves** : Ajout, modification, suppression et consultation des informations des élèves.
- **Gestion des enseignants** : Ajout, modification, suppression et consultation des informations des enseignants.
- **Gestion des classes** : Création et gestion des classes.
- **Gestion des matières** : Ajout et gestion des matières enseignées.
- **Gestion des notes** : Saisie et consultation des notes des élèves.
- **Gestion des paiements** : Suivi des paiements des frais scolaires.
- **Rapports** : Génération de rapports sur les élèves, les enseignants, les classes, etc.

---

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **PHP** (version 8.0 ou supérieure)
- **Composer** (pour gérer les dépendances PHP)
- **Node.js** et **npm** (pour gérer les dépendances JavaScript)
- **Git** (pour cloner le dépôt)
- **Base de données** (MySQL, PostgreSQL, SQLite, etc.)

---

## Étapes d'installation et configuration

### 1. Cloner le dépôt

Clonez le dépôt GitHub sur votre machine locale :

```bash
git clone https://github.com/token60/gestionnaire-_ecole_primaires-.git
cd gestion-ecole-primaire


### Résumé des commandes regroupées

Voici un résumé de toutes les commandes à exécuter après avoir cloné le projet :

```bash
# Cloner le dépôt
git clone https://github.com/token60/gestionnaire-_ecole_primaires-.git
cd gestionnaire-_ecole_primaires-

# Installer les dépendances Composer
composer install

# Installer les dépendances npm
npm install

# Configurer le fichier .env
cp .env.example .env
php artisan key:generate

# Configurer la base de données dans .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nom_de_la_base
# DB_USERNAME=root
# DB_PASSWORD=

# Exécuter les migrations
php artisan migrate

# (Optionnel) Exécuter les seeders
php artisan db:seed

# Compiler les assets
npm run dev

# Lancer le serveur de développement
php artisan serve
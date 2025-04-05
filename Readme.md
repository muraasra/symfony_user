

---

# Projet Symfony - Gestion des Utilisateurs

Ce projet est une application web développée avec Symfony 7, permettant la gestion des utilisateurs à travers un système complet d’authentification et un CRUD, avec une interface utilisateur stylisée en Bootstrap 5.


---

## Fonctionnalités

Inscription d'un nouvel utilisateur avec :

Email

Mot de passe sécurisé

Prénom

Numéro de téléphone

Adresse

Rôle (Admin ou User)

Photo de profil

Statut vérifié


Connexion et déconnexion avec gestion de sessions

Redirection automatique vers la page de login à l’accueil (/)

Liste des utilisateurs visible après connexion

CRUD complet (Créer, Lire, Modifier, Supprimer) sur les utilisateurs

Design responsive basé sur Bootstrap 5



---

## Technologies utilisées

Symfony 7

Doctrine ORM

Twig

Bootstrap 5

MySQL

Formulaire Symfony

Authentification Symfony Security



---

## Installation

1. Cloner le projet


git clone https://github.com/votre-utilisateur/votre-projet.git
cd votre-projet

2. Installer les dépendances



composer install

3. Configurer la base de données



Dans .env ou .env.local, configure votre URL de base de données :

DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_de_la_base"

4. Créer la base et les tables



php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

5. Lancer le serveur Symfony



symfony server:start


---

Accès

Page d'accueil : redirige vers /login

Inscription : /register

Connexion : /login

Liste utilisateurs (après connexion) : /user



---

Structure du code

src/Form/RegistrationFormType.php : formulaire d’inscription personnalisé

templates/registration/register.html.twig : interface d’inscription responsive

templates/security/login.html.twig : interface de connexion stylisée

src/Controller/ : contient tous les contrôleurs (HomeController, RegistrationController, SecurityController, UserController)



---

Personnalisation

Les rôles sont définis dans le formulaire (ROLE_ADMIN, ROLE_USER)

Les images sont uploadées avec validation sur le type et la taille

Le champ isVerified peut être géré automatiquement si nécessaire



---

Contributions

Les contributions sont les bienvenues ! Veuillez cloner le projet, créer une branche, proposer vos modifications via une pull request.


---

Licence

Ce projet est libre d'utilisation à des fins éducatives ou personnelles.


---

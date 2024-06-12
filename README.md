# rendu-docker-evaluation-j-fabien

# README

## Table des Matières
1. [Qu’est-ce qu’un conteneur ?](#quest-ce-quun-conteneur)
2. [Est-ce que Docker a inventé les conteneurs Linux ?](#est-ce-que-docker-a-inventé-les-conteneurs-linux)
3. [Pourquoi est-ce que Docker est particulièrement pensé et adapté pour la conteneurisation de processus sans états (fichiers, base de données, etc.) ?](#pourquoi-est-ce-que-docker-est-particulièrement-pensé-et-adapté-pour-la-conteneurisation-de-processus-sans-états-fichiers-base-de-données-etc)
4. [Quel artefact distribue-t-on et déploie-t-on dans le workflow de Docker ?](#quel-artefact-distribue-t-on-et-déploie-t-on-dans-le-workflow-de-docker)
5. [Quelle est la différence entre les commandes docker run et docker exec ?](#quelle-est-la-différence-entre-les-commandes-docker-run-et-docker-exec)
6. [Peut-on lancer des processus supplémentaires dans un même conteneur docker en cours d’exécution ?](#peut-on-lancer-des-processus-supplémentaires-dans-un-même-conteneur-docker-en-cours-dexécution)
7. [Pourquoi est-il fortement recommandé d’utiliser un tag précis d’une image et de ne pas utiliser le tag latest dans un projet Docker ?](#pourquoi-est-il-fortement-recommandé-dutiliser-un-tag-précis-dune-image-et-de-ne-pas-utiliser-le-tag-latest-dans-un-projet-docker)
8. [Décrire le résultat de cette commande : docker run -d -p 9001:80 --name my-php -v"$PWD":/var/www/html php:7.2-apache](#décrire-le-résultat-de-cette-commande--docker-run--d--p-900180---name-my-php--vPWDvarwwwhtml-php72-apache)
9. [Avec quelle commande docker peut-on arrêter tous les conteneurs ?](#avec-quelle-commande-docker-peut-on-arrêter-tous-les-conteneurs)
10. [Quelles précautions doit-on prendre pour construire une image afin de la garder de petite taille et faciliter sa reconstruction ?](#quelles-précautions-doit-on-prendre-pour-construire-une-image-afin-de-la-garder-de-petite-taille-et-faciliter-sa-reconstruction)
11. [Lorsqu’un conteneur s’arrête, tout ce qu’il a pu écrire sur le disque ou en mémoire est perdu. Vrai ou faux ? Pourquoi ?](#lorsquun-conteneur-sarrête-tout-ce-quil-a-pu-écrire-sur-le-disque-ou-en-mémoire-est-perdu-vrai-ou-faux--pourquoi)
12. [Lorsqu’une image est créée, elle ne peut plus être modifiée. Vrai ou faux ?](#lorsquune-image-est-créée-elle-ne-peut-plus-être-modifiée-vrai-ou-faux)
13. [Comment peut-on publier et obtenir facilement des images ?](#comment-peut-on-publier-et-obtenir-facilement-des-images)
14. [Comment s’appelle l’image de plus petite taille possible ? Que contient-elle ?](#comment-sappelle-limage-de-plus-petite-taille-possible--que-contient-elle)
15. [Par quel moyen le client docker communique avec le serveur docker ?](#par-quel-moyen-le-client-docker-communique-avec-le-serveur-docker)
16. [Un conteneur doit lancer un processus par défaut que l’on pourra override à l’exécution. Quelle commande faut-il utiliser pour lancer ce processus : CMD ou ENTRYPOINT ?](#un-conteneur-doit-lancer-un-processus-par-défaut-que-lon-pourra-override-à-lexécution--quelle-commande-faut-il-utiliser-pour-lancer-ce-processus--cmd-ou-entrypoint)

### Qu’est-ce qu’un conteneur ?
Un conteneur Docker est un conteneur exécutable populaire, léger et autonome, qui comprend tous les éléments nécessaires pour exécuter une application, notamment les bibliothèques, les outils système, le code et le runtime.

### Est-ce que Docker a inventé les conteneurs Linux ?
Non, les conteneurs Linux existaient bien avant la création de Docker. Docker a cependant popularisé et simplifié l'utilisation des conteneurs en les rendant plus accessibles et faciles à utiliser.

#### Qu’a apporté Docker à cette technologie ?
Docker a apporté plusieurs améliorations et innovations à l'écosystème Linux en rendant la technologie des conteneurs plus accessible, performante et largement adoptée.

### Pourquoi est-ce que Docker est particulièrement pensé et adapté pour la conteneurisation de processus sans états (fichiers, base de données, etc.) ?
Docker permet de lancer un système tiers de manière isolée, de déployer différents services et fichiers, et d'effectuer des opérations puis de tout supprimer lorsque ce n'est plus nécessaire.

### Quel artefact distribue-t-on et déploie-t-on dans le workflow de Docker ?
Dans le workflow de Docker, l'artefact distribué et déployé est l'image Docker.

#### Quelles propriétés désirables doit-il avoir ?
Les propriétés désirables sont :
- Portabilité
- Reproductibilité
- Légèreté
- Sécurité
- Automatisation
- Gestion des Dépendances
- Versionnage

### Quelle est la différence entre les commandes docker run et docker exec ?
- `docker run` est utilisée pour créer et démarrer un nouveau conteneur Docker à partir d'une image Docker spécifiée.
- `docker exec` est utilisée pour exécuter une commande à l'intérieur d'un conteneur Docker qui est déjà en cours d'exécution.

### Peut-on lancer des processus supplémentaires dans un même conteneur docker en cours d’exécution ?
Oui, il est possible de lancer des processus supplémentaires dans un conteneur Docker en cours d'exécution en utilisant la commande `docker exec`.

### Pourquoi est-il fortement recommandé d’utiliser un tag précis d’une image et de ne pas utiliser le tag latest dans un projet Docker ?
Il est fortement recommandé d'utiliser un tag précis d'une image Docker plutôt que le tag "latest" pour plusieurs raisons importantes :
- Stabilité et Fiabilité
- Reproductibilité
- Gestion des Versions
- Sécurité
- Déploiements Cohérents
- Communication et Transparence

### Décrire le résultat de cette commande : docker run -d -p 9001:80 --name my-php -v"$PWD":/var/www/html php:7.2-apache
Cette commande crée un nouveau conteneur Docker basé sur l'image PHP avec Apache, lance Apache en arrière-plan, expose le port 80 du conteneur sur le port 9001 de l'hôte, attribue un nom au conteneur, et monte le répertoire de travail actuel sur le répertoire `/var/www/html` à l'intérieur du conteneur.

### Avec quelle commande docker peut-on arrêter tous les conteneurs ?
La commande pour arrêter tous les conteneurs est : `docker stop $(docker ps -q)`

### Quelles précautions doit-on prendre pour construire une image afin de la garder de petite taille et faciliter sa reconstruction ?
Pour construire une image Docker de petite taille et faciliter sa reconstruction, il faut :
- Utiliser des images de base légères
- Minimiser le nombre de couches
- Utiliser `.dockerignore`
- Nettoyer après chaque étape
- Limiter les dépendances
- Utiliser l'optimisation des couches
- Compresser les fichiers

### Lorsqu’un conteneur s’arrête, tout ce qu’il a pu écrire sur le disque ou en mémoire est perdu. Vrai ou faux ? Pourquoi ?
Faux. Lorsqu'un conteneur s'arrête, tout ce qu'il a écrit sur le disque n'est pas nécessairement perdu. Cela dépend de la manière dont le conteneur a été configuré et de la gestion des données à l'intérieur du conteneur.

### Lorsqu’une image est créée, elle ne peut plus être modifiée. Vrai ou faux ?
Faux.

### Comment peut-on publier et obtenir facilement des images ?
Il faut utiliser un registre Docker.

### Comment s’appelle l’image de plus petite taille possible ? Que contient-elle ?
L'image Docker de plus petite taille est Alpine Linux. C’est une distribution Linux légère qui est conçue pour être simple, petite et sécurisée.

### Par quel moyen le client docker communique avec le serveur docker ?
Le client Docker communique avec le serveur Docker via une API RESTful.

#### Est-il possible de communiquer avec le serveur via le protocole HTTP ? Pourquoi ?
Oui, il est possible de communiquer avec le serveur Docker via le protocole HTTP, car Docker expose son API via des endpoints HTTP. Cela permet aux clients Docker de communiquer avec le serveur Docker à l'aide de requêtes HTTP standard.

### Un conteneur doit lancer un processus par défaut que l’on pourra override à l’exécution. Quelle commande faut-il utiliser pour lancer ce processus : CMD ou ENTRYPOINT ?
Il faut utiliser `ENTRYPOINT` car il définit la commande de base à exécuter lors du démarrage du conteneur. Mais contrairement à `CMD`, il permet également de remplacer entièrement la commande par défaut lors du démarrage du conteneur en fournissant des arguments supplémentaires.



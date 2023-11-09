# Learnaudit API

Une api RESTFUL qui se base sur le bundle **api-platform** pour délivrer les routes nécessaires à la construction du projet Learnaudit

## Installation
Cloner le repo puis exécuter les commandes suivantes à la racine du projet: 
```
docker compose build --no-cache
```
puis
```
docker compose up -d
```

Vous devriez voir apparaître les images suivantes dans docker :<br>
&#x1F7E2; learnaudit-api-app<br>
&#x1F7E2; postgres:15-alpine

Vous n'avez plus qu'à tester les routes listées à l'adresse :<br>
http://localhost:8080/api
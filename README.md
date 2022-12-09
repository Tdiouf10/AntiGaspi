Cloner le référentiel GitHub pour ce projet localement

https://github.com/Tdiouf10/AntiGaspi.git

Ensuite entre se mettre à la racine du projet : cd AntiGaspi

Installer les dépendances Composer :
    
    composer install
    
Installer les dépendances NPM :

    npm install ou yarn install
    
Créez une copie de votre fichier .env :

    cp .env.example .env

Générez une clé de chiffrement d'application :

    php artisan key:generate

Créer une base de données vide pour notre application :


Dans le fichier .env, ajoutez les informations de la base de données pour permettre à Laravel de se connecter à la base de données :

    Nous voudrons autoriser Laravel à se connecter à la base de données que vous venez de créer à l'étape précédente. Pour ce faire, nous devons ajouter les informations  d'identification de connexion dans le fichier .env et Laravel gérera la connexion à partir de là.

    Dans le fichier .env, remplissez les options DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAMEet DB_PASSWORDpour correspondre aux informations d'identification de la base de données que vous venez de créer. Cela nous permettra d'exécuter des migrations et d'amorcer la base de données à l'étape suivante.
    
Migrer la base de données :

    php artisan migrate
    
Et maintenant vous pouvez personnalisé le code ou rajouter des fonctionnalités

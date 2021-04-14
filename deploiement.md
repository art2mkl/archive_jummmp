# Deploiement du site avec Heroku et Always Data

Nous souhaitons un hébergement sur heroku qui a l'avantage d'être moderne, permet un déploiement continu via git, est gratuit et de n'impose pas de limite de temps par projet comme platform.sh (limité à 7 jours) ou comme symfony cloud peuvent le faire.

Heroku permet également d'héberger sa base de données mais elle doit être en PostgreSQL et notre base de données est en mySQL. Nous avons donc recours à une autre service pour l'hébergement de la base de données.

## `Always Data pour l'hébergement de la base de données`

On se rend sur le site <https://www.alwaysdata.com/fr> où on créé un compte gratuit. Dans le menu de gauche, dans la catégorie bases de données, on clique sur MySQL. On clique sur ajouter une base de données que l'on nomme par exemple : **swann-martin_jummmp**.
On clique ensuite sur le lien utilisateurs pour créér un utlilisateur de la base de donnée à qui on attribue tous les droits sur notre base de donnée. On attribue un mot de passe de connexion.

Une fois cela fait on note les informations de connexion (indiquées sur le site) qui vont permettre à notre application de se connecter à la bdd:

- nom d'hôte ici : **mysql-swann-martin.alwaysdata.net**
- nom d'utilisateur (que l'on vient de créer)
- mot de passe (que l'on vient de créer)
- la version du serveur de la bdd utilisée par alwaysdata (aller prendre ces informations sur phpmyAdmin) ici c'est **mariadb-10.5.8**

Dans vs code les informations sont à insérer dans notre fichier .env de notre appli symfony.

> DATABASE_URL="mysql://**nomdelutilisateur**:**motdepassetrèsfort**@**mysql-swann-martin.alwaysdata.net**:3306/jummmp?serverVersion=**mariadb-10.5.8**"

Il faut également remplacer le paragraphe dbal dans `config/packages/doctrine.yaml` , sinon lorsque heroku va essayer de se connecter à la base de donnée cela risque de ne pas fonctionner car normalement git ignore le document .env lors du push.

```
doctrine:
    dbal:
        override_url: true
        url: '%env(resolve:DATABASE_URL)%'
        # IMPORTANT: You MUST configure your server version,
        # either here or in the DATABASE_URL env var (see .env file)
        #server_version: '13'
```

Par

```
doctrine:
    dbal:
        # configure these for your database server
        driver: 'pdo_mysql'
        server_version: '10.5.8' #la version du serveur mariadb que nous avons sur alwaysdata
        charset: utf8mb4
        default_table_options:
            charset: utf8mb4
            collate: utf8mb4_unicode_ci
        url: '%env(resolve:DATABASE_URL)%'
```

## `Heroku pour le déploiement de l'application Symfony`

### Installer Heroku

On se rend sur le site <https://www.heroku.com/> où on créé un compte gratuit. Ensuite on install Heroku CLI <https://devcenter.heroku.com/articles/heroku-cli#download-and-install> qui permet d'utiliser heroku dans la console. Un fois installé on ouvre une console et on tape :

```
heroku login

```

Cela ouvre une fenêtre dans votre navigateur firefox, chrome ou autre qui vous permet de vous authentifier. On clique et on est bon. Dans la console un message vous dira

### Déployer Heroku

On se rend dans le fichier de notre application symfony et il suffit de suivre les instructions d'heroku <https://devcenter.heroku.com/articles/deploying-symfony4>

```
cd jummmp

heroku create

```

Le repo heroku est créé. On peut vérifier en tapant dans la console.

```
git branch -v
```

On créé le procfile ensuite dans notre appli pour directement en insérant ces lignes dans la console

```
echo 'web: heroku-php-apache2 public/' > Procfile

git add Procfile

git commit -m "Heroku Procfile"

```

On configure notre branche master de l'appli en mode PRODUCTION

```
heroku config:set APP_ENV=prod

```

On ajoute ajax packages pour créer un fichier .htacces à notre appli symfony pour et permettre la réécriture des urls et pouvoir naviguer entre les pages de notre appli;

```
composer require symfony/apache-pack

git add composer.json composer.lock symfony.lock public/.htaccess

git commit -m "apache-pack"


```

On déploie en utilisant git :

```
git push heroku master

```

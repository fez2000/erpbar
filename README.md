# erpbar
erp pour la gestion d'un bar
## get project
```sh
  $ git clone https://github.com/fez2000/erpbar.git
```
## start laravrel server
pour lancer le server laravel vous devez
* installer les dependances
```sh 
  $ cd commerce
  $ composer install
  $ npm i
```
* creer le fichier .env
```sh
  $ mv .env.example .env
  $ nano .env
```
puis ajouter l'app key `APP_KEY=base64:le3ZfyBm1XvICvHmefuzAf9PGyI/8+ieUSmC1ueUjVA=`
```sh
  $ php artisan serve
```
### start workflow server
vous devez installer `laravel-echo-server` globalement 
```sh
  $ npm install -g laravel-echo-server
```
puis le lancer
```sh
  $ laravel-echo-server start
```

# erpbar
erp pour la gestion d'un bar
## start laravrel server
pour lancer le server laravel vous devez
* installer les dependances
```sh 
  $ composer install
  $ npm i
```
* creer le fichier .env
```sh
  $ cd commerce
  $ mv .env.example .env
  $ nano .env
```
puis ajouter l'app key `APP_KEY=base64:le3ZfyBm1XvICvHmefuzAf9PGyI/8+ieUSmC1ueUjVA=`
```sh
  $ php artisan serve
```

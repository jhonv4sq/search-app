# Search App

## Descripción.
Este proyecto es un buscador que permite a los usuarios realizar búsquedas a través de una interfaz simple y conectarse a la API de Wikipedia para obtener resultados relevantes, además también permite consultar el historial de búsquedas realizada, este se registra en una base de datos sql.

------------

## Instrucciones de Instalación.

### 1.  Inicia tu servidor de xampp o wampserver.
### 2.  Declara tus variables de entorno.
Al clonar el proyecto el archivo **.env** ya tiene unas variables de entorno default útiles **xampp** o **wampserver**. 
```php
APP_NAME=search_app

API_URI='https://en.wikipedia.org/w/api.php?'

DB_NAME=
DB_HOST=
DB_USER=
DB_PASSWORD=
```
### 3. Instalar dependencias de proyecto.
Se esta haciendo uso de la librería **phpdotenv** para poder declarar variables de entorno 
```bash
composer install
```
### 4. crea la base de datos ejecutando el siguiente script de PHP.
```bash
php install_db.php
```
### 5. Inicia el localhost.
```bash
php -S localhost:8000
```

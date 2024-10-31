# TO-DO List

Proyecto de implementación de Laravel, VueJS y Buefy.

Las dependencias se pueden consultar así:

- `Backend` _composer.json_

- `Frontend` _package.json_

## Preparación de entorno:

1. Crear la base de datos:
   
   ```sql
   CREATE SCHEMA IF NOT EXISTS `todo_list_db` DEFAULT CHARACTER SET utf8;
   ```

2. Agregar las credenciales de la base de datos al archivo _.env_
   
   ```vim
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=todo_list_db
   DB_USERNAME=usuario_db
   DB_PASSWORD=password_db
   ```
   
   > Dado que el archivo _.env_ no se versiona, se puede realizar una copia a partir del archivo _.env.example_. Esta información aparecerá comentada y direccionada al uso de _sqlite_. 

3. Instalar dependencias Frontend y Backend:
   
   ```bash
   composer install
   ```
   
   ```bash
   npm install
   ```
   
   > Para la primera vez se usa _install_ y para posteriores usos _update_

4. Configurar la URL de acceso correcta al proyecto local, para ello se debe modificar el archivo _.env_:
   
   ```vim
   APP_URL=http://localhost/todo-list/public/
   ```

5. Uso de sesión y caché, modificar el arhchivo _.env_ para definir el uso de sesión en archivo, ya que no lo estamos usando
   
   ```vim
   SESSION_DRIVER=file
   CACHE_STORE=file
   ```

6. Generar el API_KEY para el proyecto:

   ```bash
   php artisan key:generate
   ```

   > La API_KEY se generará automaticamente en el archivo _.env_

7. Ejecutar migraciones y seeds: Esto permitirá crear las tablas de la base de datos definidas en el proyecto:
   
   ```bash
   php artisan migrate:fresh --seed
   ```

## Base de datos

La base de datos cuenta con una sola tabla llamada _`tasks`_, la cual contine los campos:

- `id`

- `name`

- `updated_at`

- `created_at`

Es una estructura simple para este ejemplo. Se ha definido un modelo para esta respectiva tabla, la cual se creó con el comando:

```bash
php artisan make:model Task
```

> Este comoando no es necesario ejecutarlo, solo se indica cómo se crea. El modelo se creará en el directorio `app/Models`

A su vez, se ha creado una migración para la tabla utilizando el comando:

```bash
php artisan make:migration create_tasks_table
```

La migración se creará en el directorio `database/migrations` (No es necesario ejecutar el comando, solo es para guía), el nombre del archivo y ruta `database/migrations/2024_10_18_204614_create_tasks_table.php`. Este archivo en si, contiene la estructura de la tabla, por esta razón en el punto 6 se indica la ejecución de las migraciones, aunque la instalación base de laravel genera unas migraciones por defecto, la única que nos interesa y, que estamos usando, es la migración `create_tasks_table`.

Por otro lado, se han creado unos datos como demo para minar la base de datos, esto se conoce en Laravel como seeders. Estos se crean con el comando:

```bash
php artisan create:seeder TasksSeeder
```

Este comando generó el archivo `database/seeders/TasksSeeder.php` que contiene algunos datos de prueba. Este comando no es necesario volver a ejecutarlo, ya que se usa una sola vez para crear el archivo, de igual manera, tal y como se indicó en el punto 6, el comando utiliza este seeder para la creación de la tabla.

## Backend

Del lado del Backend, a parte de considerar las indicaciones e información de la base de datos, es importante tener presente:

- **Modelo de datos**: La tabla `tasks` se define en el archivo `app/Models/Task.php

- **Controlador**: La clase `TaskController` se define en el archivo `app/Http/Controllers/TaskController.php`, 
  este controlador es el que se encarga de la respuesta de las peticiones HTTP que se le dan al servidor. Los controladores 
  se crean con el comando:
  
  ```bash
  php artisan make:controller TaskController
  ```

- **Ruta**: La ruta `/tasks` se define en el archivo `routes/web.php` las cuales corresponden a los endpoints de la API.

## Frontend

Su estructura parte de:

1. Tenemos un Layout definido en `resources/views/layouts/main.blade.php`, esto permite tener un archivo o estructura como templete que se reutilice en otras vistas.

2. La vista principal del proyecto es `resources/views/app.blade.php` la cual es definda en el archivo `routes/web.php` para la ruta raíz
   
   ```php
   Route::get('/', function () {
       return view('app');
   })->name('home');
   ```

3. El componente principal, root o padre del proyecto es `resources/js/componentes/MainAppComponent.js` el cual es definido dentro de la vista principal `app.blade.php`. A su vez, este componente se encarga de llamar o utilizar los componentes:
- `ListTasksComponent`

- `AddTaskComponent`

## Pinia Store

El proyecto usa Pinia para manejar de manera global los textos con sus respectivas traducciones a ES y EN; de igual manera comparte las URLs para los EndPoints necesarios. Los archivos correspondientes están ubicados en `resources/js/stores/` en donde tenemos _texts.js_ y _urls.js_ los cuales se construyen desde `resources/config/shared-variables/main.php`, archivo que es llamado en la vista principal (`app.blade.php`) de la aplicación y que envía la información al MainAppComponent para inicializar Pinia.

## Conclusión

El proyecto es sencillo y solo se encarga de listar y agregar tareas, pero tiene la estrucuta general para usar VueJS, Buefy y Pinia, todo bajo el entorno de Laravel. Se puede complementar agregando las funcionalidades restantes para el CRUD de las tareas, así como agregar la validación del nombre de la tarea, agregar la tarea con la tecla enter, entre otras.

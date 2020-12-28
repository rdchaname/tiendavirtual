# Proyecto Tienda Virtual Ceti

<p>Proyecto de grupos de tiendas virtuales de CETI</p>

## Pasos para desplegar proyecto

<p>Seguir los siguientes pasos</p>

### Paso 01: Instalar dependencias

```
composer install
```

### Paso 02: Copiar archivo .env.example y crear archivo .env. Indicar los parametros de conexión a base de datos

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Paso 03: Generar Key de la aplicación

```
php artisan key:generate
```

### Paso 04: Ejecutar migraciones

```
php artisan migrate
```

### Paso 05: Ejecutar seeders

```
php artisan db:seed
```

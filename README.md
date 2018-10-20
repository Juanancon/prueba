# Prueba en Codeigniter

Un proyecto de prueba en Codeigniter.

Este proyecto tiene una parte de registro y login de usuarios y otra con un CRUD de licitaciones, contratos y facturas; donde una licitación puede tener varios contratos y un contrato varias facturas.

## Instalación

```
Para instalar la aplicación con los datos de prueba ya incluidos tendremos que descomprimir el archivo dentro de donde se encuentre nuestra carpeta raíz del servidor local. Una vez hecho esto y asegurándonos de que la raíz del proyecto sea `pruebaENREDA` el resto es sencillo, sólo tendremos que acceder a la ruta http://localhost/pruebaENREDA/install/ o cualquiera donde se ejecute nuestro servidor local e ingresar nuestras credenciales en el instalador
```
IMPORTANTEE: La base de datos ha de llamarse `prueba`
```

```
Tenemos un usuario creado para probar la app: ADMINISTRADOR - 1234 aunque la aplicación permite registrar nuevos usuarios


### Prerequisitos

Necesita tener instalado la versión de PHP 5.3.7 en adelante y MySQL (5.1+) via  mysql


### Estructura de carpetas

La funcionalidad principal se encuentra en las carpeta application, divididas en modelos, vistas, controladores y utilerías varias, haciendo uso del paradigma MVC.

### Estructura de tablas

![alt text](https://raw.githubusercontent.com/Juanancon/prueba/master/tablas.png)

## Desarrollado con

* [Visual Studio Code](https://code.visualstudio.com/) - 
* [Codeigniter 3.1.9](https://codeigniter.com/) - 
* [Instalador](https://github.com/mikecrittenden/codeigniter-installer) - 


## Autor

* **Juan Antonio Núñez Conde** (https://github.com/Juanancon)

## Licencia

This project is licensed under the MIT License 

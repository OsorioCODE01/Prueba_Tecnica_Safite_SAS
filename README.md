
# PRUEBA TECNICA  PARA SAFITE SAS

Esta es un una prueba tecnicna realizada para al empresa Safite SAS, fue desarrollado en php con laravel como framework, a vista general se desarrollo un pequeño api con algunos endpoints que fueron solicitados, los archivos de interes se listan a continuación:



## CARPETAS DE INTERES

- **app**: Contiene los controladores y modelos para Usuarios y Ventas
- **database**: Contiene las migraciones para construir las tablas en la base de datos
- **Routes**: Contiene los endpoints del api



## Endpoints usuarios

#### Consultar todos los usuarios o un usuario en concreto

```http
  GET [LOCAL-URL]/api/usuarios
```
```http
  GET [LOCAL-URL]/api/usuarios/[id]
```
#### Parametros de url
| Parametro | Tipo    | Descripcion                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | necesario en la url para una consulta especifica de usuario. |

#### Crear nuevo usuario

```http
  POST [LOCAL-URL]/api/usuarios
```

#### Campos del body JSON
| item | Tipo    | Descripcion                |
| :-------- | :------- | :------------------------- |
| `nombre` | `string` | nombre dle usuario. |
|`telefono`|`string`|Numero de telefono del usuario|
|`email`|`string` | Correo electronico del usuario|

#### Actualizar un usuario

```http
  PUT [LOCAL-URL]/api/usuarios
```

#### Campos del body JSON
| item | Tipo    | Descripcion                |
| :-------- | :------- | :------------------------- |
| `nombre` | `string` | nombre dle usuario. |
|`telefono`|`string`|Numero de telefono del usuario|
|`email`|`string` | Correo electronico del usuario|

#### Eliminar un usuario
```http
  DELETE [LOCAL-URL]/api/usuarios/[id]
```
#### Parametros de url
| Parametro | Tipo    | Descripcion                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | necesario para elimnar un usuario de la base de datos. |



## Endpoints ventas

#### Consultar todas las ventas

```http
  GET [LOCAL-URL]/api/ventas
```

#### Registrar una nueva venta

```http
  POST [LOCAL-URL]/api/ventas
```

#### Campos del body JSON
| item | Tipo    | Descripcion                |
| :-------- | :------- | :------------------------- |
| `id_vendedor` | `numeric` | Id del usuario que realizo la venta. |
|`referencia_factura`|`string`|Codigo de referencia de la factura|
|`valor`|`string` | Valor de la venta|


## Consultas SQL solciitadas

#### Consultas con alias tabla users
![App Screenshot](https://i.ibb.co/p1rsdGn/imagen-2024-11-21-104925244.png)

#### Consultas con alias tabla ventas
![App Screenshot](https://i.ibb.co/QmvSt4Y/imagen-2024-11-21-105303162.png)

#### Consulta de usuarios con Ventas
![App Screenshot](https://i.ibb.co/q1CYYHC/imagen-2024-11-21-111032601.png)

#### Consulta de ventas en general
![App Screenshot](https://i.ibb.co/7RkwTPr/imagen-2024-11-21-111138295.png)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre el proyecto

Este sistema permitirá a los colaboradores de la empresa registrar incidencias para que el equipo de TI pueda darle seguimiento y resolverlas de manera eficiente.

Además, el sistema gestionará un registro de los equipos de cómputo de la empresa y llevará una bitácora de mantenimientos para cada uno de ellos.

También se incluirá la capacidad de mostrar el desempeño del equipo de TI a través de gráficos, proporcionando una visualización clara y detallada de su rendimiento.

## Detalles 

Esta versión inicial fue desarrollada utilizando Laravel como herramienta principal del lado del servidor, con el apoyo de Livewire para una integración dinámica y eficiente. Para las interacciones en el cliente, se empleó Alpine.js, lo que permitió añadir interactividad sin necesidad de realizar numerosas peticiones al servidor.

## Mejorar a futuro

Entre las mejoras planificadas para el sistema se encuentran:

Notificaciones por Correo: Implementar un sistema de notificaciones por correo electrónico para informar a los colaboradores con perfil de soporte cuando se les asigne un nuevo ticket. Esto asegurará que los asignados reciban actualizaciones oportunas sobre sus tareas.

Tareas Programadas (Cron Jobs): Crear un cron job que se ejecute periódicamente para verificar si hay mantenimientos pendientes. Esto ayudará a gestionar de manera eficiente las tareas de mantenimiento y asegurará que no se omita ninguna.

Filtrado de Reportes: Modificar el módulo de reportes para que los usuarios con perfil de soporte solo puedan ver los reportes que tengan asignados. Esto permitirá una gestión más centrada y organizada de los reportes y tareas asignadas.



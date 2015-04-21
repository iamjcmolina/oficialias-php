SISTEMA DE CONTROL DE OFICIALIAS

El objetivo de este proyecto es aprender las tecnicas de desarrollo de 
aplicaciones web con php desde cero, asi como tambien el uso de las principales 
herramientas y recursos que nos ayudan durante el desarrollo.

En el mundo del desarrollo de aplicaciones, siempre existen muchas formas de
solucionar los problemas que se presentan, por lo que la toma de decisiones
en este proyecto no deben ser consideradas como unicas o las mejores.

Los patrones arquitectonicos y de diseño a usar en este proyecto no estan
pensados para ser desarrollados exhaustivamente, sino unicamente para identificar la idea
clave de su uso.

En este ejemplo se utilizara una base de datos mysql con las siguientes tablas y campos:
* region (id, clave, nombre)
* municipio (id, clave, nombre, region_id)
* oficialia (id, clave, nombre, municipio_id)
* usuario (id, nombre, apellido_paterno, apellido_materno, email, password)

Se proporciona el archivo data/create-database.sql para crear dicha 
base de datos con algunos datos de ejemplo.

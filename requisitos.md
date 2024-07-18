Trabajando en el modulo de inventarios submodulo equipos

- Crear la migracion de equipos [x]
- Crear el modelo de equipos [x]
- Crear la relación entre equipos y usuarios 1:1, un usuario tiene un equipo y un equipo le pertenece a un usuario [x]
- Crear factory de equipos[x]
- Debo de mostrar en una tabla todos los equipos que existen en el sistema [x]
- Vamos a poder crear nuevos [x]
- Editar la información de los que ya existen [x]
- Cambiar su estatus [x]
- Ver a que usuario está asignado [x]
- Añadir un buscador donde se pueda filtrar los equipos por numero de serial [x]
- Al mostrar el detalle del equipo debemos mostrar el usuario al que esta asignado junto con su departamento, modelo, ip y estatus [x]
- Agregar validación en la cual el número de serial o la IP no esté asignada en otro equipo.[x] 
- Mostrar en el submodulo de equipos en el select de usuarios, solo aquellos usuarios que no tengan un equipo asignado. [x]



# Agregar mejorar al modulo de Reportes 
- Al asignar el reporte a un usuario de sistemas, no debo de actualizar la pagina, que todo se haga por medio de 
reactividad con livewire [x]


#  Trabajar en el submodulo de mantenimientos 

- Debo ir creando mantenimientos a los cuales se los debo de asignar a un usuario 
- 

Actividades 

Crear Migracion de mantenimientos y relacionarla con la tabla equipos [x]
Crear modelo mantenimientos y relacionarlo con el modelo mantenimientos [x]
Crear controlador [x]
Crear componentes en livewire [x]



# Perfiles y permisos 
En el sistema van a existir 4 tipos de usuarios: Soporte, Administrativos, Gerencia, Administradores

Los usuarios con perfil de administrativos solo tendran acceso al modulo de usuarios
Los usuarios con perfil de Administrativos tendran acceso al modulo de usuarios y estadisticas
Los usuarios con perfil de Soporte, tendrán acceso al modulo de Usuarios, Reportes, Inventario, Estadisticas
Los usuarios con perfil de Administradores tendran acceso a todos los Modulos


# Coches Docker
Este proyecto se trata de una aplicación web sobre coches alojada en un conjunto de servicios corriendo en contenedores Docker. Mediante docker-compose podemos definir un grupo de servicios que se ejecuten a la vez de manera  coordinada, basándose cada servicio en una imagen Docker. En concreto, este sistema está basado en una arquitectura Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose.
# Instrucciones para desplegar el proyecto:
Introduce el siguiente comando para construir la imagen web:
```
$ docker build -t="web" .  # si la imagen no está construida
```
Introduce el siguiente comando para iniciar los contenedores:
```
$ docker-compose up 
```
Para parar los servicios, en otra terminal:
```
$ docker-compose down
```
Una vez iniciado los servicios deberían funcionar las siguientes urls:
* Para visitar la web: http://localhost:81
* Para añadir los datos necesarios: http://localhost:8890 (Tal y como lo hemos definido en docker-compose.yml, usuario “admin”, password “test”). Haz click en “database” y luego en “import”, desde donde elegimos el archivo SGSSI/databaseWeb.sql

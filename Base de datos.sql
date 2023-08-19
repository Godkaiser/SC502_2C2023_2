CREATE SCHEMA SC502_2C2023_G2 ;
use SC502_2C2023_G2;

create user 'admin@%' identified by 'Clave';

CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_id INT NOT NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,		
    email VARCHAR(20),
    telefono VARCHAR(20),
    contrasena VARCHAR(15) NOT NULL

);
 
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10 , 2 ) NOT NULL
);

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    servicio_id INT NOT NULL,
    fecha DATETIME NOT NULL,
    hora TIME NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE Servicios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Servicio VARCHAR(50) NOT NULL,
    descripcion_servicio VARCHAR(200) NOT NULL,
    ImagenSer   LONGBLOB    
);

 -- Agregar foreign key a la tabla "login"
ALTER TABLE login
ADD FOREIGN KEY (user_id) REFERENCES clientes(id) ON DELETE CASCADE;

-- Agregar foreign key a la tabla "citas" para la columna "cliente_id"
ALTER TABLE citas
ADD FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE;

-- Agregar foreign key a la tabla "citas" para la columna "servicio_id"
ALTER TABLE citas
ADD FOREIGN KEY (servicio_id) REFERENCES Servicios(id) ON DELETE CASCADE;

-- Agregar foreign key a la tabla "empleados"
ALTER TABLE empleados
ADD FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE;
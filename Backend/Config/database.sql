CREATE DATABASE alquiartemis;
USE alquiartemis;


CREATE TABLE empleados(
    empleadoId INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50)
);

CREATE TABLE productos(
    productoId INT PRIMARY KEY AUTO_INCREMENT,
    nombreProducto VARCHAR(50),
    precio INT
);

CREATE TABLE clientes(
    clienteId INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    telefono VARCHAR(50),
    productoId INT,
    fecha DATE,
    hora VARCHAR(50),
    Foreign Key (productoId) REFERENCES productos(productoId)
    );

CREATE TABLE cotizacion(
    cotizacionId INT PRIMARY KEY AUTO_INCREMENT,
    productoId INT,
    clienteId INT,
    empleadoId INT,
    fecha DATE,
    hora VARCHAR(50),
    duracion VARCHAR(50),
    total INT,
    Foreign Key (productoId) REFERENCES productos(productoId),
    Foreign Key (empleadoId) REFERENCES empleados(empleadoId),
    Foreign Key (clienteId) REFERENCES clientes(clienteId)
);
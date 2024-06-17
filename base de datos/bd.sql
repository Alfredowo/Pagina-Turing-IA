CREATE DATABASE turing;
USE turing;

CREATE TABLE users(
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   nombre VARCHAR(50) NOT NULL UNIQUE,
   password  VARCHAR(255) NOT NULL,
   permisos ENUM('admin','user') NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   active BOOLEAN NOT NULL DEFAULT TRUE;
);

CREATE TABLE categorias (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   nombre VARCHAR(50) NOT NULL UNIQUE,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE productos (
   id INT AUTO_INCREMENT PRIMARY KEY,
   fkcategoria INT NOT NULL,
   FOREIGN KEY (fkcategoria) REFERENCES categorias(id),
   nombre VARCHAR(50) NOT NULL,
   precio DECIMAL(10, 2) NOT NULL,
   descripcion TEXT,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE ventas (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   fkusuario INT NOT NULL,
   FOREIGN KEY (fkusuario) REFERENCES users(id),
   fkproducto INT NOT NULL,
   FOREIGN KEY (fkproducto) REFERENCES productos(id),
   cantidad DOUBLE NOT NULL,
   fecha DATE NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE VIEW vista_ventas AS
SELECT 
   u.nombre AS usuario,	
   p.nombre AS producto,
   v.cantidad,
   v.fecha,
   (v.cantidad * p.precio) AS total
FROM 
   ventas v
JOIN 
   users u ON v.fkusuario = u.id
JOIN 
   productos p ON v.fkproducto = p.id;

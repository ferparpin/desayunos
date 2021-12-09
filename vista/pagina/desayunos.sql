CREATE DATABASE if not EXISTS desayunos;

delimiter ;

use desayunos;

CREATE TABLE usuario(
    id_usuario int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50),
    apellido varchar(50),
    telefono int,
    correo varchar(100),
    residencia varchar(100),
    rol int
);
CREATE TABLE registro(
    id_registro int PRIMARY KEY AUTO_INCREMENT,
    fecha datetime,
    descripcion varchar(250),
    fk_usuario int);
CREATE TABLE cliente(
    id_cliente int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50),
    apellido varchar(50),
    telfono int,
    correo varchar(50),
    residencia varchar(60));
CREATE TABLE pedido(
    id_pedido int PRIMARY KEY AUTO_INCREMENT,
    total int,
    id_cliente int,
    fecha_de_entrega date);
CREATE TABLE calendario(
    id_calendario int PRIMARY KEY AUTO_INCREMENT,
    descripcion varchar(250),
    fecha_inicio date,
    fecha_fin date,
	fk_pedido int);
CREATE TABLE pedido_producto(
    id_pedido int,
    id_producto int,
    cantidad int,
    estado boolean,
    PRIMARY KEY(id_pedido,id_producto));
CREATE TABLE producto(
    id_producto int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50),
    precio int,
    stock int,
    descripcion varchar(250),
    estado boolean,
    imagen varchar(200),
    id_categoria int);
CREATE TABLE categoria(
    id_categoria int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50));
CREATE TABLE producto_insumos(
    id_producto int,
    id_insumo int,
    cantidad int,
    PRIMARY KEY(id_producto,id_insumo));
CREATE TABLE insumos(
    id_insumo int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50),
    precio int,
    descripcion varchar(250),
    unidad varchar(4),
    estado boolean); 
CREATE TABLE proveedores_insumos(
    id_proveedor int,
    id_insumo int,
    PRIMARY KEY (id_proveedor,id_insumo));
CREATE TABLE proveedores(
    id_proveedor int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50),
    apellido varchar(50),
    telefono int,
    correo varchar(100),
    estado boolean);
    
ALTER TABLE registro
    ADD CONSTRAINT `fk_registros` FOREIGN KEY (fk_usuario)
        REFERENCES usuario(id_usuario);
ALTER TABLE pedido
    ADD CONSTRAINT `fk_pedido` FOREIGN KEY (id_cliente)
        REFERENCES cliente(id_cliente);
ALTER TABLE calendario
    ADD CONSTRAINT `fk_calendario` FOREIGN KEY (fk_pedido)
        REFERENCES pedido(id_pedido);
ALTER TABLE pedido_producto
    ADD CONSTRAINT `fk_id_pedido_producto` FOREIGN KEY (id_pedido)
        REFERENCES pedido(id_pedido);
ALTER TABLE pedido_producto
    ADD CONSTRAINT `fk_id_pedido_producto2` FOREIGN KEY (id_producto)
        REFERENCES producto(id_producto);
ALTER TABLE producto
    ADD CONSTRAINT `fk_producto` FOREIGN KEY (id_categoria)
        REFERENCES categoria(id_categoria);


ALTER TABLE producto_insumos
    ADD CONSTRAINT `fk_producto_insumos` FOREIGN KEY (id_producto)
        REFERENCES producto(id_producto),
    ADD CONSTRAINT `fk_producto_insumos2` FOREIGN KEY (id_insumo)
        REFERENCES insumos(id_insumo);


ALTER TABLE proveedores_insumos 
	ADD CONSTRAINT `fk_proveedores_insumos` FOREIGN KEY (id_insumo) 
		REFERENCES insumos(id_insumo), 
	ADD CONSTRAINT `fk_proveedores_insumos2` FOREIGN KEY (id_proveedor) 
		REFERENCES proveedores(id_proveedor);



DROP DATABASE IF EXISTS tiendaperu;
CREATE DATABASE tiendaperu;

USE tiendaperu;

CREATE TABLE productos
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  clasificacion ENUM('Equipo', 'Accesorio', 'Consumible') NOT NULL,
  marca         VARCHAR(30)   NOT NULL,
  descripcion   VARCHAR(100)  NOT NULL,
  garantia      TINYINT       NOT NULL DEFAULT 12,
  ingreso       DATE          NOT NULL,
  cantidad      SMALLINT      NOT NULL,
  created       DATETIME      NOT NULL DEFAULT NOW() COMMENT 'Campo calculado fecha y hora',
  updated       DATETIME      NULL COMMENT 'Se agrega al detectar un cambio'
)ENGINE = INNODB;

INSERT INTO productos 
  (clasificacion, marca, descripcion, garantia, ingreso, cantidad) VALUES
  ('Equipo', 'Epson', 'Impresora L200', 24, '2025-10-05', 10),
  ('Accesorio', 'Logitech', 'Teclado USB negro', 12, '2025-11-01', 20),
  ('Consumible', 'Canon', 'Pixma 190 Yellow', 6, '2025-09-10', 5);

SELECT * FROM productos;

SELECT
  id, clasificacion, marca, descripcion, garantia, ingreso, cantidad
  FROM productos
  ORDER BY id DESC;

CREATE TABLE proveedores
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  rsocial   VARCHAR(150) NOT NULL,
  ruc       CHAR (11) NULL,
  telef     CHAR(9) NULL,
  origen    ENUM('N','E') DEFAULT 'N',
  contacto  VARCHAR(50) NOT NULL,
  confianza tinyint NOT NULL DEFAULT 1,
  created   DATETIME NOT NULL DEFAULT NOW(),
  updated   DATETIME NULL
)ENGINE = INNODB;

INSERT INTO proveedores
  (rsocial, ruc, telef, origen, contacto, confianza) VALUES
  ('Logitech','','912345678','E','Carlos Martínez', 4),
  ('Compusur','11111111111','918888888','N', 'Rocío Guzmán', 4),
  ('Sercoplus','22222222222','','N', 'José Félix', 2);

  SELECT * FROM proveedores;

  SELECT
  id, rsocial, ruc, telef, origen, contacto, confianza
  FROM proveedores
  ORDER BY id DESC;
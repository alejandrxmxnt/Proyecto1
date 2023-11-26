# Host: localhost:3307  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2023-11-22 02:53:34
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoria"
#

CREATE TABLE `categoria` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/ACTIVO\n0/INACTIVO',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "categoria"
#

INSERT INTO `categoria` VALUES (1,'ALACENA','Armario con puertas y estantes que se usa para guardar alimentos o poner el menaje de cocina, generalmente en el hueco de una pared o aprovechando el ángulo interior formado por dos paredes.',0,'2023-10-15 23:33:04',NULL),(2,'APARADOR','Armario ancho de mediana altura y con cajones en el que se guarda todo lo necesario para el servicio de la mesa en el comedor.',0,'2023-10-15 23:33:45',NULL),(3,'ARMARIO','Mueble cerrado con puertas y, generalmente, con estantes, cajones y perchas para guardar ropa y otros objetos.',0,'2023-10-15 23:34:33',NULL),(4,'CÓMODA','Mueble ancho con cajones, de mediana altura, con un tablero horizontal en la parte superior suele estar en los dormitorios y se utiliza generalmente para guardar ropa.',0,'2023-10-15 23:35:39',NULL),(5,'ESTANTERÍA','Mueble formado por estantes en el que suelen ponerse libros y objetos decorativos.',0,'2023-10-15 23:39:57',NULL),(6,'COMEDORES','',1,'2023-10-24 01:00:01',NULL),(7,'JUEGO DE LINVING','',1,'2023-10-24 01:00:24',NULL),(8,'MUEBLES TV','',1,'2023-10-24 01:00:41',NULL),(9,'CAMAS','',1,'2023-10-24 01:00:50',NULL),(10,'ESCRITORIOS','',1,'2023-10-24 01:01:02',NULL),(11,'ROPERO','Los roperos son muebles imprescindibles para cualquier hogar. Estos muebles proporcionan un espacio de almacenamiento para la ropa y los accesorios, y mantienen todo organizado y fácilmente accesible.',1,'2023-11-10 02:55:01',NULL);

#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `primerApellido` varchar(50) DEFAULT NULL,
  `segundoApellido` varchar(50) DEFAULT NULL,
  `ciNit` varchar(45) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `razonSocial` varchar(300) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/ACTIVO\n0/INACTIVO',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,'Marcelo','Montero','','9878654','77657851','','',1,'2023-10-15 23:22:55',NULL),(2,'Miriam','Soliz','','12325671','','','',1,'2023-10-15 23:25:18',NULL),(3,'Marcela','Rojas','Rojas','34567754','','','',1,'2023-10-15 23:27:23',NULL),(4,'Carlos','Montaño','','93561285','76578734','','',1,'2023-10-15 23:28:24',NULL),(5,'Eduardo','Aguirre','Saavedra','9434770','67541840','','',1,'2023-10-15 23:29:46',NULL),(6,'Jesus','Ramirez','','9756887','76545611','','',1,'2023-10-21 20:20:21',NULL),(7,'Pablo','Lara','','56743001','','','',0,'2023-10-24 02:59:07',NULL),(8,'Jose Antonio','Montero','','8934225','','','',1,'2023-10-24 05:26:03',NULL),(9,'','Monteros','','12345678','','','',1,'2023-10-24 16:11:11',NULL),(10,'Briza','Bolaños','','9444125','67421515','','',1,'2023-10-31 04:11:35',NULL),(11,'Joel Jose','Mamani','','84567246','','','',1,'2023-11-04 22:34:17',NULL),(12,'','Gonzales ','','asdf','','','',0,'2023-11-04 22:39:51',NULL),(13,'ñaño','Morales','','9993451','','','',1,'2023-11-04 23:34:16',NULL),(14,'','Aguirre','','1344544-L','','','',1,'2023-11-04 23:45:31',NULL),(15,'Garabito','Bolaños','','9448833','','','',1,'2023-11-10 02:19:33',NULL),(16,'','','','ANONIMO','','','',1,'2023-11-10 02:23:31',NULL),(17,'Bruno','Montero','Soliz','8485741','','','',1,'2023-11-10 04:14:23',NULL),(18,'','Vallejos','','12347853','','','',1,'2023-11-10 16:10:17',NULL),(19,'Juan','Perez','','9483550','','','SATURNINO',1,'2023-11-10 20:53:48',NULL),(20,'Pamela','Echeverria','Tordoya','12456581','','','',1,'2023-11-20 01:02:21',NULL);

#
# Structure for table "producto"
#

CREATE TABLE `producto` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(6000) DEFAULT NULL,
  `precioUnitario` decimal(18,2) NOT NULL,
  `stock` tinyint(4) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/ACTIVO\n0/INACTIVO',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idCategoria` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria_idx` (`idCategoria`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

#
# Data for table "producto"
#

INSERT INTO `producto` VALUES (1,'Deuba 2x Estanterías de Madera 5 niveles de almacenamiento librería 135,5x58x27cm carga por nivel 10Kg para cocina zapatos','Ponga orden en su hogar con la estantería de madera  »Öland«!\r\nEl Set de 2 estanterías de madera, le garantizará mayor orden y espacio en sus ambientes. \r\nLa práctica estantería tiene un diseño moderno y simple, y está hecha de madera esmaltada con finas vetas. La estantería ofrece mucho espacio de almacenamiento, gracias a sus 5 estables estantes.\r\nAdemás, el mueble organizador es multiuso, ya que se puede utilizar en distintos ambientes, ya sea en el cuarto de baño, en el dormitorio, en la sala o en el garage. \r\nLa construcción especial de madera, con puntales cruzados garantiza una alta estabilidad y es fácil de cuidar.',150.00,1,'','1.jpg',0,'2023-10-15 23:54:01',NULL,NULL),(2,'ARMARIO','',100.00,1,'','2.jpg',0,'2023-10-17 19:19:16',NULL,NULL),(3,'Comedor Luxor','Mesa rectangular de roble con capacidad para 10 sillas. Su diseño robusto y elegante la convierte en el centro perfecto para reuniones familiares o cenas con amigos. La durabilidad de la madera de roble garantiza una superficie resistente para colocar vajilla y decoraciones. Adaptable a diferentes configuraciones de asientos, es ideal para eventos íntimos o reuniones más grandes. Un toque atemporal para cualquier espacio.',22000.00,0,'','3.jpg',1,'2023-10-24 01:07:08',NULL,6),(4,'Comedor Riga','La mesa rectangular, confeccionada en madera de roble, presenta una estética elegante y duradera. Su diseño espacioso ofrece capacidad para 8 sillas, creando el entorno perfecto para cenas en familia o encuentros con amigos. La madera de roble, conocida por su resistencia, asegura una superficie robusta y atractiva. Con líneas limpias y una estructura sólida, esta mesa se adapta a diversos estilos decorativos, añadiendo un toque de calidez y sofisticación a cualquier espacio.',15500.00,2,'','4.jpg',1,'2023-10-24 01:09:45',NULL,6),(5,'Comedor Verona','Mesa circular de madera de roble y mara.\r\ncantidad de sillas 6.',11900.00,0,'','5.jpg',1,'2023-10-24 01:11:02',NULL,6),(6,'Escritorio ','madera mara',2700.00,3,'AA-02','6.jpg',1,'2023-11-07 17:25:38',NULL,10),(7,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de  6 sillas',13500.00,3,'',NULL,0,'2023-11-08 02:44:54',NULL,6),(8,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de  6 sillas',13500.00,3,'',NULL,0,'2023-11-08 02:46:34',NULL,6),(9,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de  6 sillas',13500.00,3,'',NULL,0,'2023-11-08 02:49:55',NULL,6),(10,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de  6 sillas',13500.00,3,'',NULL,0,'2023-11-08 02:51:03',NULL,6),(11,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de  6 sillas',13500.00,3,'',NULL,0,'2023-11-08 03:01:18',NULL,6),(12,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble con juego de 6 sillas',13500.00,3,'',NULL,0,'2023-11-08 03:09:22',NULL,6),(13,'Comedor Rotterdam','mesa circular, espaldar madera, madera roble, juego de 6 sillas',13500.00,3,'',NULL,0,'2023-11-08 03:12:24',NULL,6),(14,'Comedor Rotterdam','6 Sillas',13500.00,0,'','14.jpg',1,'2023-11-08 03:16:36',NULL,6),(15,'Escritorio minimalista','',4000.00,3,'',NULL,0,'2023-11-08 03:30:21',NULL,10),(16,'Escritorio minimalista','',4000.00,4,'',NULL,0,'2023-11-08 03:34:52',NULL,10),(17,'Escritorio minimalista','',4000.00,4,'',NULL,0,'2023-11-08 03:35:37',NULL,10),(18,'Escritorio minimalista\t','',4000.00,4,'',NULL,0,'2023-11-08 03:40:03',NULL,10),(19,'Escritorio minimalista\t','',4000.00,4,'',NULL,0,'2023-11-08 03:44:33',NULL,10),(20,'Escritorio minimalista\t','',4000.00,4,'',NULL,0,'2023-11-08 03:45:12',NULL,10),(21,'kjhgfd','',1000.00,3,'',NULL,0,'2023-11-08 03:54:37',NULL,8),(22,'kjhgfd','',1000.00,3,'',NULL,0,'2023-11-08 04:00:51',NULL,8),(23,'ASDFGHJK','',1000.00,2,'',NULL,0,'2023-11-08 04:02:57',NULL,NULL),(24,'OIUYTRE','',500.00,4,'',NULL,0,'2023-11-08 04:05:13',NULL,9),(25,'poiuytrkjhgf jhgfd','',1600.00,3,'',NULL,0,'2023-11-08 04:24:45',NULL,6),(26,'poiuytrkjhgf jhgfd','',1600.00,3,'',NULL,0,'2023-11-08 04:31:33',NULL,6),(27,'poiuytrkjhgf jhgfd','',1600.00,3,'','27.jpg',0,'2023-11-08 04:32:08',NULL,6),(28,'Living color verde','Mesa central\r\nSillón individual\r\nSillón 2.5',8600.00,4,'','28.jpg',1,'2023-11-08 04:41:30',NULL,7),(29,'Juego de Living - Giallo','Presentamos nuestro versátil conjunto de sala, que incluye un amplio sillón triple, un elegante sillón doble, un acogedor sillón individual, un práctico puf y una moderna mesa central. Con líneas contemporáneas y comodidad inigualable, este conjunto ofrece el equilibrio perfecto entre estilo y funcionalidad para transformar tu espacio de estar en un lugar acogedor y sofisticado.',11500.00,1,'','29.jpg',1,'2023-11-10 07:56:09',NULL,7),(30,'CAMA','3 plazas',1000.00,1,'','30.jpg',1,'2023-11-10 20:50:59',NULL,9),(31,'CAMA 2 Personas','',1500.00,5,'','31.jpg',1,'2023-11-19 03:40:56',NULL,9),(32,'PRUEBA','',41320.00,0,'',NULL,0,'2023-11-19 07:19:32',NULL,11);

#
# Structure for table "reserva"
#

CREATE TABLE `reserva` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` smallint(5) unsigned NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/RESERVA ACTIVA\n0/RESERVA INACTIVA - YA FINALIZADA',
  `fechaInicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaFin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_producto1_idx` (`idProducto`),
  CONSTRAINT `fk_reserva_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "reserva"
#


#
# Structure for table "usuario"
#

CREATE TABLE `usuario` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `ci` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL COMMENT 'ADMINISTRADOR.- acceso a todo el sistema\nINVITADO.- funciones limitadas',
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/ACTIVO\n0/INACTIVO',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,'Adrian','Montaño','Soliz','74358022','9483550','adralemont@gmail.com','Adrian9483','f5bc4943ba208da7bcdc0001bf75f8b4','ADMINISTRADOR',1,'2023-10-15 21:16:03',NULL),(2,'Adrian','Soliz','','76952743','94883551','amont9483@gmail.com','AdrSol88355','ea8a815fbcf8a4e417019d012c56984e','INVITADO',1,'2023-10-18 15:28:27',NULL),(3,'Carlos','Ramirez','','72456789','12546877','amont9483@gmail.com','CarRam54687','3add83f5dfdf1ab99800cdc826b0c1b2','INVITADO',1,'2023-10-28 07:56:59',NULL),(4,'Alejandra','Montaño','Montaño','72210102','9483551','adralemont@gmail.com','AleMon83551','8efea1db91931f44d9eac5194bde7e66','INVITADO',1,'2023-11-10 03:08:51',NULL),(5,'Susana','Soliz','Rojas','76342211','94234409','amont9483@gmail.com','SusSol23440','0a5b6cc7bd231ffdde17e30233c7a4b1','ADMINISTRADOR',0,'2023-11-14 00:39:55',NULL),(6,'Susana','Soliz','Montaño','44715452','9494941','adralemont@gmail.com','SusSol94941','403a9a7e6121f92c28b6839d719a2d07','ADMINISTRADOR',1,'2023-11-17 04:50:32',NULL);

#
# Structure for table "venta"
#

CREATE TABLE `venta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fechaVenta` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(18,2) DEFAULT NULL COMMENT 'TOTAL DE LA VENTA CON LA SUMA DE LOS IMPORTES AGREGADOS',
  `idUsuario` tinyint(3) unsigned NOT NULL,
  `idCliente` mediumint(8) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1/ VENTA ACTIVA\n0/ VENTA INACTIVA',
  PRIMARY KEY (`id`),
  KEY `fk_venta_usuario1_idx` (`idUsuario`),
  KEY `fk_venta_cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

#
# Data for table "venta"
#

INSERT INTO `venta` VALUES (1,'2023-10-16 15:35:28',150.00,1,1,1),(2,'2023-10-16 16:56:02',300.00,1,2,0),(3,'2023-10-16 19:09:28',150.00,1,3,0),(4,'2023-10-16 19:09:28',300.00,1,5,0),(5,'2023-10-17 18:02:06',270.00,1,4,0),(8,'2023-10-17 19:20:09',350.00,1,1,0),(9,'2023-10-17 19:32:49',350.00,1,2,0),(10,'2023-10-17 20:01:10',390.00,1,5,0),(11,'2023-10-18 18:30:50',150.00,2,3,1),(12,'2023-10-18 19:10:57',235.00,1,2,1),(13,'2023-10-18 19:11:41',1600.00,1,1,0),(14,'2023-10-18 20:13:13',100.00,1,3,0),(15,'2023-10-19 21:26:09',150.00,1,3,1),(16,'2023-10-21 20:20:58',270.00,1,6,1),(17,'2023-10-22 03:46:59',70.00,1,3,1),(18,'2023-10-24 02:59:50',48805.00,1,7,1),(19,'2023-10-24 05:26:53',48625.00,1,8,1),(20,'2023-10-24 06:03:41',49400.00,1,5,1),(21,'2023-10-24 06:06:36',37500.00,1,4,1),(22,'2023-10-24 06:07:34',37500.00,1,4,1),(23,'2023-10-24 06:08:03',39300.00,1,2,1),(24,'2023-10-24 06:08:44',22000.00,1,1,1),(25,'2023-10-24 06:09:18',11900.00,1,6,1),(26,'2023-10-24 06:13:16',11900.00,1,6,1),(27,'2023-10-24 06:13:48',37500.00,1,3,1),(28,'2023-10-24 06:16:48',11900.00,1,8,1),(29,'2023-10-24 06:18:17',11900.00,1,8,1),(30,'2023-10-24 06:22:21',37500.00,1,4,1),(31,'2023-10-24 06:24:24',37500.00,1,4,1),(32,'2023-10-24 06:24:40',11900.00,1,6,1),(33,'2023-10-24 06:25:57',37500.00,1,3,1),(34,'2023-10-24 06:27:08',15500.00,1,7,1),(35,'2023-10-24 06:31:06',22000.00,1,6,1),(36,'2023-10-24 16:11:54',37500.00,1,9,1),(37,'2023-10-24 16:16:47',23885.00,1,6,1),(38,'2023-10-24 17:31:01',37500.00,1,6,1),(39,'2023-10-24 17:33:31',11900.00,1,4,1),(40,'2023-10-26 17:35:19',11900.00,1,4,1),(41,'2023-10-26 19:10:28',54050.00,1,6,1),(42,'2023-10-26 21:15:46',139500.00,1,4,1),(43,'2023-10-28 08:14:02',4760.00,1,2,1),(44,'2023-10-28 08:17:44',7750.00,3,8,1),(45,'2023-10-30 00:03:08',10710.00,1,4,1),(46,'2023-10-31 04:03:13',11900.00,1,3,1),(47,'2023-10-31 04:20:55',10710.00,1,10,1),(48,'2023-10-31 19:38:23',27400.00,1,10,1),(49,'2023-11-05 04:30:03',22000.00,1,4,1),(50,'2023-11-05 04:36:23',22000.00,1,3,1),(51,'2023-11-05 05:42:26',22000.00,1,2,1),(52,'2023-11-06 15:33:43',15500.00,1,14,1),(53,'2023-11-07 01:25:11',15500.00,1,14,1),(54,'2023-11-07 02:05:13',59500.00,1,5,1),(55,'2023-11-07 02:11:15',22000.00,1,4,1),(56,'2023-11-07 02:12:17',37500.00,1,14,1),(58,'2023-11-07 04:14:57',19800.00,1,3,1),(59,'2023-11-07 04:43:50',60765.00,1,10,1),(60,'2023-11-07 05:17:06',22720.00,1,5,1),(61,'2023-11-07 17:37:31',2700.00,1,6,1),(62,'2023-11-07 17:48:56',22000.00,1,2,1),(63,'2023-11-08 01:21:53',26210.00,1,8,1),(64,'2023-11-08 04:42:56',20750.00,1,3,1),(65,'2023-11-08 07:59:56',15500.00,1,5,1),(66,'2023-11-08 22:49:46',8600.00,1,5,1),(67,'2023-11-08 23:00:06',13500.00,2,4,1),(68,'2023-11-09 04:24:46',57410.00,2,9,1),(69,'2023-11-09 05:54:26',13500.00,1,14,1),(70,'2023-11-09 05:55:30',2430.00,2,9,1),(71,'2023-11-10 01:52:42',9090.00,2,14,1),(72,'2023-11-10 01:57:53',11900.00,2,8,1),(73,'2023-11-10 02:21:14',23615.00,1,15,1),(74,'2023-11-10 02:24:58',27000.00,1,16,1),(86,'2023-11-10 04:15:10',7740.00,2,17,1),(87,'2023-11-10 08:01:16',48525.00,1,15,1),(88,'2023-11-10 08:06:27',11500.00,2,14,1),(89,'2023-11-10 16:08:55',35300.00,1,16,1),(90,'2023-11-10 16:10:56',11900.00,2,18,1),(91,'2023-11-10 20:57:28',40700.00,2,19,1),(92,'2023-11-14 01:33:23',15500.00,1,16,1),(93,'2023-11-16 19:30:13',0.00,1,5,1),(95,'2023-11-17 01:56:39',40780.00,1,4,1),(96,'2023-11-17 04:55:10',11900.00,6,3,1),(98,'2023-11-19 07:20:16',41320.00,1,1,1),(100,'2023-11-20 01:06:54',37310.00,1,20,1),(102,'2023-11-20 01:41:36',13500.00,2,16,1),(103,'2023-11-20 01:42:26',7500.00,2,16,1),(104,'2023-11-20 01:46:25',15500.00,2,16,1),(105,'2023-11-20 03:02:57',41100.00,1,16,1);

#
# Structure for table "detalleventa"
#

CREATE TABLE `detalleventa` (
  `descuento` decimal(5,2) DEFAULT NULL,
  `cantidad` smallint(6) NOT NULL,
  `importe` decimal(18,2) NOT NULL COMMENT 'monto a pagar por cada producto',
  `idVenta` mediumint(8) unsigned NOT NULL,
  `idProducto` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idVenta`,`idProducto`),
  KEY `fk_venta_has_producto_producto1_idx` (`idProducto`),
  KEY `fk_venta_has_producto_venta1_idx` (`idVenta`),
  CONSTRAINT `fk_venta_has_producto_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_has_producto_venta1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "detalleventa"
#

INSERT INTO `detalleventa` VALUES (0.00,1,150.00,1,1),(0.00,2,300.00,2,1),(0.00,1,4.00,3,1),(0.00,2,3.00,4,1),(10.00,2,5.00,5,1),(0.00,1,3.00,8,1),(0.00,2,5.00,8,2),(0.00,1,2.00,9,1),(0.00,2,3.00,9,2),(0.00,2,300.00,10,1),(10.00,1,90.00,10,2),(0.00,1,150.00,11,1),(10.00,1,135.00,12,1),(0.00,1,100.00,12,2),(0.00,10,1500.00,13,1),(0.00,1,100.00,13,2),(0.00,1,100.00,14,2),(0.00,1,150.00,15,1),(10.00,2,270.00,16,1),(30.00,1,70.00,17,2),(0.00,1,22000.00,18,3),(0.00,1,15500.00,18,4),(5.00,1,11305.00,18,5),(0.00,1,22000.00,19,3),(5.00,1,14725.00,19,4),(0.00,1,11900.00,19,5),(0.00,1,22000.00,20,3),(0.00,1,15500.00,20,4),(0.00,1,11900.00,20,5),(0.00,1,22000.00,21,3),(0.00,1,15500.00,21,4),(0.00,1,22000.00,22,3),(0.00,1,15500.00,22,4),(0.00,1,15500.00,23,4),(0.00,2,23800.00,23,5),(0.00,1,22000.00,24,3),(0.00,1,11900.00,25,5),(0.00,1,11900.00,26,5),(0.00,1,22000.00,27,3),(0.00,1,15500.00,27,4),(0.00,1,11900.00,28,5),(0.00,1,11900.00,29,5),(0.00,1,22000.00,30,3),(0.00,1,15500.00,30,4),(0.00,1,22000.00,31,3),(0.00,1,15500.00,31,4),(0.00,1,11900.00,32,5),(0.00,1,22000.00,33,3),(0.00,1,15500.00,33,4),(0.00,1,15500.00,34,4),(0.00,1,22000.00,35,3),(0.00,1,22000.00,36,3),(0.00,1,15500.00,36,4),(15.00,1,13175.00,37,4),(10.00,1,10710.00,37,5),(0.00,1,22000.00,38,3),(0.00,1,15500.00,38,4),(0.00,1,11900.00,39,5),(0.00,1,11900.00,40,5),(30.00,2,30800.00,41,3),(50.00,3,23250.00,41,4),(10.00,10,139500.00,42,4),(60.00,1,4760.00,43,5),(50.00,1,7750.00,44,4),(10.00,1,10710.00,45,5),(0.00,1,11900.00,46,5),(10.00,1,10710.00,47,5),(0.00,1,15500.00,48,4),(0.00,1,11900.00,48,5),(0.00,1,22000.00,49,3),(0.00,1,22000.00,50,3),(0.00,1,22000.00,51,3),(0.00,1,15500.00,52,4),(0.00,1,15500.00,53,4),(0.00,5,59500.00,54,5),(0.00,1,22000.00,55,3),(0.00,1,22000.00,56,3),(0.00,1,15500.00,56,4),(10.00,1,19800.00,58,3),(2.00,1,21560.00,59,3),(10.00,2,27900.00,59,4),(5.00,1,11305.00,59,5),(40.00,1,13200.00,60,3),(20.00,1,9520.00,60,5),(0.00,1,2700.00,61,6),(0.00,1,22000.00,62,3),(50.00,2,15500.00,63,4),(10.00,1,10710.00,63,5),(10.00,1,12150.00,64,14),(0.00,1,8600.00,64,28),(0.00,1,15500.00,65,4),(0.00,1,8600.00,66,28),(0.00,1,13500.00,67,14),(0.00,2,44000.00,68,3),(10.00,1,10710.00,68,5),(0.00,1,2700.00,68,6),(0.00,1,13500.00,69,14),(10.00,1,2430.00,70,6),(50.00,1,1350.00,71,6),(10.00,1,7740.00,71,28),(0.00,1,11900.00,72,5),(15.00,1,10115.00,73,5),(0.00,1,13500.00,73,14),(0.00,2,27000.00,74,14),(10.00,1,7740.00,86,28),(10.00,2,39600.00,87,3),(25.00,1,8925.00,87,5),(0.00,2,23000.00,88,29),(10.00,1,19800.00,89,3),(0.00,1,15500.00,89,4),(0.00,1,11900.00,90,5),(0.00,3,35700.00,91,5),(0.00,5,5000.00,91,30),(0.00,1,15500.00,92,4),(12.00,1,19360.00,95,3),(10.00,2,21420.00,95,5),(0.00,2,23800.00,96,5),(0.00,1,41320.00,98,32),(20.00,1,2160.00,100,6),(10.00,1,12150.00,100,14),(0.00,2,23000.00,100,29),(0.00,1,13500.00,102,14),(0.00,5,7500.00,103,31),(0.00,1,15500.00,104,4),(50.00,1,5950.00,105,5),(10.00,1,12150.00,105,14),(0.00,2,23000.00,105,29);

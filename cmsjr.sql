/*
SQLyog Ultimate v9.02 
MySQL - 5.0.45-community-nt-log : Database - cmsjr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin_auditoria` */

DROP TABLE IF EXISTS `admin_auditoria`;

CREATE TABLE `admin_auditoria` (
  `id_log` int(10) NOT NULL auto_increment,
  `fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  `usuario` int(10) NOT NULL default '0',
  `accion` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id_log`),
  UNIQUE KEY `llave_varios` (`fecha`,`usuario`,`accion`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `admin_auditoria` */

insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (1,'2012-09-08 17:32:34',1,'Ingresa al sistema');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (2,'2012-09-08 17:32:39',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (3,'2012-09-08 17:32:54',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (4,'2012-09-08 17:33:11',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (5,'2012-09-08 17:34:51',1,'Actualiza registro id: 9 en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (6,'2012-09-08 17:34:53',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (7,'2012-09-08 17:37:34',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (8,'2012-09-08 17:37:36',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (9,'2012-09-08 17:37:37',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (10,'2012-09-08 17:37:40',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (11,'2012-09-08 17:37:41',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (12,'2012-09-08 17:37:42',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (13,'2012-09-08 17:37:43',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (14,'2012-09-08 17:37:44',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (15,'2012-09-08 17:40:42',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (16,'2012-09-08 17:40:51',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (17,'2012-09-08 17:40:59',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (18,'2012-09-08 17:42:36',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (19,'2012-09-08 17:50:39',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (20,'2012-09-08 17:50:40',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (21,'2012-09-08 17:50:41',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (22,'2012-09-08 17:51:04',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (23,'2012-09-08 17:51:06',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (24,'2012-09-08 17:51:24',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (25,'2012-09-08 17:51:51',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (26,'2012-09-08 17:52:07',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (27,'2012-09-08 17:53:39',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (28,'2012-09-08 17:53:49',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (29,'2012-09-08 17:54:02',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (30,'2012-09-08 17:54:12',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (31,'2012-09-08 17:55:04',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (32,'2012-09-08 17:55:07',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (33,'2012-09-08 17:55:16',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (34,'2012-09-08 17:55:22',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (35,'2012-09-08 18:06:42',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (36,'2012-09-19 21:55:11',1,'Ingresa al sistema');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (37,'2012-09-19 21:58:56',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (38,'2012-09-19 21:59:05',1,'Consulta datos en contenido');
insert  into `admin_auditoria`(`id_log`,`fecha`,`usuario`,`accion`) values (39,'2012-09-19 22:01:43',1,'Sale del Sistema');

/*Table structure for table `admin_conf_tablas` */

DROP TABLE IF EXISTS `admin_conf_tablas`;

CREATE TABLE `admin_conf_tablas` (
  `id_conf_tabla` int(11) NOT NULL auto_increment,
  `tabla` varchar(50) default NULL,
  `condicion_consulta` varchar(200) default NULL,
  `total_filas_datos` int(11) default '0',
  `ruta_archivos` varchar(100) default NULL,
  `edicion_ajax` int(11) default '1',
  `creacion_ajax` int(11) default '1',
  `ordenar_por` varchar(100) default NULL,
  `orientacion` varchar(3) default NULL,
  PRIMARY KEY  (`id_conf_tabla`),
  UNIQUE KEY `tabla` (`tabla`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `admin_conf_tablas` */

insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (1,'contenido',NULL,0,NULL,1,1,NULL,NULL);
insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (2,'',NULL,0,NULL,1,1,NULL,NULL);
insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (3,'companias',NULL,0,NULL,1,1,NULL,NULL);
insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (4,'motoristas',NULL,0,NULL,1,1,NULL,NULL);
insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (5,'pilotos',NULL,0,NULL,1,1,NULL,NULL);
insert  into `admin_conf_tablas`(`id_conf_tabla`,`tabla`,`condicion_consulta`,`total_filas_datos`,`ruta_archivos`,`edicion_ajax`,`creacion_ajax`,`ordenar_por`,`orientacion`) values (6,'aseguradora',NULL,0,NULL,1,1,NULL,NULL);

/*Table structure for table `admin_estado` */

DROP TABLE IF EXISTS `admin_estado`;

CREATE TABLE `admin_estado` (
  `id_estado` int(3) NOT NULL,
  `estado` varchar(50) NOT NULL default '0',
  PRIMARY KEY  (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `admin_estado` */

insert  into `admin_estado`(`id_estado`,`estado`) values (1,'Si');
insert  into `admin_estado`(`id_estado`,`estado`) values (2,'No');

/*Table structure for table `admin_menu` */

DROP TABLE IF EXISTS `admin_menu`;

CREATE TABLE `admin_menu` (
  `id_tabla_menu` int(3) NOT NULL auto_increment,
  `nombre_tabla` varchar(80) NOT NULL default '',
  `descripcion` varchar(180) NOT NULL default '',
  `grupo` varchar(10) NOT NULL default '0',
  PRIMARY KEY  (`id_tabla_menu`),
  UNIQUE KEY `nombre_tabla` (`nombre_tabla`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin_menu` */

insert  into `admin_menu`(`id_tabla_menu`,`nombre_tabla`,`descripcion`,`grupo`) values (1,'contenido','Contenidos','1');
insert  into `admin_menu`(`id_tabla_menu`,`nombre_tabla`,`descripcion`,`grupo`) values (2,'paginas','Administrar paginas','2');

/*Table structure for table `admin_parametros` */

DROP TABLE IF EXISTS `admin_parametros`;

CREATE TABLE `admin_parametros` (
  `parametro` varchar(50) default NULL,
  `valor` varchar(200) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `admin_parametros` */

insert  into `admin_parametros`(`parametro`,`valor`) values ('tabla_rel_usuarios','');
insert  into `admin_parametros`(`parametro`,`valor`) values ('campo_rel_usuarios','');
insert  into `admin_parametros`(`parametro`,`valor`) values ('label_rel_usuarios','');
insert  into `admin_parametros`(`parametro`,`valor`) values ('where_order_rel_usuarios','');
insert  into `admin_parametros`(`parametro`,`valor`) values ('trabaja_perfiles_usuario','0');

/*Table structure for table `admin_perfiles` */

DROP TABLE IF EXISTS `admin_perfiles`;

CREATE TABLE `admin_perfiles` (
  `id_perfil` int(11) NOT NULL auto_increment,
  `perfil` varchar(70) NOT NULL default '',
  PRIMARY KEY  (`id_perfil`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `admin_perfiles` */

insert  into `admin_perfiles`(`id_perfil`,`perfil`) values (1,'Administrador');
insert  into `admin_perfiles`(`id_perfil`,`perfil`) values (2,'Contenidos');

/*Table structure for table `admin_permisos` */

DROP TABLE IF EXISTS `admin_permisos`;

CREATE TABLE `admin_permisos` (
  `id_permiso` int(11) NOT NULL auto_increment,
  `id_perfil` int(11) NOT NULL default '0',
  `nombre_tabla` varchar(150) NOT NULL default '',
  `id_tipo` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_permiso`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `admin_permisos` */

insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (1,1,'contenido',1);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (2,1,'contenido',2);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (3,1,'contenido',3);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (4,1,'contenido',4);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (5,1,'paginas',1);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (6,1,'paginas',2);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (7,1,'paginas',3);
insert  into `admin_permisos`(`id_permiso`,`id_perfil`,`nombre_tabla`,`id_tipo`) values (8,1,'paginas',4);

/*Table structure for table `admin_permisos_especiales` */

DROP TABLE IF EXISTS `admin_permisos_especiales`;

CREATE TABLE `admin_permisos_especiales` (
  `id_permiso` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) default NULL,
  PRIMARY KEY  (`id_permiso`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin_permisos_especiales` */

insert  into `admin_permisos_especiales`(`id_permiso`,`id_usuario`) values (1,0);
insert  into `admin_permisos_especiales`(`id_permiso`,`id_usuario`) values (2,0);

/*Table structure for table `admin_roles` */

DROP TABLE IF EXISTS `admin_roles`;

CREATE TABLE `admin_roles` (
  `id_rol` int(11) NOT NULL auto_increment,
  `rol` varchar(50) default NULL,
  `estado` int(11) default NULL,
  PRIMARY KEY  (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_roles` */

insert  into `admin_roles`(`id_rol`,`rol`,`estado`) values (1,'All',1);

/*Table structure for table `admin_tablas` */

DROP TABLE IF EXISTS `admin_tablas`;

CREATE TABLE `admin_tablas` (
  `id_tabla` int(3) NOT NULL auto_increment,
  `nombre_tabla` varchar(80) NOT NULL default '0',
  `nombre_campo` varchar(80) NOT NULL default '0',
  `campo_es_id` varchar(80) NOT NULL default '',
  `tipo_campo` varchar(80) NOT NULL default '',
  `tabla_relacion` varchar(80) default NULL,
  `alias_tabla_relacion` varchar(20) default NULL,
  `campo_relacion` varchar(80) default NULL,
  `campo_imprimir` varchar(80) default NULL,
  `condicion_select` varchar(200) default NULL,
  `validacion` int(3) unsigned default NULL,
  `tipo_validacion` varchar(80) default NULL,
  `tamano` int(3) unsigned default NULL,
  `longitud` int(3) unsigned default NULL,
  `mostrar` int(3) unsigned NOT NULL default '0',
  `rotulo` varchar(100) default NULL,
  `campo_confirmar` varchar(50) default NULL,
  `estado1` text,
  `estado2` text,
  `select_avaible` text,
  `condicion_avaible` text,
  `campo_condicion_avaible` text,
  `order_avaible` text,
  PRIMARY KEY  (`id_tabla`),
  KEY `id_tabla` (`id_tabla`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin_tablas` */

insert  into `admin_tablas`(`id_tabla`,`nombre_tabla`,`nombre_campo`,`campo_es_id`,`tipo_campo`,`tabla_relacion`,`alias_tabla_relacion`,`campo_relacion`,`campo_imprimir`,`condicion_select`,`validacion`,`tipo_validacion`,`tamano`,`longitud`,`mostrar`,`rotulo`,`campo_confirmar`,`estado1`,`estado2`,`select_avaible`,`condicion_avaible`,`campo_condicion_avaible`,`order_avaible`) values (1,'contenido','texto_contenido','0','textarea_editor','',NULL,'','','',1,NULL,40,5,0,'Contenido',NULL,'','',NULL,NULL,NULL,NULL);
insert  into `admin_tablas`(`id_tabla`,`nombre_tabla`,`nombre_campo`,`campo_es_id`,`tipo_campo`,`tabla_relacion`,`alias_tabla_relacion`,`campo_relacion`,`campo_imprimir`,`condicion_select`,`validacion`,`tipo_validacion`,`tamano`,`longitud`,`mostrar`,`rotulo`,`campo_confirmar`,`estado1`,`estado2`,`select_avaible`,`condicion_avaible`,`campo_condicion_avaible`,`order_avaible`) values (2,'contenido','fecha_actualizacion','0','fecha','',NULL,'','','',0,NULL,0,0,1,'Fecha Actualizacion',NULL,'','',NULL,NULL,NULL,NULL);
insert  into `admin_tablas`(`id_tabla`,`nombre_tabla`,`nombre_campo`,`campo_es_id`,`tipo_campo`,`tabla_relacion`,`alias_tabla_relacion`,`campo_relacion`,`campo_imprimir`,`condicion_select`,`validacion`,`tipo_validacion`,`tamano`,`longitud`,`mostrar`,`rotulo`,`campo_confirmar`,`estado1`,`estado2`,`select_avaible`,`condicion_avaible`,`campo_condicion_avaible`,`order_avaible`) values (3,'contenido','titulo','0','text','',NULL,'','','',1,NULL,30,30,1,'Titulo',NULL,'','',NULL,NULL,NULL,NULL);
insert  into `admin_tablas`(`id_tabla`,`nombre_tabla`,`nombre_campo`,`campo_es_id`,`tipo_campo`,`tabla_relacion`,`alias_tabla_relacion`,`campo_relacion`,`campo_imprimir`,`condicion_select`,`validacion`,`tipo_validacion`,`tamano`,`longitud`,`mostrar`,`rotulo`,`campo_confirmar`,`estado1`,`estado2`,`select_avaible`,`condicion_avaible`,`campo_condicion_avaible`,`order_avaible`) values (4,'contenido','id_contenido','1','autonumerico','',NULL,'','','',1,NULL,0,0,0,'Id',NULL,'','',NULL,NULL,NULL,NULL);
insert  into `admin_tablas`(`id_tabla`,`nombre_tabla`,`nombre_campo`,`campo_es_id`,`tipo_campo`,`tabla_relacion`,`alias_tabla_relacion`,`campo_relacion`,`campo_imprimir`,`condicion_select`,`validacion`,`tipo_validacion`,`tamano`,`longitud`,`mostrar`,`rotulo`,`campo_confirmar`,`estado1`,`estado2`,`select_avaible`,`condicion_avaible`,`campo_condicion_avaible`,`order_avaible`) values (5,'contenido','publicado','0','select','admin_estado',NULL,'id_estado','estado','',1,NULL,0,0,1,'Publicado',NULL,'','',NULL,NULL,NULL,NULL);

/*Table structure for table `admin_tipo_permiso` */

DROP TABLE IF EXISTS `admin_tipo_permiso`;

CREATE TABLE `admin_tipo_permiso` (
  `id_tipo` int(11) NOT NULL auto_increment,
  `nombre_tipo` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin_tipo_permiso` */

insert  into `admin_tipo_permiso`(`id_tipo`,`nombre_tipo`) values (1,'Insertar');
insert  into `admin_tipo_permiso`(`id_tipo`,`nombre_tipo`) values (2,'Eliminar');
insert  into `admin_tipo_permiso`(`id_tipo`,`nombre_tipo`) values (3,'Editar');
insert  into `admin_tipo_permiso`(`id_tipo`,`nombre_tipo`) values (4,'Consultar');

/*Table structure for table `admin_usuarios` */

DROP TABLE IF EXISTS `admin_usuarios`;

CREATE TABLE `admin_usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `id_perfil` int(11) NOT NULL default '0',
  `id_rol` int(11) default NULL,
  `id_tabla_relacion` int(11) default '0',
  `usuario` varchar(60) NOT NULL default '',
  `clave` varchar(60) NOT NULL default '',
  `nombre` varchar(70) default NULL,
  `apellido` varchar(70) default NULL,
  `email` varchar(80) default NULL,
  `intentos` int(11) default '0',
  `caducidad` date default NULL,
  `ingreso` int(11) NOT NULL default '0',
  `administrador` int(11) default '0',
  `estado` int(11) default '1',
  `sesion` varchar(50) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_usuarios` */

insert  into `admin_usuarios`(`id_usuario`,`id_perfil`,`id_rol`,`id_tabla_relacion`,`usuario`,`clave`,`nombre`,`apellido`,`email`,`intentos`,`caducidad`,`ingreso`,`administrador`,`estado`,`sesion`) values (1,1,0,0,'admin','mkkwU3LPS1tRo','Administrador','3134954231','contacto@contacto.com',-998,'2031-12-31',0,1,1,'b5886cc4e4feba1f8c73155053317eb1');

/*Table structure for table `app_languages` */

DROP TABLE IF EXISTS `app_languages`;

CREATE TABLE `app_languages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate latin1_general_ci NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  `code` varchar(20) collate latin1_general_ci NOT NULL default '',
  `shortcode` varchar(20) collate latin1_general_ci default NULL,
  `image` varchar(100) collate latin1_general_ci default NULL,
  `fallback_code` varchar(20) collate latin1_general_ci NOT NULL default '',
  `params` text collate latin1_general_ci NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `app_languages` */

insert  into `app_languages`(`id`,`name`,`active`,`code`,`shortcode`,`image`,`fallback_code`,`params`,`ordering`) values (1,'English (United Kingdom)',1,'en-GB','en','','','',1);
insert  into `app_languages`(`id`,`name`,`active`,`code`,`shortcode`,`image`,`fallback_code`,`params`,`ordering`) values (3,'Español (spanish formal Internacional)',1,'es-ES','es','','','',0);

/*Table structure for table `app_paginas` */

DROP TABLE IF EXISTS `app_paginas`;

CREATE TABLE `app_paginas` (
  `id_pagina` int(11) NOT NULL auto_increment,
  `alias` varchar(40) default NULL,
  `id_pagina_padre` varchar(20) default NULL,
  `nombre` varchar(50) default NULL,
  `titulo_html` varchar(100) default NULL,
  `id_tipo` varchar(80) default NULL,
  `oculto` tinyint(1) default '0',
  `aplica_menu` tinyint(1) default NULL,
  `imagen_menu` varchar(70) default NULL,
  `orden` int(11) default '0',
  `link_externo` varchar(100) default NULL,
  `target` varchar(20) default '_self',
  `ancho` int(11) default '0',
  `alto` int(11) default '0',
  `modulo` varchar(20) default NULL,
  `accion` varchar(20) default NULL,
  `id` varchar(20) default NULL,
  `requiere_logueo` tinyint(1) default NULL,
  `descripcion` text,
  `palabras_clave` text,
  `scripts_includes_ini` text,
  `scripts_includes_fin` text,
  `scripts_code_ini` text,
  `scripts_code_fin` text,
  PRIMARY KEY  (`id_pagina`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `app_paginas` */

insert  into `app_paginas`(`id_pagina`,`alias`,`id_pagina_padre`,`nombre`,`titulo_html`,`id_tipo`,`oculto`,`aplica_menu`,`imagen_menu`,`orden`,`link_externo`,`target`,`ancho`,`alto`,`modulo`,`accion`,`id`,`requiere_logueo`,`descripcion`,`palabras_clave`,`scripts_includes_ini`,`scripts_includes_fin`,`scripts_code_ini`,`scripts_code_fin`) values (1,'Inicio','0','Inicio','INICIO','contenido',-1,1,NULL,1,'','_self',0,0,'contenido','verContenido','8',-1,'pagina oficial de gcp','gcp, keywords, sitecms',NULL,NULL,NULL,NULL);
insert  into `app_paginas`(`id_pagina`,`alias`,`id_pagina_padre`,`nombre`,`titulo_html`,`id_tipo`,`oculto`,`aplica_menu`,`imagen_menu`,`orden`,`link_externo`,`target`,`ancho`,`alto`,`modulo`,`accion`,`id`,`requiere_logueo`,`descripcion`,`palabras_clave`,`scripts_includes_ini`,`scripts_includes_fin`,`scripts_code_ini`,`scripts_code_fin`) values (2,'pagina2','0','Pagina2','Pagina 2','contenido',-1,1,NULL,2,'','_self',0,0,'contenido','verContenido','9',-1,'pagina 2','pagina2, pagina222, otra palabra clave',NULL,NULL,NULL,NULL);
insert  into `app_paginas`(`id_pagina`,`alias`,`id_pagina_padre`,`nombre`,`titulo_html`,`id_tipo`,`oculto`,`aplica_menu`,`imagen_menu`,`orden`,`link_externo`,`target`,`ancho`,`alto`,`modulo`,`accion`,`id`,`requiere_logueo`,`descripcion`,`palabras_clave`,`scripts_includes_ini`,`scripts_includes_fin`,`scripts_code_ini`,`scripts_code_fin`) values (3,'pagina3','pagina2','Pagina Hija','Pagina Hija','contenido',-1,1,NULL,1,'','_self',400,400,'contenido','verContenido','9',-1,'ew','ef',NULL,NULL,NULL,NULL);

/*Table structure for table `app_param_custom` */

DROP TABLE IF EXISTS `app_param_custom`;

CREATE TABLE `app_param_custom` (
  `id_parametro` int(11) NOT NULL auto_increment,
  `parametro` varchar(30) default NULL,
  `valor` text,
  PRIMARY KEY  (`id_parametro`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `app_param_custom` */

insert  into `app_param_custom`(`id_parametro`,`parametro`,`valor`) values (14,'SUBJECT_CONTACTENOS','');
insert  into `app_param_custom`(`id_parametro`,`parametro`,`valor`) values (4,'FROM_NAME_EMAIL_CONTACT','');
insert  into `app_param_custom`(`id_parametro`,`parametro`,`valor`) values (5,'FROM_EMAIL_CONTACT','');
insert  into `app_param_custom`(`id_parametro`,`parametro`,`valor`) values (12,'URL_PAGINA','');
insert  into `app_param_custom`(`id_parametro`,`parametro`,`valor`) values (13,'EMAIL_CONTACTENOS','');

/*Table structure for table `app_param_global` */

DROP TABLE IF EXISTS `app_param_global`;

CREATE TABLE `app_param_global` (
  `id_parametro` int(11) NOT NULL auto_increment,
  `parametro` varchar(30) default NULL,
  `valor` text,
  PRIMARY KEY  (`id_parametro`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `app_param_global` */

insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (1,'P_TITULO_PAGINAS','GCP - Sitecms');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (2,'P_TIME_SESSION','40');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (3,'P_NUM_RESULTS','2');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (4,'ESTADISTICAS',NULL);
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (5,'KEYWORDS_META','gcp, sitecms ');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (6,'DESCRIPTION_META','gcp oficial cms');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (7,'GENERATOR_META','Sistema CMS, Jorge Rubio Ruiz - rubioruizjorge@gmail.com');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (8,'SUBJECT_NOSOTROS','Se recibio mensaje desde trabaje con nosotros.');
insert  into `app_param_global`(`id_parametro`,`parametro`,`valor`) values (9,'EMAIL_NOSOTROS','rubioruizjorge@gmail.com');

/*Table structure for table `app_plugins` */

DROP TABLE IF EXISTS `app_plugins`;

CREATE TABLE `app_plugins` (
  `id_plugin` int(11) NOT NULL auto_increment,
  `plugin` varchar(50) default NULL,
  `metodo_publico` varchar(50) default NULL,
  `descripcion_metodo` varchar(100) default NULL,
  PRIMARY KEY  (`id_plugin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `app_plugins` */

insert  into `app_plugins`(`id_plugin`,`plugin`,`metodo_publico`,`descripcion_metodo`) values (1,'paginas','verListado','Muestra el listado de paginas en el administrador');

/*Table structure for table `contactenos` */

DROP TABLE IF EXISTS `contactenos`;

CREATE TABLE `contactenos` (
  `id_contacto` int(11) NOT NULL auto_increment,
  `fecha_envio` date default NULL,
  `nombre` varchar(40) collate latin1_general_ci default NULL,
  `apellido` varchar(50) collate latin1_general_ci default NULL,
  `telefono` varchar(50) collate latin1_general_ci default NULL,
  `ciudad` varchar(50) collate latin1_general_ci default NULL,
  `direccion` varchar(100) collate latin1_general_ci default NULL,
  `email` varchar(40) collate latin1_general_ci default NULL,
  `empresa` varchar(200) collate latin1_general_ci default NULL,
  `mensaje` text collate latin1_general_ci,
  `revisado` int(11) default NULL,
  PRIMARY KEY  (`id_contacto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `contactenos` */

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL auto_increment,
  `titulo` varchar(50) default NULL,
  `texto_contenido` text,
  `fecha_actualizacion` datetime default NULL,
  `publicado` tinyint(1) default NULL,
  PRIMARY KEY  (`id_contenido`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `contenido` */

insert  into `contenido`(`id_contenido`,`titulo`,`texto_contenido`,`fecha_actualizacion`,`publicado`) values (8,'Inicio','','2011-08-16 20:00:00',1);
insert  into `contenido`(`id_contenido`,`titulo`,`texto_contenido`,`fecha_actualizacion`,`publicado`) values (9,'pagina 2','<p>otro pagina <img src=\"../galeria/Invierno.jpg\" alt=\"\" width=\"240\" height=\"180\" /></p>','2012-09-08 17:33:00',1);

/*Table structure for table `depto` */

DROP TABLE IF EXISTS `depto`;

CREATE TABLE `depto` (
  `id_depto` bigint(10) NOT NULL auto_increment,
  `depto` varchar(50) NOT NULL default '',
  `id_pais` char(3) NOT NULL default '',
  `orden` int(11) default '0',
  PRIMARY KEY  (`id_depto`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COMMENT='Tabla Auxilar de Deptos o regiones del mundo';

/*Data for the table `depto` */

insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (1,'AMAZONAS','CO',2);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (2,'ANTIOQUIA','CO',3);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (3,'ARAUCA','CO',4);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (4,'ATLANTICO','CO',5);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (5,'BOLIVAR','CO',6);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (6,'BOYACA','CO',7);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (7,'CALDAS','CO',8);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (8,'CAQUETA','CO',9);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (9,'CASANARE','CO',10);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (10,'CAUCA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (11,'CESAR','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (24,'QUINDIO','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (25,'PUTUMAYO','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (26,'RISARALDA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (27,'SAN ANDRES Y PROV','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (28,'SANTANDER','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (29,'SUCRE','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (30,'TOLIMA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (31,'VALLE DEL CAUCA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (32,'VAUPES','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (33,'VICHADA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (13,'CHOCO','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (14,'CUNDINAMARCA','CO',1);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (15,'GUAJIRA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (16,'GUAINIA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (17,'GUAVIARE','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (18,'HUILA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (19,'MAGDALENA','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (20,'META','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (21,'NARI?O','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (22,'NORTE DE SANTANDER','CO',11);
insert  into `depto`(`id_depto`,`depto`,`id_pais`,`orden`) values (34,'CORDOBA','CO',11);

/*Table structure for table `emails` */

DROP TABLE IF EXISTS `emails`;

CREATE TABLE `emails` (
  `nombre` varchar(200) default NULL,
  `email` varchar(250) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `emails` */

insert  into `emails`(`nombre`,`email`) values ('HERMANA MATILDE NIETO','mercedario@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR BELLO HERRERA ','gerencia@colegiorealescandinavo.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA YAQUELIN NAJAR PEREZ','coordinaciongimnasiojireh@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MAYORGA','zbpulido@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR BOLIVAR','oscarjbolivar@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA MERY GUERRA','escalemosipe738@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO JOAQUIN ARTURO ECHEVERRY','rectoria@virreysolis.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS ORLANDO GAMBOA PERREIRA','gimnasiobregon@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA CECILIA HIDALGO','vicerectora@mireino.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS MAURICIO PERAZA','asistente_rectoria@gimnasiolosrobles.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA ANGELICA SEGURA','liceoamericas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA MAYERLY CASTRO','colegiosuperiorandino@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE OMAR HOYOS CIRO','rectoria@corazonitabogota.com\r');
insert  into `emails`(`nombre`,`email`) values ('HENRY CABRA','hcabra2@hotmail.com');
insert  into `emails`(`nombre`,`email`) values ('MADRE MARGARITA SALCEDO','lestonnbogota@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS IRIARTE','carfisi@hotmail.com');
insert  into `emails`(`nombre`,`email`) values ('SONIA SANCHEZ MOJICA','rectoria@colegiodelosandes.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('HULDA BECERRA','hmbecerram@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LAURA VICTORIA BLANCO ROJAS','mountvernonschool@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LETY FENANDEZ DE GUTIERREZ','asis.rectoria@colegiofervan.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MARCELA ECHEVERRY VALENCIA','colegioluisconcha@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('IFALIA VARELA DE LARA','liceoavenidalasamericas@yahoo.com');
insert  into `emails`(`nombre`,`email`) values ('SOBEIDA POVEDA','lpboliv@hotmail.com-sobeidapoveda@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAIME BEJARANO','info@limca.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JULIO CESAR OROZCO','sedvischool@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MADRE SUPERIOR CELINA DEL SOCORRO VARGAS TOBON','colsantarosadelima@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA GILMA HENAO','rectoria@rosariosantodomingo.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ALEJANDRO MEDELLIN','rafael@claustromoderno.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR MEDRANO ROJAS','vimeronsc@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA CRISTINA PARRA PALENCIA','blbpalencia64@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MADRE BEATRIZ JAUREGUI','bjauregui@colsiervas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA ARIZA','sandrapspg@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DALILA KATISKA GUERRERO','coor.academica@agustinianosalitre.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('APOLINAR MENDOZA MU','apolinar.mendoza@yahoo.com.mx\r');
insert  into `emails`(`nombre`,`email`) values ('MAURICIO ROA','mauro_roa@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARLENE BELTRAN','marlene.beltran@unilibre.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('STELLA OVIEDO','rectoria.delbosque@uan.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA EVA PARRA RESTREPO','mparrarestrepo@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA LEIDA HOLANDA DAJOME','colegiocarmelobog@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ROSA EMILIA PIJ','rosaemiliapij@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ROSA EMILIA PIJ','rosaemiliapij@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARIA SILVA PIJ','colsantaclara13@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MADRID','secretariahcr@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR MATILDE ORTIZ','sormat24@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('YANETH CARDOZO','angelscl15@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA ARCINIEGAS','sarciniegas@ccb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','colegiocardenalsancha@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE MARIA FLORES','jomaflo62@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA ZAMBRANO','claudia.zambrano@correo.policia.gov.co\r');
insert  into `emails`(`nombre`,`email`) values ('GLADYS BAQUERO','gladis.baquero@correo.policia.gov.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN ALEXANDER QUINTERO','johnalex1703@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PRIETO','cyanivep@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MERY OT','luzmeryotalora@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA DEL CARMEN LEAL','annitaleal@gimnasioingles.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR GUAYAN','rector@jordandesajonia.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('WILINTON GIRALDO','sindico@jordandesajonia.esu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA NARANJO','rectoriamonjes@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA OLGA LUCIA CASTRO','rectoria@colegioprovinma.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','gcsantasofia@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR MARIA CONSUELO CORREDOR','rectoria@stellamatutina.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARTA RAM','martharamirezstj@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HOMERO ESTUPI','homeroe26@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO WILIAM FERNANDO DUQUE DUQUE','rectoria@colsalle.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS MAURICIO PERAZA ','carlosmperaza@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ DIANA REYES','secretaria@gimnasionuevamodelia.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CONSTANZA RUEDA R','constanzaruedar@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','nachofandino@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARISOL SANTOYO NARANJO','rectoria@bethlemitas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUC','academica@hispanoamericano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('TERESITA DE JES','hnateresita@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA SEP','olse161@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LIGIA RIVERA OSPINA','liriorjm@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('BERTA ALICIA RESTREPO JARAMILLO','hnaberta@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA IN','convigloria@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CAMILO GONZALEZ','ambulancias_ams@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ANDR','direccionacademica@sanviator.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANTONIO GUERRA','coordinacion.rosario@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PADRE ERNESTO LEON DIAZ','rectoria@liceomatovelle.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MELO CORREALES','sandra.melo@gcb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN MANUEL GALINDO MELO','juan.galindo@gcb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LIGIA ELENA CARDENAS','eucaristicocampestre@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAITE BRESSAN','maitebressan@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ALBERTO RODRIGUEZ  CRESPO','carlos_crespo_67@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HNA LAURA INES NI','luanima@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HNA ANA ELIZABETH SOLANO MARI','Elizabetm45@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA CHICA HINCAPI','lichihin96@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LIA ESTHER AGUDELO TOB','lia.agudelo@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA CARMONA MUNERA','lilianacarmonamunera@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FRANCISCO DULCEY','secretaria@gcb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MAURICIO POSADA','coordinaciongeneral@toscana.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('EDGAR PATI','rector2013@fundacionbethshalom.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','jmgallego@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MILNERT MU','colegio@comfenalcoquindio.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS MEJ','colegio@comfenalcoquindio.com\r');
insert  into `emails`(`nombre`,`email`) values ('NORMAN JIM','norman_ja@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ LLAMILET ALZATE','llamiletalzate@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MAR','eucaristicocampestre@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','asistenteadministrativa@gimnasiohontanar.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('BLANCA DORIS CONTRERAS','cimcamicav@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MAR','triunfadora111@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HENRY G','rectorialiceolasabana@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUCRECIA URIBE','lucreciauribe@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BLANCA NIDIA ','sonidodedios@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR HUGO VEL','vvelasquez@calasanz-medellin.edu.do\r');
insert  into `emails`(`nombre`,`email`) values ('JAIME ALBERTO GOMEZ VEGA','jadago80@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO ALONSO RUIZ CANO','garc081061@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','williamquimica@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JANNETH ROCIO PINEDA','draco_784@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OMAR BRAVO MART','omarbr@yahhoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSALBA LARA','colamerbucaramanga@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARIELA GUZM','rosaemiliapij@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ELOISA MARRUGO','eloisamarrugo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA ROSALES','lilianarosalesrivas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA VILLAMIZAR','rectoria@colegiobilinguedivinonino.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MANUEL DARIO LOPEZ','manuellopez@ccbenv.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARITZA ALVAREZ','mariirina@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PADRE RAFAEL ORLANDO JARAMILLO','rafajaza@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA ROJAS','smrojas06@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PADRE FRANCISCO JAVIER PINTO','j_pibo@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEDA CECILIA DE LA PE','leditacecilia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','derobledo@cablenet.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ENRIQUE GALVIS','jegc10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELSY TERESA ALVIS DE TOUS','ineducomfa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ARNULFA MONTOYA CALDER','arjecal547@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALFONSO PEREZ AGUDELO','alperez@comfenalco.com\r');
insert  into `emails`(`nombre`,`email`) values ('MILAGRO TEJADA','milagros.tejada@edm.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUC','olga.rojas@cdm.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('WILSON CONTRERAS','wcontreras@colcomfenalco.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO MAURICIO BARRAGAN VARGAS','mauricio1780@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO OMAR HOYOS','frereomar@yahoo.com.mx\r');
insert  into `emails`(`nombre`,`email`) values ('GLADYS BAQUERO','gladis.baquero@correo.policia.gov.co\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA TRINIDAD ORTIZ','sortrinidad@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('PATRICIA PEREZ','papesa1861@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','joseabrajim@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDRA TARAZONA','alexatara@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE GUARDO','joego@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA MARIA REYES TREJOS','lilianareyest@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA RUTH FABIOLA VARGAS','ruthfabiola809@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ABRIL ISABEL GARC','abrilisabelgarciacaro@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA LILIANA CARDONA','albacardo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA SONIA DAZA','soniad1498@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLADIS DEL RIO','gladelri@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YOLEIDA BARRIOS GUARNIZO','yolebarriosg@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEJANDRO ORJUELA','alejocid02@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('INGRID REYES','ingridpaty@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ANTONIA SUAREZ PIC','institutolamilagrosa@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA NUBIA TERESA BARCO','nubarju@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO JOS','joalsan90@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('STELLA RODR','stellitarodri@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA ENA CENITH GARCES','hcenit31@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA LUCY L','lucylopezch@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FRANKLIN MORA ROMERO','framm2014@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA LETICIA PE','lpr15-1945@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('KAREN JOHANA CARRILLO DE ALBA','kjhoja18@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLENIA PALACIO','direccion@manoamigamedellin.org\r');
insert  into `emails`(`nombre`,`email`) values ('MELBA LOPERA ORTEGA','rectoracolegiomanzaneres@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA LIBIA MARGARITA CADAVID','margy7027@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('SOR CECILIA ','kablifma@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR MARIA DEL SOCCORRO SICILIANI','masosi28@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('IBETT CABALLERO PEREZ','ivette_514@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR MATILDE ORTIZ','sormati24@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE MART','jemartin@colmemi.edu.do\r');
insert  into `emails`(`nombre`,`email`) values ('GINA ZABALA NARVAEZ','gina.zabala@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR MAURICIO BARRERA','omabar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR OLGA GONZALEZ SALAZAR','olgadelrosariogs@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA CATALINA VELA SALCEDO','cemidcolmd@colegiominutodedios.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANYELA JASMIN DIAZ','anyeladime@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR MEDRANO','vimeronsc@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JACQUELINE CAMARGO BARROS','jdscamargo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA DIANA PAOLA HERRERA','rectoria@rosarioflorida.com\r');
insert  into `emails`(`nombre`,`email`) values ('ASTRID RODRIGUEZ  PAUT','asropa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ESPERANZA CORTEZ MILLAN','directora_pabloneruda@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARTHA CARDONA','rectoria@palermosj.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('GUILLERMO JOSE RODRIGUEZ MERCADO','centroeducativo.lp@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','gimnasiopiagetano@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA GLORIA CORREDOR','gloriacorredor_924@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HAN GILMA MERY VILLAMIL SALAZAR','gilman2009@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARY LUZ RODAS GALLEGO','cogitaree@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA CONSUELO DAVID MESA','barcomar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MAR','anamamr2003@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('AURA MONTES DE GUETE','aumehe@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('GISELLA GUETE','gigumo@hotamil.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA LUCIA RODR','claritalrm@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('INES CAMARGO MONTA','inesmerycamargo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIVIANA RODADO BERNAL','vivirodado@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SAULO FERNANDO JACQUIN MORALES','saulocor@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PADRE WILFREDO GRAJALES','wilfredograjales@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO MANUEL EDUARDO CABALLERO','lasallecartagena@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA VENTURA ENCISO','sandramilena.venturaenciso46@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANO MAURICIO MALDONADO','secretariarectoria@isjdelasalle.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS FERNANDO ESCOBAR HERNANDEZ','lfescobarh@une.sam.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ KARIME PEREZ SUAREZ','luzkperez@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARGARITA MAR','luzkaperez@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ DARY GIL MU','luzda1993@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','mariaelenasu@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIA ISABEL BELE','liliabelgu@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA DORIS ESTHER GARC','dosesga@yohoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE LEONARDO CELIS GUTIERREZ','leocel97@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ANDR','secretaria@sanviator.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALVARO MENDOZA','ajmplata@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANDR','coltecnologico@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MAR','lvasquezr@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DEISSY MILENA GALLEGO MOLINA','deissymi@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR JOHANA ECHEVERRI','johanazaqueo@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('WILIAM CASTA','wiricas@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ALBERTO CASTIBLANCO','capetoscout@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CECILIA DIAZ MENDOZA','diazmendoza10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SOR MARIA CONSUELO CORREDOR','macocofo@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MADRE MARTHA RAMIREZ','secretariateresiano@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('IVAN ENRIQUE MONDRAG','Imondragon@calasanz-medellin.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SOR ANA MARIA CLAROS OSPINA','rectorasmr@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('KAREN FONSECA','gcsantasofia@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FERMANDO ROSRIGUEZ','cotemialcocali@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA LEONILDE CARRENO LOPEZ','lekamt1@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS BAYONA','juancarlosbayonav@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARITZA MAHECHA','mlmaritza@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BAHIYYIH SAYYAH','bahiyyih@familiasayyah.com\r');
insert  into `emails`(`nombre`,`email`) values ('ZURAY ZULUAGA','zuray007@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ZULMA VIVAS','blackeyes280@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULI ANABEL LOPEZ','missyuly@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('YESSICA KATHERINE AVILA','yessica_k@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YARIS MARIAN LOZANO','yairi10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIVIANA CALDERON','vcalderon@sagradocorazoncali.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR M. PEREA','vpereamartinez@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('RODRIGO ROSERO','mr.rosero213@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROCIO GRAVENHORT','rocio@colegiosantamariadepance.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('RICARDO ANGEL','rikangel1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PETTER RIVERA','petterivera@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MYRIAM LUZ SANCHEZ','mlsanchez@colegiohispano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA HENAO','monica.henao.04@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA ARCE','marsari1965@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA JANETH PUENTES','janeth4jota@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA DEL ROSARIO MONDRAGON','rosy26810@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA QUINTANA','marcetas21@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA MACHADO','mchadoluzmar@hotmaill.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS EDUARDO HERNANDEZ','luiseduardo@colegiosantamariadepance.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LORENA SOLANO','alexa2448@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LORENA OLAYA','teacherlorenaolaya@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA QUIROGA','lipaquie@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA ANGULO','lilyfucsia25@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LESLIE SOLANO','lejasol@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LAURA MARCELA DEVIA','lauradevia@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LAILA TATIANA ALVEAR','liceonuevosol@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIANA GARCIA','juliana05@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CAMILO ZAPATA','rector@colegioangloamericano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN MANUEL','jmardila@uao.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOHAN LEON','teacher@forallenglish.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANNA ARGUELLO','arguellojoanna@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHAN ANDRES NIETO','inkel24@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JESENIA VALENCIA','jesenia0822@hotmail.con\r');
insert  into `emails`(`nombre`,`email`) values ('JEFFERSON VICTORIA','jeviro07@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JANETH MARTINEZ','tutis40@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GERARDO ANDRES SANTACRUZ','liceo.inglesdelsur@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDWARD TOBAR','etobar@uao.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('EDILBERTO BONILLA','edilbertoabzapat@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDID CLARA ROSERO','edidclara@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDGAR ALBERTO MEZA','eameza@uao.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO FERNANDO MANZANO','dieferman@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DORIS CHAVEZ','dchaves@colegiohispano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARIA MARTINEZ','dimaca1210@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARCELA GRIJALBA','nany23_4@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAYANI STEFANNY SIERRA','dayanistefanny@colegiosantamariadepance.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DANIELA ZORILLA','danielaenglishteacher@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DALIA LORENA SANTACRUZ','dlsantacruz@uao.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTIAN DIAZ','diazfox29@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA CUBILLOS','ccubillos@colegiohispano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA LORENA MU','cmunozpatino@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CATHERINE GISSEL BONILLA','kabomoye@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA TROCHEZ','homeroomteacher1012@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA MEJIA','caritomejia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ORTEGA','cortega@uao.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS VARGAS','cavo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANNETTE SALDARRIAGA','annettsv@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANIBAL MOLINA','acamilcayzedoycuero@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELICA OSPINA','angie110289@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELICA MARIA AMAYA','liceo.inglesdelsur@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA MARIA BUENO','abueno@hebreo-cali.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES ESCOBAR','sistemas@colegioangloamericano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES ORTIZ','andortizco@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALVARO HOLMES SANCHEZ','alvarosanchez@colegiosantamariadepance.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALIRIO ANGULO','constanza40s@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDRA GISELLA PALACIO','alexandragisella05@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA MONICA NARANJO','anaranjo@farallones.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MARCEL VARONA','s_marcela88@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRUZ ELENA PONCE LENNIS','ceponcel@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MILENA SANCHEZ','dianamilena3112@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FRANCY JOHANNA CASTRO MARULANDA','fafy3383@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA INEZ HERRERA','gloriainezherrera@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA TRUJILLO','lilotad4882@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WILSON BONILLA','wilson700323@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HEBER VELEZ','hevelez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA VILLEGAS MORA','gloriavillegasmora@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA CONSTANSA DIAZ','emc_diaz1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALONSO NAVIA LOPEZ','hernanalonsonavialopez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA MOSQUERA LOPEZ','carolinaml1986@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA GOMEZ','andimosora@mar.com\r');
insert  into `emails`(`nombre`,`email`) values ('KATHERIN GUTIERREZ','profekey@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAULA ANDREA MORALES','pinina901220@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS RUBEN MEJIA','carumesi@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR AUGUSTO RUGELES','cesarcobain1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA VALLEJO','mercadeo@santamariadepance.edu.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA CASTANO','natalia915@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA MOLINA','claram229@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS HURTADO','whoan20@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA CUELLAR','cuellarcris8@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE MANUEL PASTRANA','josepastrana59@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JESSICA CEVALLOS','teacherjess@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS CARDONA','jcaesona4@yahoo.co.uk\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA GUTIERREZ','dguti80@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WALTER URRUTIA','ontario0756@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('AURA MARIA CAICEDO','aurita_@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLADIS JOHANA','ladycastilloyate@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO RUEDA','gustavored7@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GERARDO CARAJAL','geocarvajal1975@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA PAZ','angelapaz8@hotmai.com\r');
insert  into `emails`(`nombre`,`email`) values ('EAPERANZA SALOMON','esperanzasalom@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WILFREDO QUI','wilquino1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAOLA VASQUEZ','pavasquez@maristasnorandina.org\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA IBARGUEN','iolgaedna@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO URTADO','dfurtado@lacolina.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('YEIMI SILVA','nathy02@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('LADY CASTILLO','ladycastilloyate@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNY GIR','yepagidi@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA PATRICIA MORENO','dianapati87@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANNA GARTRY','anna.gartry@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('INES DE ANGULO','ineselviradea@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VERONICA ALZATE','colombiana0389@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ESTELLA LADINO DURAN','luzestellaladinoduran@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YERI LORENA CERON','yerilorena@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA ISABELL MORA','sianosamo16@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ESTELLA ALADINO DURAN','luzestellaaladinoduran@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA SANCHEZ','avame2002@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JENNIFEE ROMO','jennifer_rova@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO ADOLFO FLORES','indigoboyfx.@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA BARRERA','gestion.academica@sanjosebilingue.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUISA CORTES','luisa.cortes.castro@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RICARDO RIVAS','ricarso8909@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('INGRID CAICEDO','moroluna04@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR BLANCO','ceblanco5@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MILENA LEITON','mileito_@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIANA COBO','cobojuliana@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULIANA MORAN','yulitoja@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR JAIMES','oscarjaimes84@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEYDY JHOANA MARIN','jhoamago@hptmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JHONATAN MEJIA','megatude2884@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ONEIDA GARCIA','oneida130.6@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA PEREZ','teacherandrea378@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANTONIO RINCON','antoniorincony111@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CAMILO ALVAREZ','alvarezj@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES GUERRERO','guerreroa@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('WILLIAM MARIN','marinw@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELKIN RAMIREZ ','ramireze@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO ADOLFO RIBERO','riberog@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('RICHMOND ','richmondsupporteam@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('GREGORIO RODRIGUEZ','rodriguezg@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR SANCHEZ','sanchezce@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALEJANDRO TEJERO','tejeroa@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MARIA VINASCO','vinascol@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('MILTON JOBANY SANTOS CRUZ','santosm@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELKIN HERNANDEZ','hernandeze@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ESDRAS TAYLOR','taylore@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MARIA MESA','mesaan@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('FABIAN DURAN','duranf@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('RAYMUR URQUIJO','urquijor@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA LUCIA FERREIRA','ferreiramf@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('WILLIAM LEONARDO BENITEZ','benitezw@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS ENRIQUE BOHORQUEZ','bohorquezl@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE WILFREDO RAMIREZ','ramirezj@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA MAGNOLIA MORENO PINILLA','morenoc@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('IVONNE LILIANA SANDOVAL BOHORQUEZ','sandovali@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA ISABEL GIRALDO HOYOS','giraldoma@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARTIN','martind@richmond.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('BUILES MANUELA','builesm@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('CONTACTO 0','contacto@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('EUTIMO HERNANDEZ','hernandeze@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA ORJUELA','orjuelac@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('SOPORTE 0','soportetecnico@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIO ANDRES LONDONO','Londonom@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('LIZZIE ZAMBRANO','zambranol@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUCERO BOMBIELA','bombielal@sistemauno.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('CONTACTO 0','contacto@sistemaunointernacional.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('SOPORTE 0','soportetecnico@sistemaunointernacional.com.co\r');
insert  into `emails`(`nombre`,`email`) values (' ROGER NEIRA','neira@sistemaunointernacional.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA CECILIA OVALLE GARC','cogarcia@itc.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ BEATRIZ OSUNA CANTOR','cantor_luz@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('GIOVANNI ALBERTO V','giovmsps@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CECILIA RAM','ceciliaramirezguerrero@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA TERESA PE','marcelatere@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA SAIR GONZALEZ ROJAS','frambucio@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARISELA ESPEJO ','mariselita1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GILMA ESTELA PARRA SANTOS','diablito004@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ALBERTO JIMENEZ RODRIGUEZ','jjorges2002@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA ELENA MORENO ','mariaemoreno@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIA ELVIRA GALLEGO VARGAS','ngallego@colegiocolombogales.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA VICTORIA PE','minik-21@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MIRYAN MARCELA MANTILLA BERMEO','miryanmarce@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BLANCA LILIA SALAZAR PARDO','blanquisjda@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARY ESQUIVEL CORDERO ','luz_ance@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('> SANDRA MILENA LIMAS LIMAS ','slimas@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('EVER JAROL MALTE','jamalte25@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YURY CAROLINA BUITRAGO SABOGAL','yuricaro12@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WENDY DANIANY PRIETO LADINO  ','copito1031@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIA BOHORQUEZ ','julibovi@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH CALLEJAS BERNAL','rucb2@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MYRIAM ELENA MART','myrimar777@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO ARMANDO LEBRO','diegolebro@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA NIETO','coordinacion.academica@colegiomaslow.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA ELENA MORENO ','coordinacion.academica@colegiomaslow.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA TERESA URIBE','coordinacion.academica@colegiomaslow.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA SANTOFIMIO','adrica0204@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA ISABEL COLLAZOS','anitaicl@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RONAL MOLINA','ronalmolinah@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('XIOMARA CASTRO','xiopili81@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LADY HERNANDEZ CASTRO','ladyhdezscalas@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GEIDY D','leudis77@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARLENE GONZALEZ','maedi724@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ELENA GARCIA','luznena13@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('AIDA AMPARO AGUDELO','aidaa@ciedi.edu.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANA ANDREA LEAL RAMIREZ','johandrea53@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA ANDREA CORREA TABA','canimo_andre@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS EDUARDO MORA CIFUENTES','carlosmupn@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELSA SANTOFIMIO CELEMIN','elsache82@yahoo.com.mx\r');
insert  into `emails`(`nombre`,`email`) values ('YEIMMY CAMARGO GONZALEZ','somer0103@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values (' DIANA YANETH ROJAS OLAYA','nanis8403@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NANCY ROMERO BARRERA','nancy_romero77@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNY ISABEL RINCON','isabelama2009@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MIREYA MARTINEZ','smmartinezg@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MARIA VELASCO','ani.velasco@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARCELA HINCAPIE','diamahincapie@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA GUERREO GOMEZ','andrea_gerrero_g@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNYFER ALEXANDRA BERNAL DIAZ','alexita_bernal@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DEISY VASQUEZ','amapolavg@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA DEL PILAR MEJIA','pilandrea1979@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA YINET GIL','martica4202@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA SUAREZ AREVALO','adrianasuarezarevalo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDRA C','alexandracardenas37@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDRA LEON RAMOS','Alexa3leo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MAR','amplazas@colegiomayordelosandes.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA GALVIS LUIS ','angaludal@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA ZULIMA RODRIGUEZ PARDO','andreazuli@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGEL DAVID SANCHEZ','davids@ciedi.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ANGELICA CASTRO SILVAN','angelicastro@yahoo.com.ar\r');
insert  into `emails`(`nombre`,`email`) values ('ARNOLD GONZ','argoz7230@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BEATRIZ MARTHA VERGARA BERMUDEZ','headofspanish_sociales@cgb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('BLANCA CECILIA MORALES ','ceymorales@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS EDUARDO ARCINIEGAS ORJUELA ','carlos80100@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARMENZA POVEDA SALDA','carmenza.poveda@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PINTO MONSALVE ','clapimon@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA QUI','c.quinonez@cgb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('EDNA COLMENARES MURCIA ','ednacol94@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CAROLINA GONZALEZ RUIZ ','karitog098@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MILENA PANQUEVA RODRIGUEZ ','dianirodriguez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA PATRICIA R','patricia200781@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DORA CECILIA MURILLO ','docemg@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA LILIANA GALINDO','ericacastellanoincodema@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FABIO CHAVEZ MUNEVAR','uchuvaca@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GERM','ledzeppelin17@hoymail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GINA GAITAN GONZALEZ ','japira@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HILDA LORENA BETANCOURT ARIAS','hilobe17@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ISADORA MEDINA SALAZAR ','isamed12@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNY CAROLINA CORREDOR BARBOSA ','jecacoba@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNY ELIZABETH FAJARDO BONILLA','jenny-eliza@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOAQUINA APARICIO APARICIO','anaparicio1996@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN GABRIEL SANTAMAR','jgsantamariap@unal.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JUDITH DEL SOCORRO CASTILLO MARTELO','jcastillo@colegiomayordelosandes.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('YOLANDA LATORRE GARCIA','yolandalatorre@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA CALDER','liliana_calderon_h@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ AMPARO RODRIGUEZ ','l.rodriguez@cgb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA CASTIBLANCO LOPEZ','luzmarina368@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ STELLA CORTES ACERO','luzsc27@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','marialejo00@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARINA CADENA G','millonarios.mar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAYELI ANDREA CASTELLANOS ADAMES ','mayeyiss@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA ANDREA CASTILLO PRIETO','monyprieto@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIAN YOMAR VARGAS BERLTRAN ','yomarvarbel@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAOLA ANDREA HERRERA MORALES','pahm1081@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAOLA ANDREA OSPINA GONZALEZ ','paospina78@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PATRICIA AGUILAR AVILA','pattyunica7@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('RUSBERT REAL BENAVIDES','rusbertreal@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH VILMA RDORIGUEZ CASALLA  ','ruthvil71@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA PATRICIA PINZ','sandy-3010@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIVIANA FERNANDEZ ACEVEDO','arcangelvf@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YOMAR FABIAN HERRERA GALVIS','fabiherrera963@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YUDITH CELMIRA PARADA SILVA ','ycparada@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PIEDAD DE LOS ANGELES MONTA','piedadm@ciedi.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA JOSEFINA CUESTAS GONZALEZ','mariacg@ciedi.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('HIRNIZ NATALY PEREZ ACOSTA','ihirnapataquiba@hotrmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA VASQUEZ','angi26080@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ESMEREALDA ARDILA TORRES','atesmeralda@yahoo.co\r');
insert  into `emails`(`nombre`,`email`) values ('KAREN MONTA','gotica71@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LAURA MARCELA BELLO','lotabp@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MARIA BALCAZAR ','anamao24@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIRGINIA ORTEGA','virginiaortegag@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA NAYIBE JOYA','naijj18@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIANA ANDREA AYALA','juqy1976@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('AMANDA ROJAS','pachiscam10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIANA CAROLINA SIERRA GARCIA','elijuga1718@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LORENA GACE WILCHES IZQUIERDO','loranagacewilches@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('JESSICA LLUBELI ROJAS','llubealba@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ EDILIA GUTIERREZ','luzedilia2009@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA CAROLINA GARZON OSPINA','mariacaospina@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NORMA ROJAS','consuerojas24@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('AMPARO MONTOYA RAMIREZ ','cbaqueros12@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EMMA CORREA G','enmacorrea@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('M','monikaltahona@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS FERNANDO DIAZ PINTO ','carlosdistrital@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MILENA BAUTISTA RODR','claus1015_1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARY LUZ LADINO ','mariaxy38@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YUDITH CELMIRA PARADA SILVA ','ycparada@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CATHERINE AVILA L','cathe_avila@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROCIO ALARCON SILVA','rochi810@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE MARTIN CRISTANCHO ','martincristancho@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA ALDILA CRUZ','cayita_ardila@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHAN FORERO','johan_hoss@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ AMPARO GUERRERO SANTOS','gluzamparo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA NANCY VILLAMIL DUARTE','claranvd@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLADYS EUGENIA MU','gmunostarquino@gmail.con\r');
insert  into `emails`(`nombre`,`email`) values ('MIGUEL ALDANA RODRIGUEZ','filojesus111@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERWIN ESCORCIA','erwinescorcia7@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOAQUIN RESTREPO ','amadis86@hotmail,com\r');
insert  into `emails`(`nombre`,`email`) values ('RODRIGO CASTA','rodricb@msn.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA BARON ','andreitabaronb@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA ROMERO','marcelita_1126@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELICA ROCHA NAVARRO','angelstar311@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA ALFONSO DUSSAN','campo.comunicacion@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA ISABEL MORALES','erisilva21@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIA GARCIA','nigarlo1985@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LAURA DANIELA VILLANUEVA SILVA','laudan_09@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUDY LEON','judymilenaleon@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JEIMMY ROCIO VILLAMIL','jeimmy.villamil@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARCELA BERMUDEZ','camisofi25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS ALBERTO PACH','alpafran2060@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIA GAMA ','nimagamo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ NANCY MORENO DAZA ','lmoreno@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ASHTAR MAURICIO GARC','maugar7@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA CASTRO','caritocastro8506@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ASTRI CALDER','yuddyas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA FONSECA WALTEROS','lifonseca@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA LUCIA ROJAS RODR','planeacioneslsc@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA CONSTANZA LUQUE LAMPREA <','erikaluq7@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('IVONNE ANDREA MARENCO CIFUENTES','imarenco@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ILBA NELLY DELGADILLO ROMERO','nellydelgadillo@espacioenred.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELSY AGUILERA GONZ','elea740@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE DE JESUS BUITRAGO MU','jubu26@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YOVANA  OLARTE  LUQUE','yovanoluq@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JHON TORRES ','jhoxo1@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DERLY BIBIANA GARAVITO TRIANA ','dbgaravito@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('YADIRA LUZ RAMIREZ LEMUS ','yadilu1024@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS SALGADO ','figarocasel@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MAR','benetsan@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO CASTILLO','g.castillol@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FABIAN GAMARRA ','gws_academico2012@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA GARC','carolina.carito17@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GISELA SAAVEDRA RAM','viannysaavedra@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CINDY TATIANA CRUZ GUTIERREZ ','tatacruz_0@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAHOLA SCHROEDER TORRES','paholaschroeder@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEX FERNANDO VELANDIA BENAVIDES','alexfernando1970@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARY LUZ ROJAS','malurg82@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARICEL D','mdiaz@docente.als.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALIX BIBIANA NIETO PUENTES','tafabi32@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA PUENTES VARGAS','claudinapatriciani17@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA EUGENIA CARDENAS','maecago@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA BARRETO','natabagu@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULY ACERO','profejimenazul1983@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAIRELY  JIMENEZ','mairely0286@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GICELL LARROTA','carmayis4@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA MODRENO','limoreno28@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA MOLANO','lilolamg@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('STEFANNITH OSPINA BOCANEGRA','berenice1523@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA DEL PILAR JIMENEZ ACU','mpilarjimenesa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FELIPE MORENO','pipemongifo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA CECILIA ROMERO TURRIAGO','ceciliaromerotu@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNIFER CORREDOR MERCHAN','roderrocj@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA LEON MENDOZA','alma08032003@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MAYERLI SARMIENTO MARTIN','camarofa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARINA ROMERO','karopache@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA LUZ CANTE MORENO','albaluz.cante@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA MARIN PE','nubimelle1603@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DEICY LILIANA UMBA','deliu2421@hotmil.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDUARDO MALDONADO','maledo_06@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELSA MARIA DUARTE ALMONACID ','colegioisidro@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARY LUZ CASTRO PARRA ','casparmar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WILSON IBA','wilsonibanez@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA  STELLA NOVOA ESPEJO ','glorianovoa2000@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('> ERIKA MARITZA GARCIA FORERO ','garerika@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAVID MAURICIO WILCHES ALVAREZ','achogreen1987@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA LUCILA VELARCO PEREZ','lucyvepe@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA GLADIS TRAMIREZ MAHECHA','docente_gladys@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('TONNY OLAYA PEREZ','t291077@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELICA ROJAS','paquis_514@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SARA CASTA','saracas8@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('BIBIANA FIGUEREDO','bibianaf@ciedi.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('GISELA CANO','giselac@ciedi.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA DEL PILAR HERNANDEZ NOGUERA','pilly7285@yahoo.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('YEIMY ASTRID CASTRO VARGAS','lic.yeimy.castro@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS RUIZ ZAMUDIO','Melcitos@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEONARDO ALVAREZ  ','leoal_co@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARY LUZ LADINO ','mariaxy38@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUISA FERNANDA LAVERDE','luisafe00@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DALILA GUERRERO','katiskag@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA INES  NARANJJO CASTRO','claribus-7@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR JARAMILLO VILLEGAS','cesaramillo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NADIA FORERO GALEANO','nadiaforero@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIAPAZ CHAVES DIAZ','pazchavesdiaz@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTORIA TORRES','borbujita2@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARICELLA GONZALES DIAZ','javimilli@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIELA  ISABEL CERA RODRIGUEZ','marielacera@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GERLIN DIAZ','pinguino1185@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA IVONNE GALEANO','claudiaivo34@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ANGELA GONZALES SALAMANCA','juanquita20@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELICA DAZA','daza.angelica@yahoo.com.ar\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA BUITRAGO','angeli_165@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA ROCIO ROJAS','lina_7990@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA BERNAL','sonibero@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ESPERANZA MUNAR','espemumunar@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIO NOVOA','julnovoa@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS BAHAMON LE','carloshbahamon@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA  HERRERA','nubiscalidad@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MILENA FORERO NIEVES ','milefor@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUC','olduro@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA ROSA MART','mmartinez@colegionuevayork.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('YENNY RUBY VASQUEZ MORENO ','yeruvamo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DORIS ROCHA GARZON','dorisrochadrg@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA ACOSTA RODR','claudiaacostarodriguez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PACHON','clapapasas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA VILLAMIL ','maritol19@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EXLENDY JOHANA RODRIGUEZ','exlendyr@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA AREVALO ','ancarjulio@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA MATEUS CASAS','crisma_ca@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('NANCY MARCELO','nachita.f28@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MILENA DIAZ DIAZ','ebano.81@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CINDY PAOLA SANTANA ','cindywes_9@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HERMANA MARTHA CECILIA LOPEZ','martaclopez2000@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAKELIN ESPITIA LANCHEROS','jakichan62@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('YAMILE GOMEZ SALCEDO','yamilex25@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JACQUELINE ROZO BUSTAMANTE','jacquita33@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FREDDY SARUY ZAMORA PE','freddysaruyza@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH BUITRAGO','elisa.buit@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEONARDO BETANCOURT','ley141@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA ESPERANZA RODRIGUEZ ROMERO','nuesro@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA CASTA','lopalosero@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RODOLFO CACERES ROJAS','r.caceres@javeriana.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA PAOLA CASTILLO','diana.j0203@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA TAFUR','marcetafur123@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS ALBERTO CLAVIJO','luiscmayorga@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES VILLAFRADE','eltextofilmico@hotmail.co\r');
insert  into `emails`(`nombre`,`email`) values ('AMANDA CARO','amanduchis1@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('FABIOLA GIL','ecogar12@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('KAREN GOMEZ','kjgm1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA BIBIANA ALFONSO','bibilinda147@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA VICTORIA MORENO CABEZA','gazu.vicky@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ELBA BEATRIZ CONTRERAS JIMENEZ','ebcontreras@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ANGELA RAMOS','angelar.luzangela@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','maclatru@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA MONTA','cristinamc79@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA  BARRERA  D','cibarrera@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDR','andrespp01@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE ALEXANDER GIRAL RAMIREZ ','joalgira@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA YANETH GARCIA MARTINEZ ','gloriaygarcia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','maje_rime@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA IN','sainea24@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA MARCELA CORONADO MOJICA','monikmani@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA NAYIBE CASTRO BALLESTEROS','clayibe@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAVID FL','kilgoremedina@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CAROLINA PIRABAN D','descaro.sara@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDY HERN','sandisita09@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA ROLDAN','angreg12@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR ALBERTO GALINDO FRANCO ','profeoscar56@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA IN','gloriavato1991@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUCIA COPETE PE','ocopete@colegioscompartir.org\r');
insert  into `emails`(`nombre`,`email`) values ('DAMARA GARZON PEREZ ','damaragarzon@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ARTURO BOHORQUEZ ROMERO ','carlosbohorquez10502@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA VILLAMIL NIETO','puiglina@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA CONSTANZA PINZ','conson56@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA BRAVO','craftyandsure@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLARA IN','clarainescastillo25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA PATRICIA RAMOS QUINTERO','maparamos11@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA ESPERANZA GONZ','sonygonzalez27@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HEIDY  PAOLA MARTIN','hpmartin@colegioscompartir.org\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANNA PINZON','mijohap@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIGI ALVAREZ','artesabe74@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('LILIA ESPERANZA BARRERA','tatiana.2715@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA DAZA','erikdz16@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ STELLA SEGURA PORRAS','profestella@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROCIO VALDERRAMA FUQUEN','rocivafu@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('GICELA SANCHEZ','gisela28@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAOLA MORENO','paolamarcelamoreno@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA MONTA','adrmontana74@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA GONZALEZ','alhegop@yahoo.com.mx\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA NUBIO ROZO RICO','martharozo43@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MARIA MURIEL','maro_ana0425@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ALEJANDRO CRUZ','licard2003@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA YAZMIN ACU','ayavi2004@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA FERNANDEZ','adrianaisabel14@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA MARCELA ROJAS','admaro1982@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA SANDOVAL','diamarme79@hotmail.co\r');
insert  into `emails`(`nombre`,`email`) values ('SUSANA SANABRIA GONZALEZ','sanabria85@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA RUIZ BAQUERO','luzmarb25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MERY CONSTANZA MENDOZA LEON','paticocony2012@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MILEN SANTA','santasandra@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA PAIPA','santypaipa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARILUZ MARTINEZ','marymar.1995@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JEFFERSON MIGUEL GOMEZ','jeffersonupn@hyotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA PAOLA OSPINA','cinderella.nila@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OIDEN SANTIAGO PEREZ','oisperez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAIRON L','d-airon-26@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIVIANA LOPEZ SUAREZ','vilosita25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VIVIANA LOPEZ SUAREZ','vilosita25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JES','almanaque.s33@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('INDIRA MU','indira_muniz@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','Mvardila@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELINA ROSA URIBE ARENAS','ely.uribe.arenas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREINA DEL CARMEN MU','andreina2507@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JEFFRI RAMIREZ ELGUEDO','jeramel7148@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALFREDO ALVEAR MEDINA','alfredoalvear2005@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARLEIDYS LLERENA TORRES','marleytabo_82@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('AN','anibalit22@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSA MAGOLA ORTIZ CARABALLO','rochyrosa72@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JANETH MORALES CALVO','jamamoca@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('KEYLA  M','kelmes2@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTORIA JOHANA ROCHA GARCIA','victoriarocha_25@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA MEDRANO','angelaygaby@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTA LAGUNA HERRERA','martty_1012@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YENNY GARCIA DURAN','y-garcia13@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('TANILSE D','tadihe8@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSIRIS HERAZO DILSON','rosirisherazo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','mariae13@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSALBA MAR','rosalmadiaz@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ESPERANZA DEL ROSARIO ORTIZ SUAREZ','esperanza.ortiz@cojowa.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('PEDRO BURBANO ARR','pedroba77@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('YESENIA EBRATT CABRERA','yebratt@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BARBOSA CALDERA EDUARD','barcadejesus@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH PATRICIA MIRANDA MONTALBAN','rpmmacademic@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DALIS RINC','drincon11@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCIA MARIA RAMIREZ AYOLA','marciaramirezayola@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YUDIS GLORIA PUERTA FRANCO','posandy1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PUERTA FRANCO YUDIS GLORIA','posandy1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA  LUZ TORRES PUENTES','ntorres@comfenalco.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSA HERMINIA RODRIGUEZ ROMERO','rosaherodriguez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEONOR PATI','leito112@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ENRIQUE JARAMILLO CORREA','carlos.jaramillo@cojowa.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ARLETT ESCORCIA CARABALLO','arlet0426@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RENZO SIERRA ORTEGA','rensie3000@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA STELLA CASTILLA CASTILLO','maria.castilla@cojowa.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LISBETH CARO PE','lis-kp@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREI CARMONA BALLESTAS','carmonaballestas@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALICIA GALLARDO','alicegallardo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA C. P','adriana.cpu@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA MONROY BUSTOS','maena99@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDGAR ENRIQUE BALANTA CASTILLA','hotmail.com@\r');
insert  into `emails`(`nombre`,`email`) values ('ORLANDO BERR','orlandoberr');
insert  into `emails`(`nombre`,`email`) values ('MABY CECILIA BOSSA ROBLES','a-maury-19@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ESTELA MARTINEZ CANTILLO','luzmarcan17@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VILMA SILVA','uniquesandrita@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLEDYS CASTELLANOS VANEGA','clediscastellano724@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('GINA PATRICIA VITOLA','VITOLALINA82@GMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('ROSMARY VELASQUEZ TORRES','rosmaryvt@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CINTHYA OSPINO MENDOZA','cinthykrollina@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ARLETT ESCORCIA CARABALLO','arlet0426@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUCY PATRICIA MORALES PAJARO','lupamopa@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARISOL DEL SOCORRO ORTIZ MANJARREZ','meliortiz8@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RAMON E VIVANCO RESTAN','ramonevr26@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA V','luzmavas@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ALVARO ANTONIO ALVAREZ JIMENEZ','alvaro-jimenez85@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA MENDOZA COUTIN','caritomendoza825@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JENNIFER PAOLA CASTRO MARTINEZ','tuchicalibra22@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MILENA ACOSTA VALDELAMAR','funcepal@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VER','veva0109@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DALILA DE JES','dalypolo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA LOZANO CASTILLO','cplc2010@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTIN ALONSO BUSTAMANTE GOMEZ','neosistemas@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CAMACHO ESTRADA','camacho999@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DORA ELENA FLOREZ GARCES','doflogarces@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MARIA JARAMILLO G','dianitajc@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MANUEL PUIG DUR','mepuig82@ccbenv.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SILVIA CALLE MORA','silvia.calle@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULIETH ROLD','yulizita84@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA M. CASTA','gloriamara22@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGIE ALEJANDRA ARIZA GARC','alejita3a@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA HIGUITA SERNA ','catalina289z@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','andruss95@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA CADENA','lilii3070@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA BOL','libertad807@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA ANDREA VALENCIA LONDO','natis_wippo@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YOLANDA JARAMILLO','yolis1532@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA HINCAPIE','monicahincapie543@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH GLORIA GIRALDO GUTI','ruthgloriaster@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NELLY D','nellydiazp22@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BIBIANA MARCELA SIERRA ACOSTA','bibianasierra@coomulsap.com\r');
insert  into `emails`(`nombre`,`email`) values ('LIA ESTHER AGUDELO','lia.agudelo@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('MERLY DAVIANNY CASTRO MORANTES','davianny0408@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATHALIA CASTRO BARRIENTOS','nati-388@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ARCADIO OCAMPO FL','arkanoe10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ EDILMA LOPERA AGUDELO','minerva16@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIANA MILENA MAR','elmilma@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIAM CORREA CORT','licor09@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA CLARA GARCIA SANTAMARIA','maria_claragarcia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAIME ANDR','jmarianatqm@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULIANA VEL','siempreviva_@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA ISABEL LONDO','ailoja65@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JULIA IN','juimosca@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('AIDA MAR','amsajepacato@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YESENIA CARO MONTOYA','yesecamo33@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARY ECHAVARR','Jugly3@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN FREDY QUINTERO TORRES','j-f-quintero@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ALEJANDRO ECHEVERRI CHALARCA','jeorge8909@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('V','varroyav@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YESENIA S','nabel24@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('ILDA EUGENIA BETANCUR MAR','betancur115@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN DAVID VARGAS MESA','akanaton2005@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FLOR  ANGELA  PEREZ ARROYAVE','florangelap@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('SAYRA R','samy3891@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YICEL QUINTERO CHAVERRA','yq@colegioalemanmedellin.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA DEL CARMEN HERN','marcaherco@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MARCELA CALVO AYALA','espanol@colegioalemanmedellin.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA CARDONA S','natico1983@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR ALFONSO NARVAEZ FIGUEROA','bictorn@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA G','carogo17@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ISABEL CRISTINA ESTRADA JARAMILLO','isaesjar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA STELLA SALAZR POSADA','margara905@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RODRIGO CASTRO MEJIA','coljaga@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN SEBASTIAN VANEGAS PEREZ','jvanegas@alcazares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA GILMA GIRALDO YEPES','gilgiye@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA ANDREA HENAO MONSALVE','andreahenaomonsalve@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('FELIX EDUARDO CORREA RAMIREZ','felix.correa79@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARINA L','maloca1913@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('M','moanhive@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('LEYDI VIVIANA SANTA RUIZ','leydi416@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JROGE IGNACIO ROJO RIOS','jadavero@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA GALEANO JIMENEZ ','sandra.gale1@gamil.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA DE JES','anapalacios03@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MILER MEZA LARGO','milerm@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GERM','germanrc50@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MAR','limaga98@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VER','veronicag3333@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('M','monicavelasquez@ccbenv.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH NARANJO CARTAGENA','elynaranjoc@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JANNIFER V','jannisvasquez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JANNIFER V','jannisvasquez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA ROCIO RUA AGUDELO','olgarua@ccbenv.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('FABI','framirez@ccbenv.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MAR','limbotero@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA CIRO OSORIO','cataciro20@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ AMPARO SEP','luzaseva@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIBEL OCAMPO MEJIA','maribel.ocampo@delasalle.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SILVANA V','sorsilvanavelezalvarez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MARIA CDAVID','lcadavid10@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('CATHERINE MOLANO CORREA','catherinemolano@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('','agiraldo@alcazares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELISA BETANCUR','elisabetancur@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','maruerendon@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MAR','villavivar@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ PATRICIA ACOSTA R','cucaramangrejo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('KENIA ECHAVARRIA','KENIA2930@HOTMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('AMALIA BETANCUR MONTOYA','amaliabetancur@coomulsap.com\r');
insert  into `emails`(`nombre`,`email`) values ('GINA NATALIA CANTOR QUINTERO','ginacantor2002@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('SILVIA CALLE MORA','silvia.calle@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SILVANA TOBON','silvanat02@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA CARDONA','natico1983@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA SOL URREGO ARANGO','solsimon22@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA ANDREA MORALES LOPERA','moramandrea1@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA RUTH SANCHEZ MUNERA','gloriru1@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA RUTH SANCHEZ MUNERA','gloriru1@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('GLADIS HELENA BEDOYA VELEZ','gladisbeve@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('GLADIS HELENA BEDOYA VELEZ','gladisbeve@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR DIEGO ACEVEDO OSORIO','osaceoso@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','ydaly.vera@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RAFAEL URIAS PARRA CARVAJAL','rafaparraca@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA ROCIO RUA AGUDELO','olgadelarua@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('AYLIN VANESSA G','aylin.gomez9@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA YAZMIN GOMEZ OSPINA','yecsamine@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values (' EDNA TATIANA CEDENO','twoangel.26@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GABRIELA MAR','gabriela.gutierrez@virtual.sanjosevegas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MARITZA L','marydualc@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA AVENDA','glorycami@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIDA MAR','elidamoyab@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA MARIA PEREZ RESTREPO','soniaperez2007@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA CLARA GARCIA SANTAMARIA','maria_claragarcia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUSTINE COLORADO GUTI','justine.colorguti@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA PATRICIA HOYOS SEP','sandrahoyos.colma@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN DAVID GOMEZ GUTIERREZ','hailrock69@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN DAVID GOMEZ GUTIERREZ','hailrock69@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN BYRON ZAPATA ZAPATA','jobyza1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA MAR','namarabe@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MAURICIO MU','alemao7877@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARINA','maloca1913@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MIRIAM SOTO GIRALDO','mirisogi19@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA MAR','villavivar@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DILIA JANNETH VALENCIA VALOYES ','dilia.valencia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','Mrestrepo@pinares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CECILIA GARC','dgarces60@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CECILIA GARC','dgarces60@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RODRIGO R','rarh3848@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('PALACIOS PALACIOS ANA DE JES','anapalacios03@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PALACIOS PALACIOS ANA DE JES','anapalacios03@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTORIA ELENA SANTA GUTIERREZ','vickysantagutierrez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAVID ANTONIO RINCON SANTA','rinconsanta93@gma.comil\r');
insert  into `emails`(`nombre`,`email`) values ('ESPERANZA BURGOS ABRIL','esperanzaburgos@coomulsap.com\r');
insert  into `emails`(`nombre`,`email`) values ('MELISSA GONZ','mela01_@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIBEL MAZO D','marimd827@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ YOLANDA FRANCO R.','fluzyolanda@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA C. BERMUDEZ F','mariafco@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('NORBERTO ARROYAVE VALENCIA','narroyave@alcazares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIA ECHAVARR','echarani@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAULA ANDREA AGUIAR LONDO','paulaaguiar12@colombia.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA MARIA CUARTAS BOLIVAR','lili-516@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MARCELA D','linamarcela584@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA GUARIN S','magu6313@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA GUARIN S','magu6313@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA YULIETH AM','errikkis@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CECILIA GARC','medipaldiana@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MAR','claudia92.palacio@montessori.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA MURILLO G','cmurillo@pinares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SOL BEATRIZ L','sblopez@pinares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA PATRICIA GUZM','angelapguzman@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA VALENCIA FL','vfgloris@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA VALENCIA FL','vfgloris@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MAR','culpadeotra@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA MARIA MESA BEDOYA','amesa1@palermosj.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA PATRICIA GUZM','angelapguzman@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS ALBERTO BERROCAL BERNAL','LUALBEBE@HOTMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS ANDR','andres-orozco10@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WILSON DE J. LONDO','neniswil@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDRA BASTIDAS MONSALVE','alexandra.bastidas@virtual.sanjosevegas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LINA MARIA PATI','lina.patino@virtual.sanjosevegas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA NORA GUARDIA MACHADO','albanora2@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE ELI','jorgezaristizabal@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA EUGENIA BERNAL OSORIO','natybernal77@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAR','maurigar_18@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA IRLETH GARC','irleth19@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUC','olas2804@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA LLANET PIMIENTA GUTI','sonia@thenewschool.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA CARMELA BUELVAS SOTO','dianacbs_19@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA MAR','diana.echeverri@virtual.sanjosevegas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MAR','mejiavieco@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO BOTERO JARAMILLO','botero78@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA CARVAJAL  MEJ','mcarvajal@pinares.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LADY CAROLINA QUIROZ ALARCON','ladyq86@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH ARBOLEDA URREGO','elizabetharboleda@hispavista.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA MARIA MESA BEDOYA','amesa1@palermosj.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DORA ESTELLA ECHEVERRI HINCAPI','colsanjose1@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA LUZ CANO CORREA','marthaluz62@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERICA ANDREA QUINCH','ericaquinchia@hotmail.\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA HELENA ACEVEDO G','gloriacevedog@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA LILIANA SU','salisugar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERICA ANDREA QUINCH','ericaquinchia@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEIDA ARBEL','aleydaarbelaez@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA ELENA TAPIAS RENGIFO','claudelot@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SARA ESTHER ECHEVERRI JARAMILLO','saruchita@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALBA LUZ RAM','albarai17@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA LUC','anavilla@une.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA VILLEGAS MOLINA','natalia.villegas@cdm.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LEIDY JOHANA SEGURO PULGARIN','leyjohademaria@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EULALIA MERCEDES AGUIRRE LOZANO','eulaliaaguirre@ymail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA PATRICIA HOYOS SEP','sandrahoyos.colma@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS DAR','lquintero@cumbresmedellin.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARISEL DIAZ','mdiaz@docente.als.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('RICARDO BRILL','brillthiel@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SAUL SOLER','ssoler4@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAGDA D','magdaclemenciad@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA RODRIGUEZ','claudia.susana.rodriguez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESARE GAFFURRI','cgaffurri@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARMENZA BAUTISTA','albaca.carmenza@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DAVID MIRANDA','david.miranda@sancarlos.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ STELLA HUERFANO','lhuerfanos@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('XIOMARA SOLER','xicesoro@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('HUMBERTO TEQUIA','humteqpo04@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('HENRRY PI','henrrypineros@eca.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CAROLINA RICO','carito81co@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA CATALINA ZARATE','andrea.zarate@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA RODR','adriana.rodriguez@gimnasiodelnorte.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA PRADA','gloria.prada@gimnasiodelnorte.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH MARTINEZ','elizamarti@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO ARIAZ','d.perez@losportales.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA RAMIREZ','diana.ramirez@gimnasiovermont.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA CORTES','catalina.cortes@gimnasiovermont.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO FRANCO','diego.franco@gimnasiovermont.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SERGIO CACERES','sergio.caceres@gimnasiovermont.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('BEATRIZ VERGARA','headofspanish_sociales@cgb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('GONZALO SERNA','g.serna@cgb.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LETICIA GARC','leticia.demarin@iragua.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JULIANA ANDRADE','juliana.andrade@iragua.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELVA SANTOS ','elva.santos@iragua.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('BEATRIZ HENAO','beatriz.henao@iragua.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MERY OTALORA','luzmeryotalora@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS LOPEZ','luisherlopez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA AGUDELO','cmagudeloi@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DANYA HERRERA','dajuhelo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('WILSON IBA','wilsonibanez@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA MARIA PLAZAS','amplaza@colegiomayordelosandes.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('PAOLA MAYA','bibliotecanewman@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JORGE DANIEL ORTIZ','jortiz112@cibercolegios.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN FRANK PORTILLA','jpoetilla3@cibercolegios.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELES ','ihl@tisa.jazztel.es\r');
insert  into `emails`(`nombre`,`email`) values ('RITA MARIAL ALBA','laproferita@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA ROZO','martitaro2012@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN ANTONIO RODR','mfrincon@santarsicio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ADELAIDA DE RODR','mfrincon@santarsicio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DAVID MIRANDA','david.miranda@sancarlos.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ STELLA HUERFANO','lhuerfanos@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANDREA CATALINA ZARATE','andrea.zarate@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELES ','ihl@tisa.jazztel.es\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN ANTONIO RODR','mfrincon@santarsicio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ADELAIDA DE RODR','mfrincon@santarsicio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('FREDY GIOVANNI GOMEZ ','frevanni@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MARCELA ECHEVERRI','claudiamarcelaev@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR AUGUSTO JARAMILLO ALVAREZ','cesarjaramillo737@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA CUERVO ESPITIA','claudia.cuervo29@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DESIDERIO VARGAS PEREZ','telemako71@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTIAN VALENCIA','cjvh26@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA CASALLAS','profnubiahope@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA ELVIRA MALDONADO ARCHILA','marthamaldonado@cable.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS MAURICIO PERAZA ALVAREZ','carlosmperaza@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ELENA ALDANA  VARGAS','luzelenaaldana@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAMILO EDUARDO DAZA  RINCON','ajelescos2004@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GRACIELA BARRERO  MEDINA','grabamen1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUIS FERNANDO GONZALEZ  DELVALLE','lfernandogd@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN FREDY BORDA  RODRIGUEZ','johnborda3@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN JAIRO M','johnjairomendezcastillo@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANNA PAOLA LOPEZ MEDINA','coor.convivencia.lmc@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS IRIARTE SILVA','carfisi@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MIRYAN NIETO MONTOYA','fuentesnews@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('VLADIMIR ACU','vladojose80@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA ANGELICA SEGURA VARELA','ainos1974@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GRACIELA ROMERO RUIZ','romeroruiz_graciela@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CESAR AUGUSTO SEGURA VARELA','cesar_segura_@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA IMELDA DUARTE','martha45123@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CECILIA  ','cexylu@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA BONIL DE GOMEZ  ','mountvernonschool@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAIRESOL ACOSTA','maireacosta@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NESTOR','monebato@hotmail.co\r');
insert  into `emails`(`nombre`,`email`) values ('ALEJANDRA ','alejacasta@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RAFAEL ALEXIS','rafael@claustro.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE OMAR','rectoria@corazonistasbogota.com\r');
insert  into `emails`(`nombre`,`email`) values ('VICTOR IGNACIO','daza.victor@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS ','juancarloscorazonista@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAURICIO ENRIQUE','malorga33@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ISABEL','iparra@88orris.ory\r');
insert  into `emails`(`nombre`,`email`) values ('JAIR ','jair@claustromoderno.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA  ','marsalodn@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA ','oesanchezm@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHN FABIO ','jfsarami@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH','elizas77@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAIRO ENRIQUE','vjairoenrique@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS A ','carlosv@claustro.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA ','oesanchezm@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('FREDDY','freddysaruyza@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('AGUSTINIANO TAGASTE','sammym519@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALFONSO JARAMILLO','aramirez15@colegioalfonsojaramillo.org\r');
insert  into `emails`(`nombre`,`email`) values ('ALFONSO JARAMILLO','claomontezuma@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALVERNIA','nuryrola@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALVERNIA','sandrapspg@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('AMERICANO','vice.rectoria.academica@colamericano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('AMERICANO','soniapineda@colamericano.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES FEY','rosaemiliapij@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANDRES FEY','luzgalofre@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BUEN CONSEJO','carlosfernandomesaaduque@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUSTRO MODERNO','jair@claustromoderno.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('COLEGIO NUEVA INGLATERRA','cni@colegionuevainglaterra.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('COLEGIO NUEVA INGLATERRA','aprendiendoyjugando@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CONSOLATA','amparoed.fisica@hot\r');
insert  into `emails`(`nombre`,`email`) values ('CONSOLATA','carlos_crespo_67@hot\r');
insert  into `emails`(`nombre`,`email`) values ('DIVINO SALVADOR','nubyzr@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DIVINO SALVADOR','maesnava@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('EL ENCUENTRO','gloriaquintero0903@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ENCUENTRO','colegioliceoelencuentro@hot\r');
insert  into `emails`(`nombre`,`email`) values ('FUNDACI','mhreyes@etb.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('FUNDACI','jfsantacoloma@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('FUNDACI','patricia.acosta@etb.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('FUNDACI','jovimunevar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GIMNASIO LOS ROBLES','carlosmperaza@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LICEO CERVANTES','victorb04@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LICEO DE COLOMBIA','fafoari@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LICEO DE COLOMBIA','juanguifox@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LICEO PATRIA','angelmauricioj@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LICEO PATRIA','ferfrarore@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA BOSCO','sormatio24@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA BOSCO','ceciprieto24@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MODERNO CAMPESTRE','marthagelvez64@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MODERNO CAMPESTRE','esperanzatavares@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('NTRA SE','amorcerve@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('NTRA SE','yojana_marin@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUESTRA SE','concolsolbogota@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUEVO GIMNASIO ','direccion@colegionuevogimnasio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('NUEVO GIMNASIO ','cooracademica12@colegionuevogimnasio.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ROSARIO SANTO DOMINGO','Rectoria@rosariosantodomingo.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ROSARIO SANTO DOMINGO','patricianuma@rosariosantodomingo.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SUPERIOR AMERICANO','nbaccab@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SUPERIOR AMERICANO','nbaccab@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH ESPERANZA','resperanzarozo@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('PAULA YISSED','paurf_2601@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA JEANETH','milisa2@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('EDWIN LEONEL','leo_18@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA DE LOS ANGELES','angelito-111vm@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTINA','crisma_ca@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('SARA FELICIA','miinfanciacreativa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OFELIA','ofepica@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DARLING','danowil27@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA CENEIDA','martha.herrera73@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA','eliceoinfantilerika@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA PATRICIA','rectoria@gimnasiomontreal.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANNA','soanitale@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA CARDINA','adrica0204@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NIDIA ','nigarlo1985@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DIANA','diandy.424@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCELA ALEJANDRA','marce2425@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA DEL PILAR','camilotorreszipa@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEISLA PATRICIA','leislaballesteros@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANA LIDA','liceodecroly@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ CLEMENCIA','jardin-principito@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YENNY PATRICIA','eliceoinfantilerika@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARITZA ','mary.taz11@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH RUVIELA','reacherruvy@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA FERNANDA','mariafcardenas@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDITH LUCIA','lula_ap@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CEILA AIDE','ceilavasquez@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEONEL','leo.11@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('XIMENA MARCELA','daza796@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('GUILLERMO','santaisas@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIANA','giazoma@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LILIANA PATRICIA','lilipatyor@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA','luzmarinaag@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MONICA','monicabarraza1972@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA MARCELA','dir_preescolar@sanbartolo.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA INES','hnahildamar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA','esperancita_1961@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEANDRA','leispa23@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA','luzmafez@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('SOR RAMONA','monin_4@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOSE FRANCISCO','rector@colegiochampagnat.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA CAROLINA','carolinasegurab@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSA ISABEL','rosa_isabec@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CARLOS','cbarreto@maristasnorandina.org\r');
insert  into `emails`(`nombre`,`email`) values ('HNA MARIA EVA','mparrarestrepo@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('AMPARO','amlova1@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LEONOR','leolago18@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ESTHER ','acodemica@colegioprovinma.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('SOR ERLY','sorela1054@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('EDNA','edna-olaya@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('BERTHA INES','beindac@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ANDERSON ','anroca@isjrd.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('DIEGO ALEJANDRO','diegovargas@virreysolis.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARMEN GRACIELA','contchela@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ARCADIO','bolivarfrc@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN CARLOS','juangarzon2@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA','nubyzr@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ABEL','abelalfonso71@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CONCEPCION','colpilarsur@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA','soniasarria@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('GLORIA IRLEN','colegioconsolata@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('JUAN PABLO','juan.blanco@correo.policia.gnv.co\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA','claucordr@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('GUSTAVO ADOLFO','tavosdb@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA','hnasdoroteas@etb.net.co\r');
insert  into `emails`(`nombre`,`email`) values ('CECILIA','sorcgc15@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('SOR CECILIA ','ceciromja@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CONSUELO DEL SOCORRO','barcomar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OLGA LUCIA','olgaluarias@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ABELARDO','lacha2002@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MERCEDES ','mercedeskalil@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA ','adrianas076@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA CONSTANZA ','lsvcolegio2009@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGELA MARIA  ','angelama_73@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('EDWIN ALBEIRO ','edweste2003@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('EVIDELIA','evideliaabello@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JHON ALEJANDRO ','frutas04@live.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOS','libijlo@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ANGELA  ','angelitarojas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ HELENA ','luzhmahecha@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARGARITA','jmictus2011@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIELA ','malibu701@hotmail.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('YENIFER LORENA  ','yelore1111@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YULY YAMIL ','LICEODDELFOS@HOTMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('ADRIANA CRISTINA </','adricristinalara@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ALEXANDER ','alcasi29@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('ALEYDA ','aleloca_76@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('AMANDA','amcasas36@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ANGEICA','angelicaygq@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CAMILO ','gerencia@gimnasiolaspalmas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('CARMENZA','girazoma@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CATALINA ','descubriendo_mi_mundo@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('CLAUDIA MARINA','claudia.cuervo29@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('CRISTIAN','cjvh26@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DANNY ALEXANDER ','danncort@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('DELIA PATRICIA ','curtidorpatricia@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('DESIDERIO','telemako71@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ELIZABETH ','coordconvivencia37@yahoo.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('ELSY','liceo.castilla@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ERIKA ','rectoria.asis@gimnasiolaspalmas.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('IRENE ','colegiocristianosinai@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ISABEL ','neylaparra2001@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('IVETTE MILENA  ','mile.lozada@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAIRO ANTONIO ','jamh18@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JAVIER ','curtidorjavier@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JEISSON ANDRES ','jeisson.pabono@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JHON JAIRO ','liceo.castilla@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHANNA PATRICIA ','johana.johis72@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('JOHNNY ALBERTO ','Turbo_militar@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LETY','rectoria@colegiofervan.edu.com\r');
insert  into `emails`(`nombre`,`email`) values ('LIBARDO','rectormuzu@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUCY YILENY ','yilenyp17@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ ANGELA ','gimnasio_caceres@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('LUZ MARINA ','luzmasana@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARCO ','marcoa86@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARIA NANCY ','marianancygalvis@yahoo.es\r');
insert  into `emails`(`nombre`,`email`) values ('MARINA ','maxplanck_1enbogota@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARITZA ','maritzamonroy@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA CATALINA  ','colegio@minutodedios.org\r');
insert  into `emails`(`nombre`,`email`) values ('MARTHA CONSTANZA ','mbaez43@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MAURICIO ','coordinaciongeneral@toscana.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('MIREYA','almimu57@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('MIRIAM','MYRIAMYANETHP@HOTMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('MYRIAM YANETH ','myriamyanethp@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NANCY ESPERANZA ','nancyerueda@hotmail.es\r');
insert  into `emails`(`nombre`,`email`) values ('NATALIA CAROLINA ','nathaliac19@gmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('NUBIA ESPERANZA ','liceo.castilla@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('ORLANDO  ','orgjndj@yahoo.com\r');
insert  into `emails`(`nombre`,`email`) values ('','oscarcasallas@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('OSCAR AUGUSTO ','itla@itlandes.edu.co\r');
insert  into `emails`(`nombre`,`email`) values ('RICARDO ','ricardoregino47@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RONALD EDISSON  ','rony_110@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('ROSA ESPERANZA ','roesbali@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('RUTH JULIETA ','ruth.yuli@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA  JAKELINE ','sanjakesa@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('SANDRA YAMILE ','svera@cafam.com.co\r');
insert  into `emails`(`nombre`,`email`) values ('SONIA ','COLEGIOMONSERRATE123@HOTMAIL.COM\r');
insert  into `emails`(`nombre`,`email`) values ('TATIANA YULIETH ','tatianap26@hotmail.com\r');
insert  into `emails`(`nombre`,`email`) values ('YOLANDA ','neylaparra2001@yahoo.com\r');

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id` int(11) NOT NULL auto_increment,
  `id_pais` char(3) NOT NULL default '',
  `pais` varchar(50) NOT NULL default '',
  `orden` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=latin1 COMMENT='Tabla Auxilar de Paises';

/*Data for the table `pais` */

insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (1,'CO','Colombia',1);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (2,'AS','Samoa occidental',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (3,'WS','Samoa',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (4,'RU','Rusia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (5,'RO','Rumania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (6,'RW','Ruanda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (7,'RE','Reunion',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (8,'DO','Republica dominicana',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (9,'CD','Republica Democratica del Congo(Zaire)',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (10,'ZA','Republica de Sudafrica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (11,'CZ','Republica Checa',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (12,'CF','Republica Centroafricana',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (13,'UK','Reino Unido',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (14,'QA','Qatar',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (15,'PR','Puerto Rico',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (16,'PT','Portugal',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (17,'PL','Polonia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (18,'PF','Polinesia francesa',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (19,'PN','Pitcairn',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (20,'PE','Peru',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (21,'PY','Paraguay',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (22,'PK','Paquistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (23,'PG','Papua Nueva Guinea',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (24,'PA','Panama',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (25,'OM','Oman',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (26,'NZ','Nueva Zelanda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (27,'NC','Nueva Caledonia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (28,'NO','Noruega',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (29,'NF','Norfolk',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (30,'NU','Niue',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (31,'NG','Nigeria',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (32,'NE','Niger',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (33,'NI','Nicaragua',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (34,'NP','Nepal',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (35,'NR','Nauru',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (36,'NA','Namibia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (37,'MZ','Mozambique',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (38,'MS','Montserrat',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (39,'MN','Mongolia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (40,'MC','Monaco',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (41,'MD','Moldavia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (42,'FM','Micronesia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (43,'MX','Mexico',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (44,'YT','Mayotte',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (45,'MR','Mauritania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (46,'MU','Mauricio',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (47,'MQ','Martinica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (48,'MA','Marruecos',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (49,'MT','Malta',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (50,'ML','Mali',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (51,'MV','Maldivas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (52,'MW','Malawi',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (53,'MY','Malasia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (54,'MG','Madagascar',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (55,'MO','Macao R. A. E',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (56,'LU','Luxemburgo',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (57,'LT','Lituania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (58,'LI','Liechtenstein',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (59,'LY','Libia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (60,'LR','Liberia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (61,'LB','Libano',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (62,'LV','Letonia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (63,'LS','Lesotho',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (64,'LA','Laos',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (65,'KW','Kuwait',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (66,'KI','Kiribati',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (67,'KG','Kirguizistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (68,'KE','Kenia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (69,'KZ','Kazajistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (70,'JO','Jordania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (71,'JP','Japon',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (72,'JM','Jamaica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (73,'IT','Italia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (74,'IL','Israel',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (75,'VG','Islas Virgenes',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (76,'TC','Islas Turks y Caicos',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (77,'TK','Islas Tokelau',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (78,'SB','Islas Salomon',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (79,'PW','Islas Palau',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (80,'UM','Islas menores de USA',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (81,'MH','Islas Marshall',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (82,'MP','Islas Marianas del norte',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (83,'FK','Islas Malvinas (Islas Falkland)',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (84,'FJ','Islas Fiyi',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (85,'FO','Islas Faroe',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (86,'CC','Islas de Cocos o Keeling',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (87,'CK','Islas Cook',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (88,'KY','Islas Caiman',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (89,'IS','Islandia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (90,'HM','Isla Heard e Islas McDonald',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (91,'CX','Isla de Christmas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (92,'BV','Isla Bouvet',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (93,'IE','Irlanda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (94,'IR','Iran',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (95,'IQ','Irak',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (96,'ID','Indonesia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (97,'IN','India',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (98,'HU','Hungria',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (99,'HK','Hong Kong R. A. E',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (100,'HN','Honduras',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (101,'NL','Holanda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (102,'HT','Haiti',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (103,'GW','Guinea-Bissau',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (104,'GQ','Guinea Ecuatorial',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (105,'GN','Guinea',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (106,'GF','Guayana francesa',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (107,'GY','Guayana',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (108,'GT','Guatemala',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (109,'GU','Guam',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (110,'GP','Guadalupe',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (111,'GL','Groenlandia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (112,'GR','Grecia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (113,'GD','Granada',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (114,'GI','Gibraltar',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (115,'GH','Ghana',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (116,'GS','Georgia del Sur',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (117,'GE','Georgia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (118,'GM','Gambia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (119,'GA','Gabon',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (120,'FR','Francia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (121,'FI','Finlandia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (122,'PH','Filipinas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (123,'MK','Yugoslava de Macedonia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (124,'ET','Etiopia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (125,'EE','Estonia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (126,'US','Estados Unidos',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (127,'ES','Espa?a',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (128,'SI','Eslovenia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (129,'SK','Eslovaquia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (130,'ER','Eritrea',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (131,'AE','Emiratos arabes Unidos',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (132,'SV','El Salvador',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (133,'EG','Egipto',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (134,'EC','Ecuador',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (135,'DM','Dominica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (136,'DJ','Djibouri',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (137,'DK','Dinamarca',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (138,'CU','Cuba',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (139,'HR','Croacia (Hrvatska)',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (140,'CR','Costa Rica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (141,'CI','Costa del Marfil',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (142,'KP','Corea del Norte',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (143,'KR','Corea',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (144,'CG','Congo',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (145,'KM','Comores',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (146,'CY','Chipre',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (147,'CN','China',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (148,'CL','Chile',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (149,'TD','Chad',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (150,'CA','Canada',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (151,'CM','Camerun',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (152,'KH','Camboya',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (153,'CV','Cabo Verde',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (154,'BI','Burundi',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (155,'BF','Burkina Faso',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (156,'BG','Bulgaria',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (157,'BN','Brunei',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (158,'BR','Brasil',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (159,'BW','Botswana',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (160,'BA','Bosnia y Herzegovina',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (161,'BO','Bolivia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (162,'MM','Birmania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (163,'BY','Bielorrusia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (164,'BT','Bhutan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (165,'BM','Bermudas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (166,'BJ','Benin',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (167,'BZ','Belice',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (168,'BE','Belgica',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (169,'BB','Barbados',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (170,'BD','Bangladesh',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (171,'BH','Bahrein',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (172,'BS','Bahamas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (173,'AZ','Azerbaiyan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (174,'AT','Austria',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (175,'AU','Australia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (176,'AW','Aruba',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (177,'AM','Armenia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (178,'AR','Argentina',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (179,'DZ','Argelia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (180,'SA','Arabia Saudi',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (181,'AN','Antillas holandesas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (182,'AG','Antigua y Barbuda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (183,'AQ','Antartida',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (184,'AI','Anguilla',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (185,'AO','Angola',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (186,'AD','Andorra',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (187,'DE','Alemania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (188,'AL','Albania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (189,'AF','Afganistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (190,'KN','San Kitts y Nevis',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (191,'SM','San Marino',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (192,'PM','San Pierre y Miquelon',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (193,'VC','San Vicente e Islas Granadinas',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (194,'SH','Santa Helena',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (195,'LC','Santa Lucia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (196,'ST','Santo Tome y Principe',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (197,'SN','Senegal',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (198,'SC','Seychelles',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (199,'SL','Sierra Leona',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (200,'SG','Singapur',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (201,'SY','Siria',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (202,'SO','Somalia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (203,'LK','Sri Lanka',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (204,'SZ','Suazilandia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (205,'SD','Sudan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (206,'SE','Suecia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (207,'CH','Suiza',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (208,'SR','Surinam',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (209,'SJ','Svalbard',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (210,'TH','Tailandia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (211,'TW','Taiwan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (212,'TZ','Tanzania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (213,'TJ','Tayikistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (214,'IO','Territorios britanicos indico',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (215,'TF','Territorios franceses del sur',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (216,'TP','Timor oriental',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (217,'TG','Togo',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (218,'TO','Tonga',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (219,'TT','Trinidad y Tobago',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (220,'TN','Tunez',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (221,'TM','Turkmenistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (222,'TR','Turquia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (223,'TV','Tuvalu',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (224,'UA','Ucrania',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (225,'UG','Uganda',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (226,'UY','Uruguay',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (227,'UZ','Uzbekistan',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (228,'VU','Vanuatu',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (229,'VA','Ciudad estado del Vaticano',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (230,'VE','Venezuela',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (231,'VN','Vietnam',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (232,'VI','islas Virgenes (EE.UU.)',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (233,'WF','Wallis y Futuna',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (234,'YE','Yemen',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (235,'YU','Serbia y Montenegro',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (236,'ZM','Zambia',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (237,'ZW','Zimbabwe',2);
insert  into `pais`(`id`,`id_pais`,`pais`,`orden`) values (238,'OT','OTRO',2);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `nombres` varchar(40) default NULL,
  `apellidos` varchar(40) default NULL,
  `identificacion` varchar(20) default NULL,
  `email` varchar(30) default NULL,
  `direccion` varchar(50) default NULL,
  `telefono` varchar(20) default NULL,
  `pass` varchar(30) default NULL,
  `publicado` tinyint(1) default NULL,
  `fecha_actualizacion` date default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v12.3.2 (64 bit)
MySQL - 5.7.27-log : Database - tienda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tienda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tienda`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `id_rol` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_id_rol_foreign` (`id_rol`),
  CONSTRAINT `admins_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`last_name`,`status`,`id_rol`) values 
(1,'admin','admin@admin.com',NULL,'$2y$10$fZMZ20HjThBDWzSV160iOuItgRbe3w3Bkpi0j7MPWrUmJBG82GdqO','sIs3aB8Bq2JC7UWijbKKQvecJXiTfTJ3WN4y7sFE36uFmQd7Sj6Qj5slnIWu','2021-03-13 11:18:13','2021-03-15 18:26:12','admin','ACTIVO',1),
(5,'Hugo','hugo@benitez',NULL,'$2y$10$ZXvidNBcGWQkH9veyxTR4O2/HiVlDk9L7xneIZSRuSm0JmJ9AQB.q',NULL,'2021-03-15 20:43:09','2021-03-15 20:43:09','benitez','ACTIVO',3);

/*Table structure for table `attribute_values` */

DROP TABLE IF EXISTS `attribute_values`;

CREATE TABLE `attribute_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(2,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_values_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attribute_values` */

insert  into `attribute_values`(`id`,`attribute_id`,`value`,`price`,`created_at`,`updated_at`) values 
(1,1,'small',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(2,1,'medium',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(3,1,'large',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(4,2,'black',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(5,2,'blue',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(6,2,'red',NULL,'2021-03-13 11:18:18','2021-03-13 11:18:18'),
(7,2,'orange',NULL,'2021-03-13 11:18:19','2021-03-13 11:18:19');

/*Table structure for table `attributes` */

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frontend_type` enum('select','radio','text','text_area') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_filterable` tinyint(1) NOT NULL DEFAULT '0',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attributes` */

insert  into `attributes`(`id`,`code`,`name`,`frontend_type`,`is_filterable`,`is_required`,`created_at`,`updated_at`) values 
(1,'size','Size','select',1,1,'2021-03-13 11:18:17','2021-03-13 11:18:17'),
(2,'color','Color','select',1,1,'2021-03-13 11:18:17','2021-03-13 11:18:17');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`slug`,`logo`,`created_at`,`updated_at`) values 
(1,'Samsung','samsung',NULL,'2021-03-13 16:38:26','2021-03-15 15:39:26'),
(2,'Xiaomi','xiaomi',NULL,'2021-03-14 13:37:55','2021-03-14 13:37:55'),
(11,'Mac','mac',NULL,'2021-03-15 19:08:09','2021-03-15 19:08:09'),
(12,'HP','hp',NULL,'2021-03-15 19:22:22','2021-03-15 19:22:22');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(10) unsigned DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `menu` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`description`,`parent_id`,`featured`,`menu`,`image`,`created_at`,`updated_at`) values 
(1,'Principal','principal','categoría principal',NULL,0,0,NULL,'2021-03-13 11:18:16','2021-03-13 11:18:16'),
(2,'Celulares','celulares','computadoras',1,0,1,NULL,'2021-03-13 11:18:16','2021-03-13 16:39:31'),
(15,'Computadoras','computadoras','Computadoras',1,1,1,NULL,'2021-03-14 22:22:10','2021-03-14 22:26:18'),
(16,'Impresoras','impresoras','impresoras',1,0,1,NULL,'2021-03-15 19:06:48','2021-03-15 19:06:51'),
(17,'Televisores','televisores','televisores led',1,1,0,NULL,'2021-03-15 19:44:12','2021-03-15 19:44:12'),
(18,'Teclados','teclados','teclados usb para computadoras',1,1,1,NULL,'2021-03-15 20:40:33','2021-03-15 20:40:33');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_05_16_084727_create_admins_table',1),
(4,'2019_05_27_114658_create_settings_table',1),
(5,'2019_06_04_110601_create_categories_table',1),
(6,'2019_06_20_083625_create_attributes_table',1),
(7,'2019_06_20_085828_create_attribute_values_table',1),
(8,'2019_07_17_083825_create_brands_table',1),
(9,'2019_07_24_083500_create_products_table',1),
(10,'2019_07_24_083527_create_product_images_table',1),
(11,'2019_07_24_090328_create_product_attributes_table',1),
(12,'2019_07_24_090552_create_product_categories_table',1),
(13,'2019_07_24_092222_create_attribute_value_product_attribute_table',1),
(14,'2019_08_12_094451_alter_product_attributes_table',1),
(15,'2019_08_12_095126_drop_attribute_value_product_attribute_table',1),
(16,'2019_09_11_150147_create_orders_table',1),
(17,'2019_09_11_150205_create_order_items_table',1),
(18,'2021_03_13_112259_create_users_table',2),
(19,'2021_03_13_112644_create_orders_table',2),
(20,'2021_03_13_112934_create_orders_items_table',2),
(21,'2021_03_14_173442_create_roles_table',3),
(22,'2021_03_15_012651_add_status_to_roles',4),
(23,'2021_03_15_111747_add_status_to_admins',5);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` enum('pendiente','procesando','completo','rechazado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `grand_total` decimal(20,6) NOT NULL,
  `item_count` int(10) unsigned NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '1',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`order_number`,`user_id`,`status`,`grand_total`,`item_count`,`payment_status`,`payment_method`,`nombre`,`apellido`,`ciudad`,`direccion`,`telefono`,`notas`,`created_at`,`updated_at`) values 
(7,'ORD-604FAF847FB64',1,'pendiente',200.000000,2,0,NULL,'juan daniel','perez','Encarnacion','Barrio san pedro','098345791',NULL,'2021-03-15 16:03:32','2021-03-15 16:03:32'),
(17,'ORD-604FDEFC06450',2,'pendiente',40.000000,1,0,NULL,'martin','pereira','Capitan mirada','calle a','0984531678','Necesito delivery','2021-03-15 19:26:04','2021-03-15 19:26:04'),
(18,'ORD-604FE3D26E712',2,'pendiente',400.000000,1,0,NULL,'martin','pereira','Capitan mirada','calle a','0984531678',NULL,'2021-03-15 19:46:42','2021-03-15 19:46:42'),
(19,'ORD-604FF1E548D61',3,'pendiente',100.000000,1,0,NULL,'Facundo','Suenaga','Encarnacion','barrio san roque','09845890977',NULL,'2021-03-15 20:46:45','2021-03-15 20:46:45');

/*Table structure for table `orders_items` */

DROP TABLE IF EXISTS `orders_items`;

CREATE TABLE `orders_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` decimal(20,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_items_order_id_index` (`order_id`),
  KEY `orders_items_product_id_index` (`product_id`),
  CONSTRAINT `orders_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_items` */

insert  into `orders_items`(`id`,`order_id`,`product_id`,`quantity`,`price`,`created_at`,`updated_at`) values 
(12,17,6,1,40.000000,'2021-03-15 19:26:04','2021-03-15 19:26:04'),
(13,18,5,1,400.000000,'2021-03-15 19:46:42','2021-03-15 19:46:42'),
(14,19,4,1,100.000000,'2021-03-15 20:46:45','2021-03-15 20:46:45');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_attributes` */

DROP TABLE IF EXISTS `product_attributes`;

CREATE TABLE `product_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attributes_product_id_foreign` (`product_id`),
  KEY `product_attributes_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_attributes` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_category_id_foreign` (`category_id`),
  KEY `product_categories_product_id_foreign` (`product_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_id`,`product_id`) values 
(1,2,1),
(2,2,2),
(3,2,3),
(4,15,4),
(5,15,5),
(6,16,6),
(7,16,7),
(8,1,8),
(9,2,9);

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `full` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_index` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`full`,`created_at`,`updated_at`) values 
(1,1,'products/bZDuQl9bwNRIKG7NtqR8IDSFx.jpg','2021-03-13 16:53:05','2021-03-13 16:53:05'),
(2,1,'products/C5V3HzkOpntE5EIEb29QuzqsA.jpg','2021-03-13 16:53:26','2021-03-13 16:53:26'),
(4,3,'products/zXRkN8tJBOwtsTJvGtf9bX6mt.jpg','2021-03-15 15:55:19','2021-03-15 15:55:19'),
(5,2,'products/14XaxFZFqE0qi6U2MZOH1lfit.jpg','2021-03-15 15:57:36','2021-03-15 15:57:36'),
(6,4,'products/LhwquVDWkrleigiuqKefYlC9y.png','2021-03-15 19:11:20','2021-03-15 19:11:20'),
(7,5,'products/eK6CiyUaNyFnOAVDf6PFEufmP.jpg','2021-03-15 19:14:48','2021-03-15 19:14:48'),
(8,6,'products/19lk50ynJRVEGdJucBDuRNT5w.png','2021-03-15 19:23:34','2021-03-15 19:23:34'),
(9,7,'products/phce9NRES9q2seCjepErUVNim.png','2021-03-15 19:37:27','2021-03-15 19:37:27'),
(10,7,'products/xWW2xivT1kNepgTzr972pBoFF.png','2021-03-15 20:42:05','2021-03-15 20:42:05');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` bigint(20) unsigned NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(10) unsigned NOT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_brand_id_index` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`brand_id`,`sku`,`name`,`slug`,`description`,`quantity`,`weight`,`price`,`sale_price`,`status`,`featured`,`created_at`,`updated_at`) values 
(1,1,'a10','Samsung a10','samsung-a10','Pantalla: 6.2\", 720 x 1520 pixels\r\nProcesador: Exynos 7884 1.6GHz\r\nRAM: 2GB\r\nAlmacenamiento: 32GB\r\nExpansión: microSD\r\nCámara: Dual, 13MP+2MP\r\nBatería: 4000 mAh\r\nOS: Android 9.0\r\nPerfil: 7.8 mm\r\nPeso: 168 g',1,10.00,100.00,NULL,1,1,'2021-03-13 16:40:44','2021-03-15 16:02:26'),
(2,1,'a10s','Samsung a10 s','samsung-a10-s','Pantalla: 6.2\", 720 x 1520 pixels\r\nProcesador: MediaTek Helio P22 2GHz\r\nRAM: 2GB\r\nAlmacenamiento: 32GB\r\nExpansión: microSD',23,NULL,110.00,NULL,1,1,'2021-03-14 22:49:51','2021-03-15 15:57:01'),
(3,1,'a8','Samsung a8 plus','samsung-a8-plus','Pantalla: 6\", 1080 x 2220 pixels\r\nProcesador: Exynos 7885 Octa 2.2GHz\r\nRAM: 4GB/6GB\r\nAlmacenamiento: 32GB/64GB\r\nExpansión: microSD\r\nCámara: 16 MP\r\nBatería: 3500 mAh\r\nOS: Android 7.1.1\r\nPerfil: 8.3 mm\r\nPeso: 191 g',10,NULL,100.00,NULL,1,0,'2021-03-15 15:53:41','2021-03-15 15:53:41'),
(4,11,'macair','MacBook air','macbook-air','Panel LCD IPS Retina (2.560 x 1.600 puntos) con 227 ppp, 13,3 pulgadas, retroiluminación LED y relación de aspecto 16:10\r\nIntel Core i5 de doble núcleo a 1,6 GHz (Turbo Boost de hasta 3,6 GHz) y 4 MB de caché de nivel 3',10,NULL,100.00,NULL,1,0,'2021-03-15 19:11:02','2021-03-15 19:11:02'),
(5,11,'pro19','Mac pro 2019','mac-pro-2019','16 GB de RAM y SSD de 1 TB.\r\nIntel Core i9 de 8 núcleos\r\nChip M1 de Apple',10,NULL,400.00,NULL,1,0,'2021-03-15 19:14:35','2021-03-15 19:14:35'),
(6,12,'hp2135','Impresora HP 2135','impresora-hp-2135','Papel común, papel fotográfico, papel para folletos\r\nVelocidad en Negro: Hasta 7,5 ppm Borrador: Hasta 20 ppm\r\nISO: Hasta 7,5 ppm Borrador: Hasta 20 ppm\r\nResolución de escaneo:Hasta 1200 ppp\r\nCiclo de trabajo (Mensual, A4): Hasta 1000 páginas\r\nVolumen de páginas mensuales recomendados: 50 a 200',10,NULL,40.00,NULL,1,0,'2021-03-15 19:23:17','2021-03-15 19:23:17'),
(7,12,'hp1275','Impresora Hp 1275','impresora-hp-1275','Capacidad de salida 25 hojas\r\nFamilia: Deskjet\r\nFunciones: solo impresion\r\nTecnologia:  INK',10,NULL,30.00,NULL,1,0,'2021-03-15 19:37:16','2021-03-15 19:37:16'),
(8,12,'USB098','Teclados usb','teclados-usb','TECLADOS USB',10,NULL,34.00,NULL,1,1,'2021-03-15 20:41:37','2021-03-15 20:41:37'),
(9,1,'a101','Samsung a101','samsung-a101','Celulares',10,NULL,100.00,NULL,1,0,'2021-03-15 20:56:18','2021-03-15 20:56:18');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_description_unique` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`description`,`status`) values 
(1,'Administrador','ACTIVO'),
(2,'Secretaria','ACTIVO'),
(3,'Repartidor','ACTIVO'),
(9,'vendedores','INACTIVO');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`,`created_at`,`updated_at`) values 
(1,'site_name','E-Commerce','2021-03-13 11:18:13','2021-03-13 16:29:52'),
(2,'site_title','E-Commerce','2021-03-13 11:18:13','2021-03-13 11:18:13'),
(3,'default_email_address','admin@admin.com','2021-03-13 11:18:13','2021-03-13 11:18:13'),
(4,'currency_code','USD','2021-03-13 11:18:13','2021-03-13 11:18:13'),
(5,'currency_symbol','usd','2021-03-13 11:18:13','2021-03-13 11:18:13'),
(6,'site_logo','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(7,'site_favicon','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(8,'footer_copyright_text','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(9,'seo_meta_title','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(10,'seo_meta_description','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(11,'social_facebook','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(12,'social_twitter','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(13,'social_instagram','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(14,'social_linkedin','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(15,'google_analytics','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(16,'facebook_pixels','','2021-03-13 11:18:14','2021-03-13 11:18:14'),
(17,'stripe_payment_method','','2021-03-13 11:18:15','2021-03-13 11:18:15'),
(18,'stripe_key','','2021-03-13 11:18:15','2021-03-13 11:18:15'),
(19,'stripe_secret_key','','2021-03-13 11:18:15','2021-03-13 11:18:15'),
(20,'paypal_payment_method','1','2021-03-13 11:18:15','2021-03-13 16:24:14'),
(21,'paypal_client_id','Afxo3PXr4b5ZK8f4ryLb3QKT4YRsWdfbqIcik4j6mAn4CeG7AuBVqeNYmybO_E36xaxyrvJB4nGDy-C1','2021-03-13 11:18:15','2021-03-13 16:24:14'),
(22,'paypal_secret_id','EGMj6U6apu74PtV77XPkUQStuHUdVHRFUxFYb1NeQM6OIH2Y4htdKfHMFMrtrqX1PXrnFXqopmXbxYcQ','2021-03-13 11:18:15','2021-03-13 16:24:14');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nombre`,`apellido`,`email`,`email_verified_at`,`password`,`ciudad`,`direccion`,`telefono`,`remember_token`,`created_at`,`updated_at`) values 
(1,'juan daniel','perez','juanpd@gmail.com',NULL,'$2y$10$cqA78aK1aZahqgqalitZQuTsCyq8bTI9INiaBOm.r9IlUwoF9xXGq','Encarnacion','Barrio san pedro','0981234521',NULL,'2021-03-13 11:50:46','2021-03-13 11:50:46'),
(2,'martin','pereira','martinpereira@gmail.com',NULL,'$2y$10$xieu9/ZRAMGKfZyZNlG5KuE5lylQ6iN4e78VsqGyz93AkAuxXN71C','Capitan mirada','calle a','0984531678',NULL,'2021-03-15 17:49:19','2021-03-15 17:49:19'),
(3,'Facundo','Suenaga','facundoabc@gmail.com',NULL,'$2y$10$Rtf8TSW2N7bhM/1rlh9UieIoRTrb8KbvHvP76Vt6kKSBRqlwSBi6m','Encarnacion','barrio san roque','09845890977',NULL,'2021-03-15 20:37:53','2021-03-15 20:37:53'),
(4,'juan','perez','juanpd1@gmail.com',NULL,'$2y$10$2Uf9lmkwXTNPRAptD9FYoOSoUbomvjYqpkTBwMSzx.FsBNPkG01bi','Encarnacion','Encarnacion, Itapua','0984582563',NULL,'2021-03-15 20:57:24','2021-03-15 20:57:24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

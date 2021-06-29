/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.19-MariaDB : Database - dynamiccreatived_platoon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ad_users` */

DROP TABLE IF EXISTS `ad_users`;

CREATE TABLE `ad_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ad_users` */

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ads` */

insert  into `ads`(`id`,`category_id`,`user_id`,`title`,`slug`,`price`,`description`,`image`,`status`,`is_featured`,`created_at`,`updated_at`) values 
(1,5,7,'882','882',779,'Veniam incididunt e','16103723925ffc552899dcf.jpg',0,0,'2021-01-11 18:39:53','2021-01-11 18:39:53'),
(2,2,2,'Test','test',12,'test','162336350260c28fae69f85.gif',0,0,'2021-06-11 03:18:22','2021-06-11 03:18:22');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `category_type` enum('ads','blog') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`slug`,`image`,`description`,`parent_id`,`category_type`,`created_at`,`updated_at`) values 
(1,'Business','business','ico-1.png',NULL,0,'ads','2020-12-23 05:51:47','2020-12-23 05:51:47'),
(2,'Cars','cars','ico-2.png',NULL,0,'ads','2020-12-23 05:51:47','2020-12-23 05:51:47'),
(3,'Hotels','hotels','ico-3.png',NULL,0,'ads','2020-12-23 05:51:47','2020-12-23 05:51:47'),
(4,'Food','food','ico-4.png',NULL,0,'ads','2020-12-23 05:51:47','2020-12-23 05:51:47'),
(5,'Jobs','jobs','ico-5.png',NULL,0,'ads','2020-12-23 05:51:47','2020-12-23 05:51:47'),
(6,'Services','services','ico-6.png',NULL,0,'ads','2020-12-23 05:51:48','2020-12-23 05:51:48');

/*Table structure for table `contact_us` */

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_us` */

/*Table structure for table `ecommerce_category` */

DROP TABLE IF EXISTS `ecommerce_category`;

CREATE TABLE `ecommerce_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `total_products` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ecommerce_category` */

insert  into `ecommerce_category`(`id`,`name`,`slug`,`parent_id`,`total_products`,`is_active`,`created_at`,`updated_at`) values 
(2,'test','test',0,0,1,'2021-06-16 23:14:31','2021-06-16 23:14:31'),
(3,'test2','test2',0,0,1,'2021-06-16 23:14:39','2021-06-16 23:14:39'),
(4,'test','test',0,0,1,'2021-06-16 23:19:49','2021-06-16 23:19:49');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` enum('internship','freelancer','part_time','full_time','contract_base') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift` enum('morning','evening','night') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_type` enum('monthly','weekly','daily','hourly','yearly') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allownces` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_till` timestamp NULL DEFAULT NULL,
  `job_status` enum('pending','no_longer_available') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `urgent` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

insert  into `jobs`(`id`,`user_id`,`category_id`,`company_logo`,`company_name`,`location`,`country`,`phone_number`,`email`,`designation`,`job_type`,`shift`,`experience`,`qualification`,`currency`,`pay_start`,`pay_end`,`pay_type`,`description`,`allownces`,`requirements`,`valid_till`,`job_status`,`status`,`urgent`,`featured`,`created_at`,`updated_at`) values 
(1,1,11,'16087061905fe2e88ecf45c.jpg','Daugherty Dalton Plc','Nulla sed dolor aliq','Quos veritatis neque','+1 (728) 509-6817','wyroqatig@mailinator.com','Quaerat ut nihil ab','full_time','evening','Nemo dignissimos por','Iste maiores sequi n','GBP','32','49','hourly','<p>Sint ex molestiae fa.</p>','<p>In sed dolore ex cup.</p>','<p>Mollitia deleniti vo.</p>','2020-12-29 00:00:00','pending',1,0,0,'2020-12-23 06:49:50','2020-12-23 06:50:59'),
(2,1,1,'16087062015fe2e8999b774.jpg','Carrillo and Garner Co','Non duis do exercita','Ducimus earum est v','+1 (638) 309-2376','jovawodi@mailinator.com','Delectus rerum odit','part_time','morning','Elit quo distinctio','Anim ipsa dicta fug','EUR','92','3','monthly','<p>Rerum officiis debit.</p>','<p>Sunt tempora eum mol.</p>','<p>Assumenda doloremque.</p>','2020-12-29 00:00:00','no_longer_available',1,0,0,'2020-12-23 06:50:01','2020-12-23 06:50:48'),
(3,1,1,'162336361360c2901d9cda0.gif','test312','2123132','usa','+1231231','yruxwork@gmail.com','1212','internship','morning','12','12','USD','5000','10000','monthly','<p>asdadasdasd</p>','<p>asdadasdasd</p>','<p>asdadasdasd</p>','2021-06-17 05:00:00','pending',1,1,1,'2021-06-11 03:20:13','2021-06-11 03:20:33'),
(4,15,2,'162336378660c290ca81192.gif','123123','12312','564','12','654123@Gmail.com','1231','freelancer','night','12312','123','USD','1221','12313','monthly','<p>asd</p>','<p>asd</p>','<p>asd</p>','2021-06-19 05:00:00','pending',1,1,1,'2021-06-11 03:23:06','2021-06-11 03:23:14');

/*Table structure for table `jobs_categories` */

DROP TABLE IF EXISTS `jobs_categories`;

CREATE TABLE `jobs_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs_categories` */

insert  into `jobs_categories`(`id`,`title`,`slug`,`description`,`created_at`,`updated_at`) values 
(1,'Accounting / Finance','accounting-finance','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(2,'Automotive Jobs','automotive-jobs','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(3,'Business','business','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(4,'Design & Multimedia','design-multimedia','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(5,'Education Training','education-training','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(6,'Healthcare','healthcare','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(7,'Human Resource','human-resource','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(8,'Restaurant & Food','restaurant-food','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(9,'Telecommunications','telecommunications','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(10,'Transportation','transportation','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL),
(11,'Software','software','Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',NULL,NULL);

/*Table structure for table `jobs_users` */

DROP TABLE IF EXISTS `jobs_users`;

CREATE TABLE `jobs_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('applied','pending','refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs_users` */

insert  into `jobs_users`(`id`,`user_id`,`job_id`,`attachment`,`comments`,`status`,`created_at`,`updated_at`) values 
(1,2,2,'16087063205fe2e910c7ed4.doc','Sed ea veniam id in in laboris consequat labore nulla aliquip elit in magna consectetur incididunt sunt cupidatat dolore.','refused','2020-12-23 06:52:00','2020-12-23 13:08:41');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2020_11_16_082143_create_sessions_table',1),
(7,'2020_11_17_093750_create_categories_table',1),
(8,'2020_11_17_093850_create_ads_table',1),
(9,'2020_11_19_093519_create_contact_us_table',1),
(10,'2020_11_24_125849_create_blogs_table',1),
(11,'2020_11_27_110848_create_jobs_table',1),
(12,'2020_11_27_120546_create_job_user_table',1),
(13,'2020_11_27_120832_create_job_category_table',1),
(14,'2020_12_03_082121_add_column_is_featured_in_ads_table',1),
(15,'2020_12_03_121558_create_ad_users',1),
(16,'2021_06_15_210733_create_product_table',2),
(17,'2021_06_16_193757_create_product_images_table',3),
(18,'2021_06_16_223222_create_ecommerce_category_table',4),
(19,'2021_06_16_233409_add_is_vendor_column_in_user',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_path`,`created_at`,`updated_at`) values 
(1,19,'162387318060ca569c58d47.png','2021-06-16 19:53:00','2021-06-16 19:53:00'),
(2,19,'162387318060ca569c6284c.png','2021-06-16 19:53:00','2021-06-16 19:53:00');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `discount` decimal(12,2) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `handle_stock` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`slug`,`description`,`short_description`,`price`,`discount`,`is_active`,`user_id`,`category_id`,`views`,`meta_title`,`meta_keywords`,`meta_description`,`stock`,`handle_stock`,`created_at`,`updated_at`) values 
(2,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(3,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(4,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(5,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(6,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(7,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(8,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(9,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(10,'test','ttest','ttest','ttest',12.00,12.00,1,0,0,0,'ttest','ttest','ttest',0,0,'2021-06-16 02:22:35','2021-06-16 02:22:37'),
(11,'test','test','<p>123123</p>','123231',12.00,12.00,1,0,0,0,'12','12','12',2,0,'2021-06-16 18:39:00','2021-06-16 18:39:00'),
(12,'test','test','<p>123123</p>','123231',12.00,12.00,1,0,0,0,'12','12','12',2,0,'2021-06-16 18:41:00','2021-06-16 18:41:00'),
(13,'test','test','<p>123123</p>','123231',12.00,12.00,1,0,0,0,'12','12','12',2,0,'2021-06-16 18:41:54','2021-06-16 18:41:54'),
(15,'test','test','<p>123123</p>','123231',12.00,12.00,1,0,0,0,'12','12','12',2,0,'2021-06-16 18:45:26','2021-06-16 18:45:26'),
(17,'123123','123123','<p>123123</p>','123123',12.00,12.00,1,0,0,0,'12','12','12',0,0,'2021-06-16 19:50:54','2021-06-16 19:50:54'),
(19,'123123','123123','<p>123123</p>','123123',12.00,12.00,1,0,0,0,'12','12','12',0,0,'2021-06-16 19:51:18','2021-06-16 19:51:18');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('3VZCHbYO6l6NpgSIelov44IBT9Vf00zw605Gn2an',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNXFsVUNVbU55T0I0c0x2NnNDY3N6WWlTVG1mZEx3c2J4aFVZMU5MbyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2Vjb21tZXJjZS9zdW1tYXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=',1624998560),
('KPpVCO5jrcyOWhok90ctxZGGcYSkC4ZKW2EVeOvm',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV3BYTG5oZGVxSldxbTBTSTRWNHIzNG44VjFDeHVNM2VoS0tUN1RYaCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Nob3AiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==',1624480577);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_vendor` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`user_type`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`current_team_id`,`profile_photo_path`,`created_at`,`updated_at`,`is_vendor`) values 
(1,'admin','Thirdplatoon','thirdplatoon@mail.com','2020-12-23 05:51:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'usQq2uDnPf0N9CfvgrpgA5y1KnauPG4wXylPDv0M8eSjNvmB3njezdlS7iGI',NULL,NULL,NULL,NULL,0),
(2,'customer','John Doe','customer@mail.com','2020-12-23 05:51:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'zSgH842H5mKAEZZlQjU9hEtViQyD03QkZckMa0XS2Uo2OKrzzrUD8YtbOCgz',NULL,NULL,NULL,NULL,0),
(3,'customer','Carli Rempel','abshire.richard@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'u4dEVLS41N',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(4,'customer','Lavinia McLaughlin','xreynolds@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'hlHdzPOJDq',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(5,'customer','Lilian Volkman','mbrekke@example.net','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'6A832VVRkY',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(6,'customer','Houston Shanahan','kstanton@example.com','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'l6MlhMALwC',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(7,'customer','Miss Mary Kirlin','winston.trantow@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'ItNj11v3iw',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(8,'customer','Madaline Davis','ullrich.lupe@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'cznj1iv3tE',NULL,NULL,'2020-12-23 05:51:47','2020-12-23 05:51:47',0),
(9,'customer','Ervin Larson','sromaguera@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'86ZTEQwzwo',NULL,NULL,'2020-12-23 05:51:47','2021-06-23 17:05:00',0),
(10,'customer','Bradley Boyle','consuelo.sauer@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'7vFygTuTM0',NULL,NULL,'2020-12-23 05:51:47','2021-06-17 00:39:15',1),
(11,'customer','Christ McKenzie','xkunze@example.net','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'UndqPg33Ne',NULL,NULL,'2020-12-23 05:51:47','2021-06-17 00:38:34',1),
(12,'customer','Kelsie Larson','effertz.krystal@example.org','2020-12-23 05:51:47','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'Tj7Z2XKCBX',NULL,NULL,'2020-12-23 05:51:47','2021-06-17 00:01:49',1),
(13,'customer','Zephr Whitfield','myqyfof@mailinator.com',NULL,'$2y$10$cItutj/ZnsgrjstpbECgpuUwUjC1NQ4s4i8omtOW1tAks2Rn.uSqi',NULL,NULL,NULL,NULL,NULL,'2020-12-31 20:47:34','2021-06-17 00:01:48',1),
(14,'customer','Aj','test@test1.com',NULL,'$2y$10$ypWByXYj/xkXUl4hrTkf2OXakkzDCbLDIUv1W0GGnRq8dWGckW/62',NULL,NULL,'P0z09kWyByhKBB08EDLXNuNZC92Pa9PO82UANsCipKcqvThPAYzX0may5agL',NULL,NULL,'2021-03-06 01:01:32','2021-06-16 23:58:13',1),
(15,'customer','yrux','yruxwork@gmail.com',NULL,'$2y$10$oYI1s1pTjEY98fDeTYG.eO7Y4zpndAInxYXcRqSHUZx5yMxLtAU4O',NULL,NULL,NULL,NULL,NULL,'2021-06-11 03:21:10','2021-06-16 23:58:30',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

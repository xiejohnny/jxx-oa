/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.47 : Database - jxx_oa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jxx_oa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jxx_oa`;

/*Table structure for table `access_tokens` */

DROP TABLE IF EXISTS `access_tokens`;

CREATE TABLE `access_tokens` (
  `access_token` varchar(40) NOT NULL DEFAULT '' COMMENT '令牌',
  `client_id` varchar(40) NOT NULL DEFAULT '' COMMENT '客户ID',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `expires_time` datetime NOT NULL COMMENT '过期时间',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='令牌表';

/*Data for the table `access_tokens` */

insert  into `access_tokens`(`access_token`,`client_id`,`userid`,`expires_time`,`create_time`) values ('00ed7f284ee5b9ab432b8212cdd1a88b','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 16:46:57','2017-06-11 16:46:57'),('02b59abb1baa1a3d8680d7a0df906a50','180645f285e744e03a8aed39cf6a306e',10,'2017-11-06 11:45:25','2017-10-07 11:45:25'),('080d4aca60f97487d9efe56bb0d85b34','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 11:48:35','2017-07-29 11:48:35'),('10706fc425eea35ada5ce008c23078ab','180645f285e744e03a8aed39cf6a306e',10,'2017-11-06 11:40:20','2017-10-07 11:40:20'),('13414cbac4c2ac07008cded13ca7ffaf','180645f285e744e03a8aed39cf6a306e',1,'2017-08-29 18:32:49','2017-07-30 18:32:49'),('162c0f9c20efda3460399eac60251cd0','180645f285e744e03a8aed39cf6a306e',1,'2017-05-04 12:57:52','2017-04-04 12:57:52'),('17ee58732d98bb48cf26513511de9cab','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 16:49:57','2017-06-11 16:49:57'),('1a43e7a34dfd42695604e606d1cf433a','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:32:18','2017-06-10 14:32:18'),('1cf24476a1cb9a8819ad925fcd2ca043','180645f285e744e03a8aed39cf6a306e',1,'2017-05-04 12:55:58','2017-04-04 12:55:58'),('1e6f96bdcec03824c6978bfbac0d8705','180645f285e744e03a8aed39cf6a306e',1,'2017-05-02 18:45:44','2017-04-02 18:45:44'),('31c847bcc9c1052a83939767a67f9425','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 16:49:53','2017-06-11 16:49:53'),('38ac3700b94433b1a2730c23aecce0fc','180645f285e744e03a8aed39cf6a306e',1,'2017-05-02 18:58:37','2017-04-02 18:58:37'),('3fd61f418f91c0a2d6a7ad1547842412','180645f285e744e03a8aed39cf6a306e',1,'2017-05-04 12:55:46','2017-04-04 12:55:46'),('4249b79c4ec3536e255b0838f9bbc271','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 11:53:58','2017-07-29 11:53:58'),('45f7e75887bb6e28c2945017e88f5511','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:35:03','2017-06-10 14:35:03'),('4b3b2ad206bb011b6ccdb4e40171df28','180645f285e744e03a8aed39cf6a306e',4,'2017-07-10 16:26:26','2017-06-10 16:26:26'),('51a709bb1689a3da0a0e143af2ce7254','180645f285e744e03a8aed39cf6a306e',1,'2017-05-03 22:47:25','2017-04-03 22:47:25'),('53d677e7ef22abfba304fcdeb2021c88','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 11:48:46','2017-07-29 11:48:46'),('5582057f8df6070b61594524671a1c4d','180645f285e744e03a8aed39cf6a306e',1,'2017-09-18 09:11:04','2017-08-19 09:11:04'),('5d4d164d956ee7c1834ed24400257b2d','180645f285e744e03a8aed39cf6a306e',1,'2017-05-02 18:46:18','2017-04-02 18:46:18'),('670cfe08c68f71b19f354a29110f3150','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:29:50','2017-06-10 14:29:50'),('6a6dc962a80d69bd75f59f617cca5d97','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 08:26:34','2017-07-29 08:26:34'),('6c18d0ddd8191a57d4a4a777703c6d9e','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 12:18:23','2017-07-29 12:18:23'),('6c3533a3db39817647642b23964469c8','180645f285e744e03a8aed39cf6a306e',1,'2017-08-29 18:29:28','2017-07-30 18:29:28'),('78febaea1aa1ad1eb9ecafc2c487f5bc','180645f285e744e03a8aed39cf6a306e',8,'2017-09-25 11:21:47','2017-08-26 11:21:47'),('79945d5527505d6197484ffc718919ab','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:35:12','2017-06-10 14:35:12'),('80d1070933b7db82c5649d6d19898686','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:33:07','2017-06-10 14:33:07'),('811b75e4f21af0fab712d095522b2ac0','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:27:23','2017-06-10 14:27:23'),('83bdd0b9b85f9be62c957c8fb1e776c0','180645f285e744e03a8aed39cf6a306e',1,'2017-10-09 08:47:02','2017-09-09 08:47:02'),('864984a6056dfda5deb2222283e54a08','180645f285e744e03a8aed39cf6a306e',1,'2017-08-29 18:28:58','2017-07-30 18:28:58'),('90812afbec845680108bba05af877450','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 12:04:15','2017-07-29 12:04:15'),('9183b95601a3327ebbc41e3f1e5a9a3e','180645f285e744e03a8aed39cf6a306e',1,'2017-08-29 18:33:14','2017-07-30 18:33:14'),('9584aca6031c9c2beb077710abcb4b5e','180645f285e744e03a8aed39cf6a306e',1,'2017-05-04 12:56:39','2017-04-04 12:56:39'),('9a7d466eb2c6f46b0360ad940553b361','180645f285e744e03a8aed39cf6a306e',4,'2017-07-10 16:26:20','2017-06-10 16:26:20'),('a23d0bcf4285e5134309115c091045d4','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:35:07','2017-06-10 14:35:07'),('a54286d15bf9ef15b60c6835e475bb53','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 17:59:35','2017-06-11 17:59:35'),('a696fdf719bff919594d7650696e47e5','180645f285e744e03a8aed39cf6a306e',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),('adefb929d54cb99cd2644f8eba1c2a62','180645f285e744e03a8aed39cf6a306e',1,'2017-05-02 18:28:34','2017-04-02 18:28:34'),('ae4b90da689432a220d8465437771466','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 12:12:12','2017-07-29 12:12:12'),('b28c55a9e710e330d13001a021155e90','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 12:12:21','2017-07-29 12:12:21'),('b5ce2e5a9476e068f2eb6c4855bf648b','180645f285e744e03a8aed39cf6a306e',1,'2017-05-04 12:56:27','2017-04-04 12:56:27'),('b6f8e8d8d87e9e0ca714474b34586870','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 10:36:44','2017-06-10 10:36:44'),('be469bd9ea9d9c481c33ecf806e9bba2','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 16:31:12','2017-06-11 16:31:12'),('c81deb8d1550631d4ba8d5a0fe6c11a3','180645f285e744e03a8aed39cf6a306e',1,'2017-07-17 21:03:43','2017-06-17 21:03:43'),('caddc6a0516c995d51a8c013f61c040b','180645f285e744e03a8aed39cf6a306e',1,'2017-07-17 21:00:42','2017-06-17 21:00:42'),('e4f35e1f6115ebb977de0094730c7918','180645f285e744e03a8aed39cf6a306e',1,'2017-07-10 14:32:34','2017-06-10 14:32:34'),('ec6f3b0fbc54f361c91f074caf18540a','180645f285e744e03a8aed39cf6a306e',1,'2017-07-17 21:02:52','2017-06-17 21:02:52'),('f05a4aab0796a13ebf43c64dfca1ccb3','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 12:11:54','2017-07-29 12:11:54'),('f2e0cb1999c6d4e88445169a88f12a2d','180645f285e744e03a8aed39cf6a306e',1,'2017-07-17 21:02:23','2017-06-17 21:02:23'),('f92646751ae0e82b17f0e025551c48e0','180645f285e744e03a8aed39cf6a306e',4,'2017-07-11 16:50:00','2017-06-11 16:50:00'),('fda400f9bbd976624daea20b5389d994','180645f285e744e03a8aed39cf6a306e',1,'2017-08-28 11:53:42','2017-07-29 11:53:42');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` varchar(40) NOT NULL DEFAULT '',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '名称',
  `secret` varchar(40) NOT NULL DEFAULT '' COMMENT '密钥',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='客户表';

/*Data for the table `client` */

insert  into `client`(`id`,`name`,`secret`) values ('180645f285e744e03a8aed39cf6a306e','PC','97a48d4250e1792610d7a93ac7a97176');

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '配置名',
  `value` varchar(50) NOT NULL DEFAULT '' COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `config` */

insert  into `config`(`id`,`name`,`value`) values (1,'SUPER_USER_MAX','1');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单代号',
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT '菜单地址',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0默认',
  `is_action` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否行为 0否 1是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`code`,`url`,`pid`,`status`,`is_action`) values (1,'员工管理','staff','',0,0,0),(2,'员工列表','staff_list','staff/list',1,0,0),(3,'角色管理','role','',0,0,0),(4,'角色列表','role_list','role/list',3,0,0),(5,'员工列表 - 编辑','staff_edit','staff/edit',2,0,1),(6,'员工列表 - 删除','staff_delete','staff/delete',2,0,1);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `menu_code` varchar(1000) DEFAULT '' COMMENT '拥有菜单id列表',
  `is_super` tinyint(1) unsigned DEFAULT '0' COMMENT '是否超管 0否 1是',
  `is_del` tinyint(1) unsigned DEFAULT '0' COMMENT '是否删除 0否 1是',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`menu_code`,`is_super`,`is_del`) values (1,'超级管理员','ALL',1,0),(2,'编辑','staff,staff_list',0,0),(3,'程序员','',0,0),(4,'产品经理','staff,staff_list',0,0),(5,'老板','role,role_list,staff,staff_list,staff_delete,staff_edit',0,0),(6,'测试','role,role_list',0,0);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `roleid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`userid`,`roleid`) values (1,1,1),(2,10,2),(3,7,5),(4,11,4),(5,6,3),(6,4,0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) DEFAULT '' COMMENT '昵称',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` varchar(5) NOT NULL DEFAULT '' COMMENT '密码加密盐',
  `gender` tinyint(3) unsigned DEFAULT '0' COMMENT '性别 0未知 1男 2女',
  `avatar` varchar(250) DEFAULT '' COMMENT '头像',
  `is_freeze` tinyint(3) unsigned DEFAULT '0' COMMENT '冻结状态 0否 1是',
  `login_ip` varchar(20) DEFAULT '' COMMENT '最后登录IP',
  `login_time` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`nickname`,`password`,`salt`,`gender`,`avatar`,`is_freeze`,`login_ip`,`login_time`,`created_at`,`updated_at`) values (1,'admin','jxx','32c27a49109fc942e8fe153cacc09e54','30f4',0,'',0,'192.168.31.135','2017-09-09 08:47:02','2017-03-19 16:50:09','2017-09-09 08:47:02'),(2,'test','testtttt','','asdf',1,'',1,'','2017-03-19 16:50:09','2017-03-19 16:50:09','2017-09-09 08:47:46'),(3,'test2','test2','','56ew',1,'',0,'','2017-03-19 16:50:09','2017-03-19 16:50:09','2017-08-26 10:56:35'),(4,'ttttt','ttttt','cb7fdcf7ac4c6eec9cb641726e180771','asd5',2,'',1,'192.168.31.135','2017-06-11 17:59:35','2017-06-10 15:55:59','2017-10-04 19:52:37'),(5,'ttttt2','ttttt22222233','111111','fd62',2,'',0,'',NULL,'2017-06-10 16:01:14','2017-09-09 21:54:58'),(6,'ttttt3','ttttt3','111111','as67',0,'',0,'',NULL,'2017-06-10 16:19:32','2017-10-04 19:52:29'),(7,'ttttt4','ttttt4','111111','e747',1,'',0,'',NULL,'2017-06-10 16:24:11','2017-10-04 19:50:15'),(8,'22222','22222','447f64b3a2df78cbb0187eb109758608','35a5',0,'',0,'192.168.31.135','2017-08-26 11:21:47','2017-08-26 11:21:15','2017-08-26 11:22:33'),(9,'33333','333332','6edc45fce31aa3e3ac6e12654c872bc3','c1a9',1,'',0,'',NULL,'2017-08-26 11:23:16','2017-09-30 23:21:56'),(10,'tttt1','tttt1','0f196ccbf3b465533b77e68c3ccf61a8','e5c0',0,'',0,'192.168.31.135','2017-10-07 11:45:25','2017-10-04 19:31:53','2017-10-07 11:45:25'),(11,'bbadf','bbadf','edc41c458abfdc156370734ee18a190b','1d1a',0,'',0,'',NULL,'2017-10-04 19:50:40','2017-10-04 19:50:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

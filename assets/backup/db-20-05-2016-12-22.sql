#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `role` enum('super admin','admin','employee') DEFAULT NULL,
  `balance` double DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `is_chat` tinyint(4) DEFAULT '0',
  `is_user` tinyint(4) DEFAULT '0',
  `is_product` tinyint(4) DEFAULT '0',
  `is_store` tinyint(4) DEFAULT '0',
  `is_employee` tinyint(4) DEFAULT '0',
  `is_order` tinyint(4) DEFAULT '0',
  `is_payment` tinyint(4) DEFAULT '0',
  `is_gallery` tinyint(4) DEFAULT '0',
  `is_event` tinyint(4) DEFAULT '0',
  `is_ticket` tinyint(4) DEFAULT '0',
  `is_content` tinyint(4) DEFAULT '0',
  `is_newsletter` tinyint(4) DEFAULT '0',
  `is_general` tinyint(4) DEFAULT '0',
  `is_customer` tinyint(4) DEFAULT '0',
  `default` tinyint(4) DEFAULT '0',
  `enabled` tinyint(4) DEFAULT '1',
  `status` varchar(255) DEFAULT '',
  `date` datetime DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO admin (`id`, `username`, `password`, `email`, `image`, `type`, `role`, `balance`, `category_id`, `is_chat`, `is_user`, `is_product`, `is_store`, `is_employee`, `is_order`, `is_payment`, `is_gallery`, `is_event`, `is_ticket`, `is_content`, `is_newsletter`, `is_general`, `is_customer`, `default`, `enabled`, `status`, `date`, `created`, `modified`) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', NULL, '', 'super admin', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '1', NULL, '1416646926', '1416646926');
INSERT INTO admin (`id`, `username`, `password`, `email`, `image`, `type`, `role`, `balance`, `category_id`, `is_chat`, `is_user`, `is_product`, `is_store`, `is_employee`, `is_order`, `is_payment`, `is_gallery`, `is_event`, `is_ticket`, `is_content`, `is_newsletter`, `is_general`, `is_customer`, `default`, `enabled`, `status`, `date`, `created`, `modified`) VALUES (9, 'Rob Burton', '5f4dcc3b5aa765d61d8327deb882cf99', 'rob@3plsolutions.co.uk', NULL, NULL, 'employee', '0', 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, '', '2016-03-10 07:32:57', '1457613177', '1457613177');
INSERT INTO admin (`id`, `username`, `password`, `email`, `image`, `type`, `role`, `balance`, `category_id`, `is_chat`, `is_user`, `is_product`, `is_store`, `is_employee`, `is_order`, `is_payment`, `is_gallery`, `is_event`, `is_ticket`, `is_content`, `is_newsletter`, `is_general`, `is_customer`, `default`, `enabled`, `status`, `date`, `created`, `modified`) VALUES (10, 'Mike Burton', '5f4dcc3b5aa765d61d8327deb882cf99', 'mike@3plsolutions.co.uk', NULL, NULL, 'employee', '0', 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 1, '', '2016-03-10 07:33:26', '1457613206', '1457613206');
INSERT INTO admin (`id`, `username`, `password`, `email`, `image`, `type`, `role`, `balance`, `category_id`, `is_chat`, `is_user`, `is_product`, `is_store`, `is_employee`, `is_order`, `is_payment`, `is_gallery`, `is_event`, `is_ticket`, `is_content`, `is_newsletter`, `is_general`, `is_customer`, `default`, `enabled`, `status`, `date`, `created`, `modified`) VALUES (11, 'Mezzanine', '5f4dcc3b5aa765d61d8327deb882cf99', 'mezz@3plsolutions.co.uk', NULL, NULL, 'employee', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, '', '2016-03-10 07:34:16', '1457613256', '1457613256');
INSERT INTO admin (`id`, `username`, `password`, `email`, `image`, `type`, `role`, `balance`, `category_id`, `is_chat`, `is_user`, `is_product`, `is_store`, `is_employee`, `is_order`, `is_payment`, `is_gallery`, `is_event`, `is_ticket`, `is_content`, `is_newsletter`, `is_general`, `is_customer`, `default`, `enabled`, `status`, `date`, `created`, `modified`) VALUES (12, 'pvsysgroup01', 'e10adc3949ba59abbe56e057f20f883e', 'pvsysgroup01@gmail.com', NULL, NULL, 'employee', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, '', '2016-03-12 06:42:53', '1457764973', '1457764973');


#
# TABLE STRUCTURE FOR: banners
#

DROP TABLE IF EXISTS banners;

CREATE TABLE `banners` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO banners (`id`, `parent_id`, `status`, `order`, `menu_location`, `name`, `desc`, `image`, `link`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (1, 0, 1, 1, NULL, 'Special Offer', '0', 'sPECAIL_OFFER.JPG', '', NULL, '2015-12-18 23:49:04', NULL, 'bottom', NULL, NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: banners_lang
#

DROP TABLE IF EXISTS banners_lang;

CREATE TABLE `banners_lang` (
  `id_banner_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_banner_lang`),
  KEY `fk_banner_language1` (`language_id`),
  KEY `fk_banner_lang_page1` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO banners_lang (`id_banner_lang`, `banner_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (1, 1, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: categories
#

DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO categories (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (1, 0, 1, 1, NULL, 'house.jpg', NULL, '2016-02-02 11:39:26', NULL, NULL, 'hotel', NULL, NULL, '1454413166', '1454481188', 1);
INSERT INTO categories (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (2, 1, 1, 2, NULL, NULL, NULL, '2016-02-02 11:40:00', NULL, NULL, 'Luxury-hotel', NULL, NULL, '1454413200', '1454413200', 1);
INSERT INTO categories (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (3, 0, 1, 3, NULL, '5.jpg', NULL, '2016-02-02 11:40:30', NULL, NULL, 'Resort', NULL, NULL, '1454413230', '1454481225', 1);
INSERT INTO categories (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (4, 0, 1, 4, NULL, '6.jpg', NULL, '2016-02-03 06:34:51', NULL, NULL, 'Guest-house', NULL, NULL, '1454481291', '1454481291', 1);
INSERT INTO categories (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (5, 0, 1, 5, NULL, '51.jpg', NULL, '2016-02-03 06:35:15', NULL, NULL, 'Garden-hotels', NULL, NULL, '1454481315', '1454481315', 1);


#
# TABLE STRUCTURE FOR: categories_lang
#

DROP TABLE IF EXISTS categories_lang;

CREATE TABLE `categories_lang` (
  `id_category_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_category_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO categories_lang (`id_category_lang`, `category_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (3, 2, 1, 'Luxury hotel‎', NULL, NULL, NULL, NULL, NULL);
INSERT INTO categories_lang (`id_category_lang`, `category_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (7, 1, 1, 'Hotel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO categories_lang (`id_category_lang`, `category_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (9, 3, 1, 'Resort', NULL, NULL, NULL, NULL, NULL);
INSERT INTO categories_lang (`id_category_lang`, `category_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (11, 4, 1, 'Guest house', NULL, NULL, NULL, NULL, NULL);
INSERT INTO categories_lang (`id_category_lang`, `category_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (13, 5, 1, 'Garden hotels', NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: chat_messages
#

DROP TABLE IF EXISTS chat_messages;

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `username` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `user_type` varchar(255) CHARACTER SET latin1 DEFAULT 'admin',
  `recipient` varchar(255) DEFAULT '',
  `recipient_type` varchar(255) CHARACTER SET latin1 DEFAULT 'admin',
  `recipient_id` int(11) DEFAULT '0',
  `message_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` int(11) DEFAULT '0',
  `created` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS ci_sessions;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(255) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL DEFAULT '',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('c5d22d0f373525ab4a728162eb8d3061', '59.88.9.234', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 1463741699, 'a:2:{s:9:\"user_data\";s:0:\"\";s:16:\"adminLangSession\";a:2:{s:9:\"lang_code\";s:2:\"EN\";s:7:\"lang_id\";s:1:\"1\";}}');
INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('2725180c40fd3c1440db0bcbab31d831', '59.88.9.234', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 1463741700, 'a:3:{s:9:\"user_data\";s:0:\"\";s:16:\"adminLangSession\";a:2:{s:9:\"lang_code\";s:2:\"EN\";s:7:\"lang_id\";s:1:\"1\";}s:13:\"admin_session\";a:5:{s:8:\"username\";s:5:\"admin\";s:5:\"email\";s:15:\"admin@gmail.com\";s:2:\"id\";s:1:\"1\";s:11:\"logged_type\";s:5:\"admin\";s:8:\"loggedin\";b:1;}}');
INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('8aec7314c58548b55163d514d3e0562b', '59.88.9.234', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 1463742303, '');


#
# TABLE STRUCTURE FOR: content
#

DROP TABLE IF EXISTS content;

CREATE TABLE `content` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO content (`id`, `parent_id`, `name`, `order`, `type`, `date`, `created`, `modified`, `enabled`) VALUES (1, 0, NULL, NULL, 'home', '2016-02-02 09:51:10', NULL, NULL, 1);
INSERT INTO content (`id`, `parent_id`, `name`, `order`, `type`, `date`, `created`, `modified`, `enabled`) VALUES (2, 0, NULL, NULL, 'contact', '2015-10-27 10:20:49', NULL, NULL, 1);
INSERT INTO content (`id`, `parent_id`, `name`, `order`, `type`, `date`, `created`, `modified`, `enabled`) VALUES (3, 0, NULL, NULL, 'cart', '2015-11-04 14:21:12', NULL, NULL, 1);
INSERT INTO content (`id`, `parent_id`, `name`, `order`, `type`, `date`, `created`, `modified`, `enabled`) VALUES (4, 0, NULL, NULL, 'footer', '2015-11-16 11:24:49', NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: content_lang
#

DROP TABLE IF EXISTS content_lang;

CREATE TABLE `content_lang` (
  `id_content_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_content_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (10, 2, 1, NULL, NULL, '<p><strong>Vriendekring Fatima Center VZW</strong><br />\r\n&nbsp;</p>\r\n\r\n<p>Vriendenkring Fatima Center VZW is a Belgian organization that is active for already 15 years. It supports actively 5 projects in Thailand. These projects are related to each other and share the following:</p>\r\n\r\n<ul>\r\n	<li>All projects focus on education of young people</li>\r\n	<li>Both proffesional training as general education ( social rights, women rights, basic health education, sex education and family planning, etc...) are offerred&nbsp;</li>\r\n	<li>The above is offered with a total respect for the human being, without any discrimination related to descent, religion or life history of the xomen</li>\r\n	<li>Focus on recoveery of the human dignity of the women</li>\r\n</ul>\r\n\r\n<p>The projects / training centers that are supported by our organization are:</p>\r\n\r\n<p>1. The Fatima Self Help Center in Bangkok. It was the first center supported by our VZW and has given namen to our organization.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (14, 3, 1, NULL, NULL, '<p><span style=\"font-size:14px;\"><strong>Deliverys are been sent every tuesday and friday</strong></span></p>\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (15, 3, 8, NULL, NULL, '<p><strong style=\"font-size: 14px; line-height: 22.4px;\">Deliverys are been sent every tuesday and friday</strong></p>\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (17, 4, 1, NULL, NULL, '<p>footer content description</p>\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (18, 4, 9, NULL, NULL, '<p>footer content description</p>\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (21, 1, 1, NULL, NULL, '<p><span id=\"result_box\" lang=\"en\"><span title=\"In Italia il settore ricettivo e turistico per non sentire in nessun modo gli effetti della crisi.\">In Italy the hospitality industry and tourism to not feel in any way the effects of the crisis. </span><span title=\"Dal 2014 al 2015 nei comparti di alloggio e ristorazione si è registrata una crescita del 2%, pari a 8.122 attività in più sul territorio italiano.\">From 2014 to 2015 in the sectors of accommodation and catering, there was a growth of 2%, or 8,122 more activities on Italian territory. </span><span title=\"Nonostante questo ogni giorno assistiamo alla nascita di nuovi portali che incentivano le prenotazioni, vediamo programmi televisivi dove &quot;esperti&quot; cercano di aiutare le aziende in crisi, assistiamo alla chiusura di strutture storiche.\">Despite this every day we witness the birth of new portals that encourage reservations, see television programs where &quot;experts&quot; try to help companies in crisis, we are seeing the closure of historic structures. </span><span title=\"Insomma, c\'è da chiedersi com\'è possibile che esista un divario così grande tra la crescita e la crisi.\">In short, it has to wonder how is it possible that there is a gap so large between growth and crisis. </span><span title=\"Dov\'è verità?\n\">Where is truth?</span><br />\n<span title=\"Nella nostra decennale esperienza in diversi tipi di strutture ci siamo presto resi conto che gestire un\'azienda in questo settore diventa ogni giorno più difficile.\">In our decades of experience in different types of structures we soon realized that running a business in this sector is becoming more difficult. </span><span title=\"Non basta più avere delle camere comode e pulite e una colazione abbondante.\">No longer enough to have clean and comfortable rooms and a hearty breakfast. </span><span title=\"Oggi alla direzione (per non dire alla proprietà) di una struttura ricettiva si richiedono un lista quasi interminabile di conoscenze ed esperienze, oltre alla capacità di utilizzare una serie di strumenti tecnologici in continua evoluzione.\">Today the direction (if not ownership) of a structure will require an almost endless list of knowledge and experience, and the ability to use a variety of technological tools in constant evolution. </span><span title=\"Per non parlare dell\'aggiornamento necessario ad affrontare la costante apertura dei mercati turistici che portano ogni giorno una clientela con aspettative sempre diverse, e sempre più alte.\n\">Not to mention the upgrade needed to address the constant opening of tourist markets leading daily customers with ever changing expectations, and higher and higher.</span><br />\n<span title=\"Per venire incontro alle sempre costanti esigenze di direttori e proprietari di strutture alberghiere abbiamo quindi sviluppato diversi sistemi volti al supporto della gestione del personale, finanziaria e tariffaria.\">To meet the constant demand for more and directors and owners of hotels we have therefore developed different systems to support the management of personnel, financial and tariff. </span><span title=\"Abbiamo creato dei metodi utilizzati da noi personalmente in diversi tipi di strutture, non suggerimenti di fanto matici esperti ma indicazioni e strumenti &quot;veri e applicabili&quot;.\n\">We have created the methods used by us personally in various types of structures, not suggestions of experts fanto tires but signs and instruments &quot;real and applicable.&quot;</span><br />\n<span title=\"La nostra mission è quella di permettere a tutti i reparti ea tutto il personale di lavorare al meglio delle proprie possibilità, secondo dei metodi e delle procedure che massimizzino i risultati con lo scopo ultimo di permettere ciò che più di tutto conta in questo settore: offrire\">Our mission is to enable all departments and all staff to work to the best of its ability, according to the methods and procedures that maximize the results with the ultimate goal of allowing what counts more than anything in this industry offer </span><span title=\"una vera e autentica ospitalità agli ospiti!\">a true and authentic hospitality to guests!</span></span></p>\n', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO content_lang (`id_content_lang`, `content_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (22, 1, 2, NULL, NULL, '<p style=\"text-align: justify;\">In Italia il settore ricettivo e turistico pare non sentire in nessun modo gli effetti della crisi. Dal 2014 al 2015 nei comparti di alloggio e ristorazione si è registrata una crescita del 2%, pari a 8.122 attività in più sul territorio italiano. Nonostante questo ogni giorno assistiamo alla nascita di nuovi portali che incentivano le prenotazioni, vediamo programmi televisivi dove \"esperti\" cercano di aiutare le aziende in crisi, assistiamo alla chiusura di strutture storiche. Insomma, c\'è&nbsp;da chiedersi com\'è possibile che&nbsp;esista un divario così grande tra la crescita e la crisi. Dov\'è verità?</p>\n<p style=\"text-align: justify;\">Nella nostra decennale esperienza in diversi tipi di strutture ci siamo presto resi conto che&nbsp;gestire un\'azienda in questo settore diventa ogni giorno più difficile. Non basta più avere delle camere comode e pulite e una colazione abbondante. Oggi alla direzione (per non dire alla proprietà) di una struttura ricettiva si richiedono un lista quasi interminabile di conoscenze ed esperienze, oltre alla capacità di utilizzare una serie di strumenti tecnologici in continua evoluzione. Per non parlare dell\'aggiornamento necessario ad affrontare la costante apertura dei mercati turistici che portano ogni giorno una clientela con aspettative sempre diverse, e sempre più alte.</p>\n<p style=\"text-align: justify;\">Per venire incontro alle sempre costanti esigenze di&nbsp;direttori e proprietari di strutture alberghiere abbiamo quindi sviluppato diversi sistemi volti al supporto della gestione del personale, finanziaria e tariffaria. Abbiamo creato dei metodi utilizzati da noi personalmente in diversi tipi di strutture, non suggerimenti di fanto matici esperti ma indicazioni e strumenti \"veri e applicabili\".</p>\n<p style=\"text-align: justify;\">La nostra mission è quella di&nbsp;permettere a tutti i reparti e a tutto il personale di lavorare al&nbsp;meglio delle proprie possibilità, secondo dei metodi e delle procedure che massimizzino i risultati con lo scopo ultimo di permettere ciò che più di tutto conta in questo settore: offrire una vera e autentica ospitalità agli ospiti!</p>', NULL, NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: coupons
#

DROP TABLE IF EXISTS coupons;

CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `code` varchar(50) DEFAULT '',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `whole_order_coupon` tinyint(1) DEFAULT NULL,
  `max_uses` mediumint(8) DEFAULT NULL,
  `num_uses` mediumint(8) DEFAULT NULL,
  `is_public` tinyint(4) DEFAULT '0',
  `is_gift` tinyint(4) DEFAULT '0',
  `is_used` tinyint(4) DEFAULT '0',
  `reduction_amount` float DEFAULT NULL,
  `remaining` float DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: departments
#

DROP TABLE IF EXISTS departments;

CREATE TABLE `departments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO departments (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (1, 0, 1, 2, NULL, NULL, NULL, '2016-02-02 11:36:09', NULL, NULL, '0', NULL, NULL, '1454412969', '1454660928', 1);
INSERT INTO departments (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (2, 0, 1, 1, NULL, NULL, NULL, '2016-02-02 11:37:04', NULL, NULL, '0', NULL, NULL, '1454413024', '1454660944', 1);
INSERT INTO departments (`id`, `parent_id`, `status`, `order`, `menu_location`, `image`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (3, 0, 1, 3, NULL, NULL, NULL, '2016-02-02 13:27:16', NULL, NULL, '0', NULL, NULL, '1454419636', '1454419636', 1);


#
# TABLE STRUCTURE FOR: departments_lang
#

DROP TABLE IF EXISTS departments_lang;

CREATE TABLE `departments_lang` (
  `id_department_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_department_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (5, 3, 1, 'House Keeping', NULL, '<p>House Keeping</p>', NULL, NULL, NULL);
INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (6, 3, 2, 'House Keeping', NULL, '<p>House Keeping</p>', NULL, NULL, NULL);
INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (7, 1, 1, 'Front Office', NULL, '', NULL, NULL, NULL);
INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (8, 1, 2, 'Reception', NULL, '', NULL, NULL, NULL);
INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (9, 2, 1, 'Food & Beverage', NULL, '', NULL, NULL, NULL);
INSERT INTO departments_lang (`id_department_lang`, `department_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`) VALUES (10, 2, 2, 'Restaurant', NULL, '', NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: email
#

DROP TABLE IF EXISTS email;

CREATE TABLE `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (1, 'email varification', 'Welkom  bij {site_name}!', '<p>hello {user_name},</p>\n\n<p>Thank you for registration. Please here for verification <a href=\"{site_link}\">Click Here</a>.</p>', '1410165891', '1446506773', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (2, 'confirm user to admin', 'User Verification Success', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear Admin,</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">User Email: <strong>{user_email}</strong></h3>\n\n<h3 style=\"margin-left:20px\">User Password: {user_password}</h3>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1447914428', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (3, 'send mail to created store user', 'Welcome to {site_name}', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear {user_name}</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">Email: {user_email}</h3>\n\n<h3 style=\"margin-left:20px\">Password: {password}</h3>\n\n\n<h3 style=\"margin-left:20px\">Login link:<a href=\"{login_link}\">Click here</a></h3>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1456907287', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (4, 'contact', 'Welkom bij {site_name}', '<p><img alt=\"\" src=\"http://www.pvsysgroup.us/ecommerce3/assets/uploads/editors/1446503329_logo ThaiseFairTrade-shop.jpg\" style=\"width: 300px; height: 99px; margin: 10px;\" /></p>\n\n<p>Hallo,</p>\n\n<p>Naam: {name}<br />\nTelefoonnummer: {phone}<br />\nEmail: {email}<br />\nMesssage: {message}</p>\n\n<p>Bedankt voor uw aanvraag.<br />\nWij zullen het zo snel mogelijk behandelen.</p>\n\n<p>Met vriendelijke groeten,</p>\n\n<p>ThaiseFairTrade-Shop<br />\nVriendenkring Fatima Center VZW</p>', '1410165891', '1446503666', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (5, 'mail order to user', 'Welcome to {site_name}', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear {user_name}</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">Username: {user_name}</h3>\n\n<h3 style=\"margin-left:20px\">Email: {user_email}</h3>\n\n<h3 style=\"margin-left:20px\">Order Number: <strong>{order_number}</strong></h3>\n\n<h3 style=\"margin-left:20px\">Total Amount: <strong>{total_amount}</strong></h3>\n\n<p>&nbsp;</p>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1438763602', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (6, 'mail order to admin', 'Welcome to {site_name}', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear Admin</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">Username: {user_name}</h3>\n\n<h3 style=\"margin-left:20px\">Email: {user_email}</h3>\n\n<h3 style=\"margin-left:20px\">Order Number: <strong>{order_number}</strong></h3>\n\n<h3 style=\"margin-left:20px\">Total Amount: <strong>{total_amount}</strong></h3>\n\n<p>&nbsp;</p>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1423130494', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (7, 'invoice to pdf', 'Welcome to {site_name}', '<div id=\"page-wrap\" style=\"width: 750px; margin: 0 auto;\">\n<table border=\"0\" id=\"identity\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td style=\"border:none\">\n			<div id=\"logo\"><img alt=\"logo\" id=\"image\" src=\"{site_logo}\" /></div>\n			</td>\n			<td style=\"border:none;width:100px\">\n			<div class=\"textarea\" id=\"address\">\n			<h3>{site_name}</h3>\n\n			<p>{order_date}</p>\n\n			<p>{order_number}</p>\n			</div>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<div style=\"clear:both\">&nbsp;</div>\n\n<table id=\"customer\" style=\"width:100%;\">\n	<tbody>\n		<tr>\n			<td style=\"border:none;vertical-align:top\">\n			<div class=\"textarea\" id=\"customer-title\">\n			<h3>{user_name}</h3>\n\n			<p>{user_email}</p>\n\n			<p>{address1}</p>\n\n			<p>{house_number}</p>\n\n			<p>{city}</p>\n\n			<p>{country}</p>\n\n			<p>{zip_code}</p>\n			</div>\n			</td>\n			<td style=\"border:none;\"><span style=\"display:none\">&nbsp;</span></td>\n		</tr>\n	</tbody>\n</table>\n\n<div style=\"clear:both\">&nbsp;</div>\n\n<table id=\"items\">\n	<tbody>\n		<tr>\n			<th>NAME</th>\n			<th>Restaurant</th>\n			<th>Price</th>\n			<th>Quantity</th>\n			<th>Total</th>\n		</tr>\n		<tr class=\"item-row\">\n			<td colspan=\"5\">{order_item}</td>\n		</tr>\n		<tr>\n			<td class=\"blank\" colspan=\"2\">&nbsp;</td>\n			<td class=\"total-line\" colspan=\"2\">Subtotal</td>\n			<td class=\"total-value\">\n			<div id=\"subtotal\">{total_amount}</div>\n			</td>\n		</tr>\n\n		<tr>\n			<td class=\"blank\" colspan=\"2\">&nbsp;</td>\n			<td class=\"total-line\" colspan=\"2\">Delivery Fee</td>\n			<td class=\"total-value\">\n			<div id=\"subtotal\">{total_shipping}</div>\n			</td>\n		</tr>\n		<tr>\n			<td class=\"blank\" colspan=\"2\">&nbsp;</td>\n			<td class=\"total-line\" colspan=\"2\">Coupon Amount</td>\n			<td class=\"total-value\">\n			<div id=\"subtotal\">{coupon}</div>\n			</td>\n		</tr>\n		<tr>\n			<td class=\"blank\" colspan=\"2\">&nbsp;</td>\n			<td class=\"total-line balance\" colspan=\"2\">Total</td>\n			<td class=\"total-value balance\">\n			<div class=\"due\">{total}</div>\n			</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n<style type=\"text/css\">#page-wrap{\nfont: 14px/1.4 Georgia, serif;\n}\n\n#logo {  position: relative; margin-top: -41px; border: 1px solid #fff; max-width: 448px; max-height: 100px; overflow: hidden; }\n#logo img { width: 200px; height: 100px}\n#address { width: 250px; height: 150px; float: right;text-align:right }\n#address h3 {margin:0px;}\n#address p {margin:0px;color:#CCC;}\n#customer { overflow: hidden; }\n\n#customer-title { float: left; }\n#customer-title h3{ font-size: 18px; font-weight: bold; color:#CCC;margin:0px }\n#customer-title p{ margin:0px }\n\ntable { border-collapse: collapse; }\n#items { clear: both; width: 100%; margin: 30px 0 0 0;border-collapse: collapse; }\n#items th { background: #999;color:#000; padding:8px 5px}\n#items textarea { width: 80px; height: 50px; }\n#items tr.item-row td { border: 0; vertical-align: top;text-align:center;padding:8px 5px }\n#items td.description { width: 300px; }\n.item-row td{ background-color:#eee; }\n#items td.item-name { width: 175px; }\n#items td.description textarea, #items td.item-name textarea { width: 100%; }\n#items td.total-line { border-right: 0; text-align: right; }\n#items td.total-value { border-left: 0; padding: 10px; }\n#items td.total-value textarea { height: 20px; background: none; }\n#items td.balance {  }\n#items td.blank { border: 0; }\n\n#terms { text-align: center; margin: 20px 0 0 0; }\n#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }\n</style>', '1410165891', '1449155973', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (8, 'mail order to store', 'Welcome to {site_name}', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear esr</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">Username: {user_name}</h3>\n\n<h3 style=\"margin-left:20px\">Email: {user_email}</h3>\n\n<h3 style=\"margin-left:20px\">Order Number: <strong>{order_number}</strong></h3>\n\n<p>&nbsp;</p>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1449498733', 1, 0);
INSERT INTO email (`id`, `name`, `subject`, `message`, `created`, `modified`, `status`, `deleted`) VALUES (9, 'send mail to created employee', 'Welcome to {site_name}', '<div style=\"border: solid #666;\">\n<div style=\"background-color: #000; color: #fff; text-align: center;\">\n<h1>{site_name}</h1>\n</div>\n\n<div style=\"background-color: #fff; color: #000;\">\n<h3 style=\"margin-left:20px\">Dear {user_name}</h3>\n</div>\n\n<div style=\"background-color: #999; color: #fff;\">\n<h3 style=\"margin-left:20px\">Email: {user_email}</h3>\n\n<h3 style=\"margin-left:20px\">Password: {password}</h3>\n\n<h3 style=\"margin-left:20px\">Login link:<a href=\"{login_link}\">Click here</a></h3>\n</div>\n\n<div style=\"background-color: #fff; color: #000; padding-left: 20px; font-size: 24px; line-height: 10px;\">\n<p>Regards,<br />\n<br />\n{site_name} Team</p>\n</div>\n</div>', '1410165891', '1457076663', 1, 0);


#
# TABLE STRUCTURE FOR: features
#

DROP TABLE IF EXISTS features;

CREATE TABLE `features` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: feedback
#

DROP TABLE IF EXISTS feedback;

CREATE TABLE `feedback` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_publish` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'user',
  `publish_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: home_images
#

DROP TABLE IF EXISTS home_images;

CREATE TABLE `home_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `order` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci,
  `video_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `image1` text COLLATE utf8_unicode_ci,
  `start_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO home_images (`id`, `parent_id`, `order`, `name`, `video`, `video_link`, `image`, `image1`, `start_image`, `start_image1`, `type`, `is_active`, `created`, `modified`, `enabled`) VALUES (1, 0, NULL, 'Video', 'video.webm', NULL, 'apple.jpg', NULL, NULL, NULL, 'video', 0, NULL, '1454652397', 1);


#
# TABLE STRUCTURE FOR: home_setting
#

DROP TABLE IF EXISTS home_setting;

CREATE TABLE `home_setting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO home_setting (`id`, `name`, `type`, `created`, `modified`, `enabled`) VALUES (1, 'Home Setting', 'slider', NULL, '1463743128', 1);


#
# TABLE STRUCTURE FOR: hotel_booking
#

DROP TABLE IF EXISTS hotel_booking;

CREATE TABLE `hotel_booking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tracking_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` bigint(20) DEFAULT '0',
  `order_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `owner_id` bigint(20) DEFAULT '0',
  `store_id` bigint(20) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_out` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `member` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `ordered_on` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read` tinyint(4) DEFAULT '0',
  `user_sound` tinyint(4) DEFAULT '0',
  `admin_read` tinyint(4) DEFAULT '0',
  `admin_sound` tinyint(4) DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hotel_booking (`id`, `tracking_number`, `order_number`, `order_type`, `user_id`, `owner_id`, `store_id`, `name`, `email`, `phone`, `address`, `check_in`, `check_out`, `room`, `member`, `comment`, `total`, `sub_total`, `ordered_on`, `status`, `read`, `user_sound`, `admin_read`, `admin_sound`, `created`, `modified`, `enabled`) VALUES (1, NULL, 0, NULL, 0, 0, 1, 'BookingUser', 'pvsysgroup01@gmail.com', '2312321312', 'sdfksd f', '09-02-2016', '10-02-2016', '3', '2', NULL, NULL, NULL, '2016-02-09 02:20:02', NULL, 0, 0, 0, 0, '1454907027', '1454907027', 1);


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS language;

CREATE TABLE `language` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default` tinyint(4) DEFAULT '0',
  `image` text COLLATE utf8_unicode_ci,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` double DEFAULT '1',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO language (`id`, `code`, `language`, `default`, `image`, `currency`, `unit`, `created`, `modified`, `enabled`) VALUES (1, 'EN', 'English', 1, 'en.jpg', 'Pound', '1', NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: news
#

DROP TABLE IF EXISTS news;

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8_unicode_ci,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: news_lang
#

DROP TABLE IF EXISTS news_lang;

CREATE TABLE `news_lang` (
  `id_page_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `news_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_page_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: newsletters
#

DROP TABLE IF EXISTS newsletters;

CREATE TABLE `newsletters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: page
#

DROP TABLE IF EXISTS page;

CREATE TABLE `page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) DEFAULT '0',
  `parent_id` bigint(20) DEFAULT '0',
  `top_menu` tinyint(4) DEFAULT '0',
  `bottom_menu` tinyint(4) DEFAULT '0',
  `middle_menu` bigint(20) DEFAULT '0',
  `is_banner` tinyint(4) DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(11) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (1, 0, 0, 0, 1, 0, NULL, NULL, 1, NULL, NULL, '2015-12-02 12:51:14', NULL, 'page', 'about-us', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (2, 0, 0, 0, 1, 0, NULL, NULL, 2, NULL, NULL, '2015-12-02 12:56:18', NULL, 'contact', 'Contact-us', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (3, 0, 0, 0, 1, 0, NULL, NULL, 5, NULL, NULL, '2015-12-10 05:44:06', NULL, 'page', 'help', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (5, 0, 0, 0, 0, 1, NULL, NULL, 7, NULL, NULL, '2016-02-02 12:56:01', NULL, 'page', 'Management-consulting', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (7, 0, 0, 0, 0, 1, NULL, NULL, 9, NULL, NULL, '2016-02-02 12:56:58', NULL, 'page', 'Formation', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (8, 0, 0, 0, 0, 1, NULL, NULL, 10, NULL, NULL, '2016-02-02 12:57:20', NULL, 'page', 'Event-Planning', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (9, 0, 0, 0, 0, 1, NULL, NULL, 11, NULL, NULL, '2016-02-02 12:57:51', NULL, 'page', 'Branding', NULL, NULL, NULL, NULL, 1);
INSERT INTO page (`id`, `region_id`, `parent_id`, `top_menu`, `bottom_menu`, `middle_menu`, `is_banner`, `image`, `order`, `menu_location`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `route_id`, `created`, `modified`, `enabled`) VALUES (10, 0, 0, 1, 0, 0, NULL, NULL, 3, NULL, NULL, '2016-02-02 14:48:46', NULL, 'page', 'services', NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: page_files
#

DROP TABLE IF EXISTS page_files;

CREATE TABLE `page_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slide_lang` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `page_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: page_lang
#

DROP TABLE IF EXISTS page_lang;

CREATE TABLE `page_lang` (
  `id_page_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_page_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (7, 1, 1, 'About us', '0', '<p>This is about us page</p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (11, 2, 1, 'Contact Us', '0', '<p>In case of any problem , feel free to contact by email.&nbsp;</p>\n\n<p>&nbsp;</p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (14, 5, 1, 'Management consulting', '0', '<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>From the experience of our team we have created a complete path for all departments, including the Directorate. </font><font>The route will go to analyze point by point your business, implementing and introducing new methods, IT tools and innovations, through a formation that will bring your hotel reality excellence.</font></font></p>\n\n<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>Ask for the course, it will be a pleasure for us to send it, and discuss it together!</font></font></p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (22, 7, 1, 'Formation', '0', '<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>The draft Revenue Coach is completely focused on training! </font><font>We do not believe in counseling that presents ideas and goes, we dedicate the resources, from beginning to end, all of our time in order to transmit the concepts to be learned and applied. </font><font>This is why the training is so focal in our project.&nbsp;</font></font><img alt=\"1\" class=\"size-medium wp-image-69 alignright\" height=\"172\" src=\"http://www.hotelcoach.it/public/wp-content/uploads/2015/11/1-300x172.jpg\" style=\"margin: 5px 0px 20px 20px; padding: 0px; border: none; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: middle; max-width: 100%; height: auto; float: right; display: inline;\" width=\"300\" /></p>\n\n<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>Our team offers some lessons in style &quot;Training on the Job&quot;, with a real coaching, aimed at staff development, with tangible results. </font><font>Telling our experiences, by implementing our methods, by providing our technologies we can bring the accommodation at the desired levels. </font><font>In addition to this we dispoinibili for lessons and training in the classroom, always through the stories of our experiences. </font><font>The topics can be extrapolated from the path of Revenue or Coaching Management Consulting, for a 360-degree training, or they can be tailored according to the needs of each, for a total personalization facility.</font></font></p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (24, 8, 1, 'Event Planning', '0', '<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>The draft Revenue Coach is completely focused on training! </font><font>We do not believe in counseling that presents ideas and goes, we dedicate the resources, from beginning to end, all of our time in order to transmit the concepts to be learned and applied. </font><font>This is why the training is so focal in our project.&nbsp;</font></font><img alt=\"1\" class=\"size-medium wp-image-69 alignright\" height=\"172\" src=\"http://www.hotelcoach.it/public/wp-content/uploads/2015/11/1-300x172.jpg\" style=\"margin: 5px 0px 20px 20px; padding: 0px; border: none; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: middle; max-width: 100%; height: auto; float: right; display: inline;\" width=\"300\" /></p>\n\n<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>Our team offers some lessons in style &quot;Training on the Job&quot;, with a real coaching, aimed at staff development, with tangible results. </font><font>Telling our experiences, by implementing our methods, by providing our technologies we can bring the accommodation at the desired levels. </font><font>In addition to this we dispoinibili for lessons and training in the classroom, always through the stories of our experiences. </font><font>The topics can be extrapolated from the path of Revenue or Coaching Management Consulting, for a 360-degree training, or they can be tailored according to the needs of each, for a total personalization facility.</font></font></p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (26, 9, 1, 'Branding', '0', '<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>The draft Revenue Coach is completely focused on training! </font><font>We do not believe in counseling that presents ideas and goes, we dedicate the resources, from beginning to end, all of our time in order to transmit the concepts to be learned and applied. </font><font>This is why the training is so focal in our project.&nbsp;</font></font><img alt=\"1\" class=\"size-medium wp-image-69 alignright\" height=\"172\" src=\"http://www.hotelcoach.it/public/wp-content/uploads/2015/11/1-300x172.jpg\" style=\"margin: 5px 0px 20px 20px; padding: 0px; border: none; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: middle; max-width: 100%; height: auto; float: right; display: inline;\" width=\"300\" /></p>\n\n<p style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: inherit; font-size: 14px; line-height: 25px; font-family: \'Open Sans\', Arial, sans-serif; vertical-align: baseline; color: rgb(94, 94, 94); letter-spacing: 0.5px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: justify; background-color: rgb(255, 255, 255);\"><font><font>Our team offers some lessons in style &quot;Training on the Job&quot;, with a real coaching, aimed at staff development, with tangible results. </font><font>Telling our experiences, by implementing our methods, by providing our technologies we can bring the accommodation at the desired levels. </font><font>In addition to this we dispoinibili for lessons and training in the classroom, always through the stories of our experiences. </font><font>The topics can be extrapolated from the path of Revenue or Coaching Management Consulting, for a 360-degree training, or they can be tailored according to the needs of each, for a total personalization facility.</font></font></p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (28, 10, 1, 'Services', '0', '<p>Services</p>\n', NULL, '', '', NULL, NULL, 1);
INSERT INTO page_lang (`id_page_lang`, `page_id`, `language_id`, `title`, `navigation_title`, `body`, `description`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (34, 3, 1, 'Help', '0', '<p>Help</p>\n', NULL, '', '', NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: partner_sliders
#

DROP TABLE IF EXISTS partner_sliders;

CREATE TABLE `partner_sliders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO partner_sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (1, 0, '0', 1, 1, 'UserName', 'This is description', 'FullSizeRender-208x300.jpg', NULL, '1454426943', '1454428883', 1);
INSERT INTO partner_sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (2, 0, '0', 1, 2, 'Sushant', 'sushant1', 'FullSizeRender-208x3001.jpg', NULL, '1454428459', '1454428459', 1);
INSERT INTO partner_sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (3, 0, '0', 1, 3, 'sushant2', 'sushant2', 'FullSizeRender-208x3002.jpg', NULL, '1454428486', '1454428486', 1);
INSERT INTO partner_sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (4, 0, '0', 1, 4, 'sushant3', 'sushant3', 'FullSizeRender-208x3003.jpg', NULL, '1454428509', '1454428517', 1);


#
# TABLE STRUCTURE FOR: problems
#

DROP TABLE IF EXISTS problems;

CREATE TABLE `problems` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `parent_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `admin_id` bigint(20) DEFAULT '0',
  `ticket_id` bigint(20) DEFAULT '0',
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `help` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solve_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solve_user_time` double DEFAULT NULL,
  `urgency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_private` tinyint(4) DEFAULT '0',
  `is_confirm` tinyint(4) DEFAULT '0',
  `rate` int(11) DEFAULT NULL,
  `done_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `done_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `on_date` date DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO problems (`id`, `customer_id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `ticket_id`, `company_name`, `user_name`, `name`, `desc`, `date`, `time`, `date_time`, `help`, `solve_time`, `solve_user_time`, `urgency`, `files`, `type`, `date_publish`, `slug`, `is_private`, `is_confirm`, `rate`, `done_by`, `done_user`, `on_date`, `created`, `modified`, `status`, `enabled`) VALUES (1, 1, 2, 0, 0, 12, 1, 'Plants From Seed Ltd', 'Lisa Watkins', NULL, 'My item has not been delivered guide content', '11-03-2016', '01:44 PM', '2016-03-11 13:44:00', '0', '10', '4', 'actually i am going dubai', NULL, NULL, NULL, NULL, 0, 1, 0, 'Delay', 'admin', '2016-03-11', '1457703892', '1457793101', 'Completed', 1);
INSERT INTO problems (`id`, `customer_id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `ticket_id`, `company_name`, `user_name`, `name`, `desc`, `date`, `time`, `date_time`, `help`, `solve_time`, `solve_user_time`, `urgency`, `files`, `type`, `date_publish`, `slug`, `is_private`, `is_confirm`, `rate`, `done_by`, `done_user`, `on_date`, `created`, `modified`, `status`, `enabled`) VALUES (2, 1, 2, 0, 0, 12, 2, 'Plants From Seed Ltd', 'Lisa Watkins', NULL, 'I need to check anasddsa items stock level content', '11-03-2016', '03:32 PM', '2016-03-11 15:32:00', '0', '3', '1', 'dfsdfsdf', NULL, NULL, NULL, NULL, 0, 0, 5, 'On Time', 'user', '2016-03-11', '1457710380', '1457764988', 'Completed', 1);
INSERT INTO problems (`id`, `customer_id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `ticket_id`, `company_name`, `user_name`, `name`, `desc`, `date`, `time`, `date_time`, `help`, `solve_time`, `solve_user_time`, `urgency`, `files`, `type`, `date_publish`, `slug`, `is_private`, `is_confirm`, `rate`, `done_by`, `done_user`, `on_date`, `created`, `modified`, `status`, `enabled`) VALUES (3, 1, 2, 0, 0, 0, 4, 'Plants From Seed Ltd', 'Lisa Watkins', NULL, 'Please upload your formated xls file with all the relevent information.\n\nName :Test\n\nAddress :Test\n\nCountry:Test', '11-03-2016', '04:17 PM', '2016-03-11 16:17:00', '0', '24', '0', 'test', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2016-03-11', '1457713072', '1457713072', 'Open', 1);
INSERT INTO problems (`id`, `customer_id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `ticket_id`, `company_name`, `user_name`, `name`, `desc`, `date`, `time`, `date_time`, `help`, `solve_time`, `solve_user_time`, `urgency`, `files`, `type`, `date_publish`, `slug`, `is_private`, `is_confirm`, `rate`, `done_by`, `done_user`, `on_date`, `created`, `modified`, `status`, `enabled`) VALUES (4, 1, 2, 0, 0, 0, 4, 'Plants From Seed Ltd', 'Lisa Watkins', NULL, 'Please upload your formated xls file with all the relevent information.\n\nName : user\n\nAddress :dfs s\n\nCountry: inida', '12-03-2016', '07:02 AM', '2016-03-12 07:02:00', '0', '24', '23', 'sdsdf sdfds', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2016-03-12', '1457766168', '1457766168', 'Open', 1);


#
# TABLE STRUCTURE FOR: problems_files
#

DROP TABLE IF EXISTS problems_files;

CREATE TABLE `problems_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slide_lang` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `problem_id` bigint(20) DEFAULT NULL,
  `problem_type` varchar(255) DEFAULT 'problem',
  `reply_id` bigint(20) DEFAULT '0',
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: problems_rating
#

DROP TABLE IF EXISTS problems_rating;

CREATE TABLE `problems_rating` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT NULL,
  `problem_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT '0',
  `rate` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `comment` text,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `enabled` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: problems_status
#

DROP TABLE IF EXISTS problems_status;

CREATE TABLE `problems_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `problem_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `notify` tinyint(1) DEFAULT '0',
  `description` text,
  `user_id` bigint(20) DEFAULT '0',
  `created_by` varchar(255) DEFAULT 'user',
  `date_added` datetime DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO problems_status (`id`, `problem_id`, `status`, `notify`, `description`, `user_id`, `created_by`, `date_added`, `created`, `modified`) VALUES (1, 2, 'Pending', 0, 'here is your tracking no. 45454545', 0, 'admin', NULL, '1457713180', '1457713180');
INSERT INTO problems_status (`id`, `problem_id`, `status`, `notify`, `description`, `user_id`, `created_by`, `date_added`, `created`, `modified`) VALUES (2, 1, 'Pending', 0, 'Please send us you address details please', 0, 'admin', NULL, '1457713437', '1457713437');


#
# TABLE STRUCTURE FOR: problems_time_setting
#

DROP TABLE IF EXISTS problems_time_setting;

CREATE TABLE `problems_time_setting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sun` tinyint(4) DEFAULT '0',
  `is_mon` tinyint(4) DEFAULT '0',
  `is_tue` tinyint(4) DEFAULT '0',
  `is_wed` tinyint(4) DEFAULT '0',
  `is_thr` tinyint(4) DEFAULT '0',
  `is_fri` tinyint(4) DEFAULT '0',
  `is_sat` tinyint(4) DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO problems_time_setting (`id`, `admin_id`, `user_id`, `start_time`, `end_time`, `is_sun`, `is_mon`, `is_tue`, `is_wed`, `is_thr`, `is_fri`, `is_sat`, `created`, `modified`, `status`, `enabled`) VALUES (1, 1, 0, '4', '16', 0, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: product_category
#

DROP TABLE IF EXISTS product_category;

CREATE TABLE `product_category` (
  `product_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: product_files
#

DROP TABLE IF EXISTS product_files;

CREATE TABLE `product_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slide_lang` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `filetype` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `product_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `modified` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: products
#

DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `admin_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `store_id` tinytext COLLATE utf8_unicode_ci,
  `category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `sub_category_id` bigint(20) DEFAULT '0',
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `price` double DEFAULT '0',
  `discount_price` double DEFAULT '0',
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boughtcount` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_expire` tinyint(4) DEFAULT '0',
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `free_shipping` tinyint(4) DEFAULT '0',
  `shipping_cost` double DEFAULT '0',
  `ordering` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credits_point` double DEFAULT NULL,
  `credits_cost` double DEFAULT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_feature` tinyint(4) DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'user',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  `confirm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: products_eoption
#

DROP TABLE IF EXISTS products_eoption;

CREATE TABLE `products_eoption` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `level` int(11) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `values` text,
  `description` text,
  `options` text,
  `field_slug` varchar(255) DEFAULT '',
  `type` varchar(255) DEFAULT '',
  `user_type` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `typeID` int(11) DEFAULT NULL,
  `required` tinyint(4) DEFAULT '0',
  `status` enum('Y','N') DEFAULT NULL,
  `postingTime` int(10) unsigned DEFAULT NULL,
  `created_by` varchar(255) DEFAULT 'admin',
  `employee_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `editable` varchar(255) DEFAULT 'editable',
  `is_visible` tinyint(4) DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: products_extra
#

DROP TABLE IF EXISTS products_extra;

CREATE TABLE `products_extra` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: products_lang
#

DROP TABLE IF EXISTS products_lang;

CREATE TABLE `products_lang` (
  `id_product_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `mobile_description` text COLLATE utf8_unicode_ci,
  `highlights` text COLLATE utf8_unicode_ci,
  `terms` text COLLATE utf8_unicode_ci,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_product_lang`),
  KEY `fk_tag_language1` (`language_id`),
  KEY `fk_tag_lang_page1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: products_option
#

DROP TABLE IF EXISTS products_option;

CREATE TABLE `products_option` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: public_chat
#

DROP TABLE IF EXISTS public_chat;

CREATE TABLE `public_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` bigint(20) DEFAULT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `from_name` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `to_id` bigint(20) DEFAULT NULL,
  `to` varchar(255) NOT NULL DEFAULT '',
  `to_name` varchar(255) DEFAULT NULL,
  `recipient_type` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recd` int(10) DEFAULT '0',
  `read` int(11) DEFAULT '0',
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: remarks
#

DROP TABLE IF EXISTS remarks;

CREATE TABLE `remarks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `owner_id` bigint(20) DEFAULT '0',
  `parent_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `admin_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_private` tinyint(4) DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'employee',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (1, 7, 6, 0, 0, 0, NULL, 'remak2', 'sd adsad', '6.jpg', '14-2-2016', NULL, NULL, NULL, NULL, 0, 'employee', '1454595489', '1454596432', NULL, 1);
INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (2, 7, 6, 0, 0, 0, NULL, 'New remark', 'sd adsad', '61.jpg', '2-2-2016', NULL, NULL, NULL, NULL, 0, 'employee', '1454595715', '1454596434', NULL, 1);
INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (3, 1, 1, 0, 0, 0, NULL, 'Partner remark', 'This is file', 'as.xls', '10-02-2016', NULL, NULL, NULL, NULL, 0, 'employee', '1454738839', '1454738839', NULL, 1);
INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (4, 1, 1, 0, 0, 0, NULL, 'Admin Remark', 'This is remark data.', 'newExcel2015i.xls', '18-02-2016', NULL, NULL, NULL, NULL, 0, 'employee', '1454935490', '1454935490', NULL, 1);
INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (5, 1, 1, 0, 0, 0, NULL, 'edit', 'sdas das', NULL, '08-02-2016', NULL, NULL, NULL, NULL, 0, 'admin', '1454936590', '1454936590', NULL, 1);
INSERT INTO remarks (`id`, `user_id`, `owner_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `files`, `dates`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created_by`, `created`, `modified`, `status`, `enabled`) VALUES (6, 1, 1, 0, 0, 0, NULL, 'Eit', 'sdas das', NULL, '08-02-2016', NULL, NULL, NULL, NULL, 0, 'admin', '1454936781', '1454936781', NULL, 1);


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS setting;

CREATE TABLE `setting` (
  `field` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `modified` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('rss_url', NULL, NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('pinterest_url', NULL, NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('menu_imag', NULL, NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('menu_image', 'batman_2.jpg', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('image', 'logo.png', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('footer_text', 'All rights reserved @ 2014', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('donation', '5', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('linkedin_url', 'http://linkedin.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('youtube_url', 'https://www.youtube.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('twitter_url', 'https://twitter.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('facebook_url', 'https://www.facebook.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('google_plus', 'https://plus.google.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('skype_id', '0', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('instagram_url', 'http://instagram_url.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('admin_link', 'admin', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('site_name', 'ReviveERP', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('home_title', 'ReviveERP', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('site_email', 'pvsysgrouptesting@gmail.com', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('meta_title', 'ReviveERP', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('keywords', 'ReviveERP', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('meta_description', 'ReviveERP', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('phone', '+98765432110', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('address', 'Address', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('gps', '40.383312250346265, 49.87023403847661', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('website_active', '1', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('website_desc', '<h1>We&#39;ll be back soon!</h1>\n\n<div>\n<p>Sorry for the inconvenience but we are performing some maintenance at the moment. we will be back online shortly!</p>\n\n<p>&nbsp;</p>\n</div>\n', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('analytic_code', '          ', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('logo', 'css-logo.jpg', NULL, NULL);
INSERT INTO setting (`field`, `value`, `created`, `modified`) VALUES ('background', 'background.jpg', NULL, NULL);


#
# TABLE STRUCTURE FOR: sliders
#

DROP TABLE IF EXISTS sliders;

CREATE TABLE `sliders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (18, 0, '0', 1, 2, 'Slider', 'This is description of slider.', 'slider3.png', '0', '1445884019', '1463742997', 1);
INSERT INTO sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (19, 0, '0', 1, 3, 'Slider2', '', 'slider2.jpg', '0', '1445884064', '1463743050', 1);
INSERT INTO sliders (`id`, `parent_id`, `type`, `status`, `order`, `name`, `description`, `image`, `link`, `created`, `modified`, `enabled`) VALUES (20, 0, '0', 1, 4, 'Slider3', 'This is desc', 'sider1.jpg', '0', '1463743124', '1463743134', 1);


#
# TABLE STRUCTURE FOR: social_links
#

DROP TABLE IF EXISTS social_links;

CREATE TABLE `social_links` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `enabled` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: static_text
#

DROP TABLE IF EXISTS static_text;

CREATE TABLE `static_text` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (1, NULL, 'Register', NULL, 1, NULL, '1428477556', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (2, NULL, 'Login', NULL, 2, NULL, '1428477587', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (3, NULL, 'Search', NULL, 3, NULL, '1428477632', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (4, NULL, 'Update', NULL, 4, NULL, '1428477690', '1446201428', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (5, NULL, 'Delete', NULL, 5, NULL, '1428477724', '1446303257', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (6, NULL, 'Product', NULL, 6, NULL, '1428477823', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (7, NULL, 'Checkout', NULL, 7, NULL, '1428477846', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (8, NULL, 'Category', NULL, 8, NULL, '1428477864', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (9, NULL, 'News', NULL, 9, NULL, '1428477903', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (10, NULL, 'Home', NULL, 10, NULL, '1428477988', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (11, NULL, 'Pages', NULL, 11, NULL, '1428478009', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (12, NULL, 'Sign Up', NULL, 12, NULL, '1428478059', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (13, NULL, 'Sign in', NULL, 13, NULL, '1428478074', '1428481717', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (14, NULL, 'My Account', NULL, 14, NULL, '1428478094', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (15, NULL, 'Your personal information', NULL, 15, NULL, '1428478114', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (16, NULL, 'Name', NULL, 16, NULL, '1428478127', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (17, NULL, 'Surname', NULL, 17, NULL, '1428478142', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (18, NULL, 'E-mail', NULL, 18, NULL, '1428478156', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (19, NULL, 'Your Password', NULL, 19, NULL, '1428478199', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (20, NULL, 'Password', NULL, 20, NULL, '1428478217', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (21, NULL, 'confirm password', NULL, 21, NULL, '1428478240', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (22, NULL, 'Cancel', NULL, 22, NULL, '1428478281', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (23, NULL, 'Menu', NULL, 23, NULL, '1428478326', '1447751308', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (24, NULL, 'Forgot Your Password', NULL, 24, NULL, '1428478393', '1449048058', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (25, NULL, 'Like', NULL, 25, NULL, '1428478435', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (26, NULL, 'Available', NULL, 26, NULL, '1428478474', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (27, NULL, 'Keywords', NULL, 27, NULL, '1428478489', '1446291808', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (28, NULL, 'View', NULL, 28, NULL, '1428478501', '1447754968', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (29, NULL, 'Background Setting', NULL, 29, NULL, '1428478523', '1454994639', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (30, NULL, 'Background Image', NULL, 30, NULL, '1428478543', '1454994663', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (31, NULL, 'Background Video', NULL, 31, NULL, '1428478559', '1454994692', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (32, NULL, 'Cart', NULL, 32, NULL, '1428478609', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (33, NULL, 'New Customer', NULL, 33, NULL, '1428478664', '1447750805', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (34, NULL, 'information', NULL, 34, NULL, '1428478685', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (35, NULL, 'Reviews', NULL, 35, NULL, '1428478740', '1454993282', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (36, NULL, 'Review', NULL, 36, NULL, '1428478752', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (37, NULL, 'picture', NULL, 37, NULL, '1428478810', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (38, NULL, 'description', NULL, 38, NULL, '1428478828', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (39, NULL, 'code', NULL, 39, NULL, '1428478841', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (40, NULL, 'quantitative', NULL, 40, NULL, '1428478853', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (41, NULL, 'price', NULL, 41, NULL, '1428478883', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (42, NULL, 'unit price', NULL, 42, NULL, '1428478891', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (43, NULL, 'Total', NULL, 43, NULL, '1428478915', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (44, NULL, 'Product Description', NULL, 44, NULL, '1428478959', '1446616883', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (45, NULL, 'Profile Update', NULL, 45, NULL, '1428479019', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (46, NULL, 'address', NULL, 46, NULL, '1428479081', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (47, NULL, 'Liked', NULL, 47, NULL, '1428479123', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (48, NULL, 'wishlist', NULL, 48, NULL, '1428479154', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (49, NULL, 'My Order', NULL, 49, NULL, '1428479168', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (50, NULL, 'Change Password', NULL, 50, NULL, '1428479182', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (51, NULL, 'Old Password', NULL, 51, NULL, '1428479191', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (52, NULL, 'hood', NULL, 52, NULL, '1428479233', '1428481718', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (53, NULL, 'Action', NULL, 53, NULL, '1428479261', '1428481719', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (54, NULL, 'order No.', NULL, 54, NULL, '1428479286', '1428481719', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (55, NULL, 'Message', NULL, 55, NULL, '1428595392', '1428595392', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (56, NULL, 'submit', NULL, 56, NULL, '1428595433', '1428595433', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (57, NULL, 'Logout', NULL, 57, NULL, '1428595459', '1428595459', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (58, NULL, 'My Cart', NULL, NULL, NULL, '1428596210', '1428596210', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (59, NULL, 'My Product', NULL, NULL, NULL, '1428918325', '1428918325', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (60, NULL, 'My Product Order', NULL, NULL, NULL, '1428918342', '1428918342', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (61, NULL, 'Feature', NULL, NULL, NULL, '1428918428', '1454997702', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (62, NULL, 'Copy Right', NULL, NULL, NULL, '1437662021', '1447751474', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (63, NULL, 'Select City', NULL, NULL, NULL, '1438581278', '1454990605', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (64, NULL, 'Call Us Now', NULL, NULL, NULL, '1438581329', '1438581329', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (65, NULL, 'New', NULL, NULL, NULL, '1438581451', '1438581451', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (66, NULL, 'SERVICES', NULL, NULL, NULL, '1438581540', '1438581540', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (67, NULL, 'Welcome', NULL, NULL, NULL, '1438581600', '1454566083', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (68, NULL, 'Featured Hotel', NULL, NULL, NULL, '1438581689', '1454566163', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (69, NULL, 'Bought', NULL, NULL, NULL, '1438581740', '1438581740', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (70, NULL, 'Latest Blogs', NULL, NULL, NULL, '1438581813', '1438581813', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (71, NULL, 'More', NULL, NULL, NULL, '1438581868', '1438581868', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (72, NULL, 'Get the latest deals and special offers', NULL, NULL, NULL, '1438581953', '1447751137', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (73, NULL, 'Read More', NULL, NULL, NULL, '1438582113', '1438582113', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (74, NULL, 'Follow us', NULL, NULL, NULL, '1438582181', '1447751002', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (75, NULL, 'NEWSLETTER', NULL, NULL, NULL, '1438582406', '1438582406', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (76, NULL, 'COMPANY INFO', NULL, NULL, NULL, '1438582442', '1438582442', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (77, NULL, 'Subscribe', NULL, NULL, NULL, '1438583457', '1438583457', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (78, NULL, 'No Products', NULL, NULL, NULL, '1438584051', '1438584051', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (79, NULL, 'Go To Cart', NULL, NULL, NULL, '1438584155', '1438584155', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (80, NULL, 'Dashboard', NULL, NULL, NULL, '1438601454', '1438601454', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (81, NULL, 'Enter your email', NULL, NULL, NULL, '1438603598', '1438603598', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (82, NULL, 'Phone', NULL, NULL, NULL, '1438603648', '1438603648', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (83, NULL, 'Date Of birth', NULL, NULL, NULL, '1438603677', '1438603677', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (84, NULL, 'City', NULL, NULL, NULL, '1438603697', '1438603697', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (85, NULL, 'Country', NULL, NULL, NULL, '1438603711', '1438603711', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (86, NULL, 'Create Account', NULL, NULL, NULL, '1438603742', '1438603742', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (87, NULL, 'Hotel Name', NULL, NULL, NULL, '1438603863', '1454991932', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (88, NULL, 'Department', NULL, NULL, NULL, '1438603880', '1454991956', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (89, NULL, 'Start Time', NULL, NULL, NULL, '1438603893', '1454992022', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (90, NULL, 'End Time', NULL, NULL, NULL, '1438603907', '1454992040', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (91, NULL, 'Welcome To user', NULL, NULL, NULL, '1438603930', '1454993061', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (92, NULL, 'Here you can manage your online business, access the', NULL, NULL, NULL, '1438603951', '1454992652', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (93, NULL, 'and keep up to date with all the latest news through the Partner Blog', NULL, NULL, NULL, '1439279932', '1454992692', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (94, NULL, 'From', NULL, NULL, NULL, '1443714848', '1454992747', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (95, NULL, 'To', NULL, NULL, NULL, '1443714883', '1454992766', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (96, NULL, 'Contact', NULL, NULL, NULL, '1443714911', '1443714911', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (97, NULL, 'Hotel management', NULL, NULL, NULL, '1443714926', '1454993181', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (98, NULL, 'Import Export', NULL, NULL, NULL, '1443714946', '1454993218', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (99, NULL, 'Booking', NULL, NULL, NULL, '1443715302', '1454993244', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (100, NULL, 'User', NULL, NULL, NULL, '1443715327', '1456911092', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (101, NULL, 'Remark', NULL, NULL, NULL, '1443715344', '1454993338', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (102, NULL, 'Ticket Management', NULL, NULL, NULL, '1443868455', '1454993386', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (103, NULL, 'Ticket', NULL, NULL, NULL, '1443868573', '1454993401', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (104, NULL, 'Quantity', NULL, NULL, NULL, '1443868609', '1443868609', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (105, NULL, 'Chat', NULL, NULL, NULL, '1443868638', '1454993437', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (106, NULL, 'Employee Management', NULL, NULL, NULL, '1443868662', '1454995011', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (107, NULL, 'Employee', NULL, NULL, NULL, '1443878111', '1454995042', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (108, NULL, 'Our Team', NULL, NULL, NULL, '1443878162', '1454995057', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (109, NULL, 'Remove', NULL, NULL, NULL, '1443878313', '1443878313', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (110, NULL, ' Registered Customers', NULL, NULL, NULL, '1443878829', '1443878829', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (111, NULL, 'Email Address', NULL, NULL, NULL, '1443878862', '1443878862', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (112, NULL, 'Personal Information', NULL, NULL, NULL, '1443879258', '1443879258', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (113, NULL, 'User Type', NULL, NULL, NULL, '1443879294', '1443879294', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (114, NULL, 'Address Details', NULL, NULL, NULL, '1443879324', '1443879324', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (115, NULL, 'Login Information', NULL, NULL, NULL, '1443879362', '1443879362', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (116, NULL, 'Shopping Cart', NULL, NULL, NULL, '1443879911', '1443879911', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (117, NULL, 'Subtotal', NULL, NULL, NULL, '1443879923', '1443879923', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (118, NULL, 'Size', NULL, NULL, NULL, '1443879934', '1443879934', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (119, NULL, 'Total Room', NULL, NULL, NULL, '1443879968', '1454997948', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (120, NULL, 'Donation', NULL, NULL, NULL, '1443879984', '1443879984', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (121, NULL, 'Coupon', NULL, NULL, NULL, '1443879995', '1443879995', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (122, NULL, 'Remark', NULL, NULL, NULL, '1443880012', '1443880012', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (123, NULL, 'Enter The Code', NULL, NULL, NULL, '1443880024', '1454991072', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (124, NULL, 'Can\'t read the image? click', NULL, NULL, NULL, '1443880069', '1454991131', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (125, NULL, 'Click here', NULL, NULL, NULL, '1443880088', '1454991187', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (126, NULL, 'NEW CUSTOMERS', NULL, NULL, NULL, '1443881175', '1454991245', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (127, NULL, 'Next', NULL, NULL, NULL, '1443881784', '1443881784', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (128, NULL, 'Hotels Analysis', NULL, NULL, NULL, '1443881943', '1454995253', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (129, NULL, 'Hotel List', NULL, NULL, NULL, '1443881962', '1454995268', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (130, NULL, 'Hotel Staff', NULL, NULL, NULL, '1443881975', '1454995286', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (131, NULL, 'Tag', NULL, NULL, NULL, '1443882853', '1454995302', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (132, NULL, 'Back', NULL, NULL, NULL, '1443883903', '1443883903', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (133, NULL, 'Booking Management', NULL, NULL, NULL, '1443883929', '1454995413', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (134, NULL, 'Language', NULL, NULL, NULL, '1444130161', '1444130161', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (135, NULL, 'Choose Your Hotel', NULL, NULL, NULL, '1445864497', '1454564837', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (136, NULL, 'Associates Services', NULL, NULL, NULL, '1445864513', '1454566212', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (137, NULL, 'FEATURED SERVICES', NULL, NULL, NULL, '1445864853', '1454566249', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (138, NULL, 'Associated Hotels', NULL, NULL, NULL, '1445869181', '1454566291', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (139, NULL, 'Site Links', NULL, NULL, NULL, '1445869205', '1454566345', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (140, NULL, 'Subscribe Newsletter', NULL, NULL, NULL, '1445869219', '1454566381', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (141, NULL, 'GET IN TOUCH', NULL, NULL, NULL, '1445869240', '1454566438', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (142, NULL, 'Logistiek', NULL, NULL, NULL, '1445871218', '1445871218', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (143, NULL, 'Sign Up for Our Newsletter', NULL, NULL, NULL, '1445873707', '1445873707', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (144, NULL, 'Reviews and rating summary', NULL, NULL, NULL, '1445955322', '1455015633', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (145, NULL, 'Latest Reviews', NULL, NULL, NULL, '1445955346', '1455015683', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (146, NULL, 'hotel Details', NULL, NULL, NULL, '1445957173', '1454991850', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (147, NULL, 'Forgot Password', NULL, NULL, NULL, '1445958109', '1445958109', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (148, NULL, 'Gallery', NULL, NULL, NULL, '1446012421', '1446012421', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (149, NULL, 'Total Cost Of Shipping', NULL, NULL, NULL, '1446108159', '1446108159', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (150, NULL, 'Attachment', NULL, NULL, NULL, '1446109502', '1455014196', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (151, NULL, 'Visit', NULL, NULL, NULL, '1446186569', '1446186569', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (152, NULL, 'Order History', NULL, NULL, NULL, '1446186940', '1446186940', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (153, NULL, 'Date', NULL, NULL, NULL, '1446187011', '1446187011', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (154, NULL, 'Coupon Amount', NULL, NULL, NULL, '1446187049', '1446187049', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (155, NULL, 'Total Amount', NULL, NULL, NULL, '1446187087', '1446187087', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (156, NULL, 'Option', NULL, NULL, NULL, '1446187126', '1446187126', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (157, NULL, 'Comment', NULL, NULL, NULL, '1446201046', '1446201046', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (158, NULL, 'Status', NULL, NULL, NULL, '1446201085', '1446201085', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (159, NULL, 'Select image', NULL, NULL, NULL, '1446201309', '1446201309', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (160, NULL, 'Change', NULL, NULL, NULL, '1446201356', '1446201356', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (161, NULL, 'New Password', NULL, NULL, NULL, '1446201570', '1446201570', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (162, NULL, 'General Settings', NULL, NULL, NULL, '1446210730', '1446210730', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (163, NULL, 'Email Settings', NULL, NULL, NULL, '1446210773', '1446210773', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (164, NULL, 'Language', NULL, NULL, NULL, '1446210914', '1446210914', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (165, NULL, 'Update Data', NULL, NULL, NULL, '1446210966', '1446210966', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (166, NULL, 'Product Management', NULL, NULL, NULL, '1446210981', '1446210981', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (167, NULL, 'Category', NULL, NULL, NULL, '1446210997', '1446210997', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (168, NULL, 'Colour Management', NULL, NULL, NULL, '1446211021', '1446211021', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (169, NULL, 'Size Management', NULL, NULL, NULL, '1446211037', '1446211037', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (170, NULL, 'Products', NULL, NULL, NULL, '1446211059', '1446211059', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (171, NULL, 'Order Management', NULL, NULL, NULL, '1446211077', '1446211077', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (172, NULL, 'Website', NULL, NULL, NULL, '1446211093', '1446211093', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (173, NULL, 'Reports', NULL, NULL, NULL, '1446211107', '1446211107', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (174, NULL, 'Payment History', NULL, NULL, NULL, '1446211122', '1446211122', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (175, NULL, 'Event Management', NULL, NULL, NULL, '1446211137', '1446211137', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (176, NULL, 'Gallery Management', NULL, NULL, NULL, '1446211163', '1446211163', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (177, NULL, 'User Management', NULL, NULL, NULL, '1446211181', '1446211181', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (178, NULL, 'User', NULL, NULL, NULL, '1446211197', '1446211197', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (179, NULL, 'Coupon', NULL, NULL, NULL, '1446211209', '1446211209', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (180, NULL, 'Content Management', NULL, NULL, NULL, '1446211224', '1446211224', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (181, NULL, 'Content', NULL, NULL, NULL, '1446211238', '1446211238', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (182, NULL, 'Page', NULL, NULL, NULL, '1446211259', '1446211259', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (183, NULL, 'Slider', NULL, NULL, NULL, '1446211272', '1446211272', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (184, NULL, 'Partner Logo', NULL, NULL, NULL, '1446211386', '1446212241', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (185, NULL, 'Newsletter Management', NULL, NULL, NULL, '1446211434', '1446211434', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (186, NULL, 'Newsletter', NULL, NULL, NULL, '1446211447', '1446211447', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (187, NULL, 'User Subcriber', NULL, NULL, NULL, '1446211494', '1446211494', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (188, NULL, 'Social Network', NULL, NULL, NULL, '1446211647', '1446211647', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (189, NULL, 'Static Text', NULL, NULL, NULL, '1446211703', '1446211703', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (190, NULL, 'Thank you for subscribing', NULL, NULL, NULL, '1446212409', '1446212409', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (191, NULL, 'You already subscribe', NULL, NULL, NULL, '1446212463', '1446212463', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (192, NULL, 'Event', NULL, NULL, NULL, '1446212696', '1446212696', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (193, NULL, 'Booking History', NULL, NULL, NULL, '1446212714', '1454995515', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (194, NULL, 'Sort By', NULL, NULL, NULL, '1446212928', '1446212928', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (195, NULL, 'Low to High', NULL, NULL, NULL, '1446212945', '1446212945', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (196, NULL, 'High to Low', NULL, NULL, NULL, '1446212956', '1446212956', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (197, NULL, 'New', NULL, NULL, NULL, '1446213004', '1446213004', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (198, NULL, 'There is no product', NULL, NULL, NULL, '1446213020', '1446213020', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (199, NULL, 'Thank You for contacting us. We Will Contact You soon', NULL, NULL, NULL, '1446213533', '1446213533', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (200, NULL, 'Mail can not be send dur to some server problem', NULL, NULL, NULL, '1446213586', '1446213586', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (201, NULL, 'Please enter a valid email-id', NULL, NULL, NULL, '1446213601', '1446213601', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (202, NULL, 'Please enter email-id', NULL, NULL, NULL, '1446213614', '1446213614', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (203, NULL, 'Your product is sucessfully added to your cart', NULL, NULL, NULL, '1446214568', '1446214568', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (204, NULL, 'Product can not add to cart', NULL, NULL, NULL, '1446214634', '1446214634', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (205, NULL, 'Create your guest account', NULL, NULL, NULL, '1446221046', '1446221046', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (206, NULL, 'Do you have VAT No. or fature No.', NULL, NULL, NULL, '1446271430', '1446271430', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (207, NULL, 'Yes', NULL, NULL, NULL, '1446271509', '1446271509', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (208, NULL, 'No', NULL, NULL, NULL, '1446271518', '1446271518', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (209, NULL, 'Hotel', NULL, NULL, NULL, '1446271532', '1454995817', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (210, NULL, 'Zip Code', NULL, NULL, NULL, '1446271691', '1446271691', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (211, NULL, 'Profile has been successfully updated', NULL, NULL, NULL, '1446277661', '1446277661', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (212, NULL, 'Old Password is wrong password', NULL, NULL, NULL, '1446277709', '1446277709', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (213, NULL, 'Password does not match', NULL, NULL, NULL, '1446277773', '1446277773', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (214, NULL, 'Your Password has successfully been Updated', NULL, NULL, NULL, '1446277808', '1446277808', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (215, NULL, 'Thank you for order', NULL, NULL, NULL, '1446278658', '1446278658', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (216, NULL, 'Thanks for register!', NULL, NULL, NULL, '1446278798', '1446278798', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (217, NULL, 'Please verify your account by clicking the link sent to your e-mail address', NULL, NULL, NULL, '1446278815', '1446278815', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (218, NULL, 'Be sure to check your junk mail folder', NULL, NULL, NULL, '1446278828', '1446278828', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (219, NULL, 'Field required', NULL, NULL, NULL, '1446279068', '1446279068', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (220, NULL, 'Email must unique', NULL, NULL, NULL, '1446279226', '1446279226', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (221, NULL, 'Field must contain an integer', NULL, NULL, NULL, '1446279379', '1446279379', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (222, NULL, 'Your email ID has not verify', NULL, NULL, NULL, '1446281246', '1446281246', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (223, NULL, 'Your account has been deactived', NULL, NULL, NULL, '1446281260', '1446281260', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (224, NULL, 'Invalid user id or password', NULL, NULL, NULL, '1446281278', '1446281278', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (225, NULL, 'Your password has successfully sent your email ID. Please Check email', NULL, NULL, NULL, '1446281409', '1446281409', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (226, NULL, 'Invalid email-ID', NULL, NULL, NULL, '1446281436', '1446281436', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (227, NULL, 'Room', NULL, NULL, NULL, '1446281889', '1455015945', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (228, NULL, 'There is no data', NULL, NULL, NULL, '1446282073', '1446282073', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (229, NULL, 'Amount', NULL, NULL, NULL, '1446282188', '1446282188', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (230, NULL, 'Send', NULL, NULL, NULL, '1446282205', '1455014808', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (231, NULL, 'Used', NULL, NULL, NULL, '1446282218', '1446282218', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (232, NULL, 'Expire Date', NULL, NULL, NULL, '1446282233', '1446282233', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (233, NULL, 'Add New', NULL, NULL, NULL, '1446282544', '1446282544', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (234, NULL, 'Add', NULL, NULL, NULL, '1446282553', '1446282553', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (235, NULL, 'Save', NULL, NULL, NULL, '1446282572', '1446282572', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (236, NULL, 'Title', NULL, NULL, NULL, '1446282603', '1446282603', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (237, NULL, 'Users', NULL, NULL, NULL, '1446290331', '1446290331', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (238, NULL, 'Guests', NULL, NULL, NULL, '1446290344', '1446290344', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (239, NULL, 'Today Booking', NULL, NULL, NULL, '1446290392', '1454995874', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (240, NULL, 'Month Booking', NULL, NULL, NULL, '1446290410', '1454995905', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (241, NULL, 'Year Booking', NULL, NULL, NULL, '1446290690', '1454995943', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (242, NULL, 'Username', NULL, NULL, NULL, '1446290862', '1446290862', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (243, NULL, 'Ordered On', NULL, NULL, NULL, '1446290921', '1446290921', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (244, NULL, 'ID', NULL, NULL, NULL, '1446291094', '1446291094', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (245, NULL, 'Site Name', NULL, NULL, NULL, '1446291451', '1446291451', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (246, NULL, 'Site Email', NULL, NULL, NULL, '1446291464', '1446291464', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (247, NULL, 'Meta Title', NULL, NULL, NULL, '1446291476', '1446291476', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (248, NULL, 'Meta Description', NULL, NULL, NULL, '1446291500', '1446291500', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (249, NULL, 'Home Title', NULL, NULL, NULL, '1446291512', '1446291512', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (250, NULL, 'Analytic Code', NULL, NULL, NULL, '1446291523', '1446291572', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (251, NULL, 'Website Active', NULL, NULL, NULL, '1446291582', '1446291582', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (252, NULL, 'Website Offline Message', NULL, NULL, NULL, '1446291606', '1446291606', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (253, NULL, 'Logo', NULL, NULL, NULL, '1446291627', '1446291627', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (254, NULL, 'Edit', NULL, NULL, NULL, '1446292488', '1446292488', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (255, NULL, 'Subject', NULL, NULL, NULL, '1446292636', '1446292636', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (256, NULL, 'Confirm', NULL, NULL, NULL, '1446292939', '1446292939', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (257, NULL, 'Create', NULL, NULL, NULL, '1446293408', '1446293408', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (258, NULL, 'Options', NULL, NULL, NULL, '1446293805', '1446293805', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (259, NULL, 'Flag', NULL, NULL, NULL, '1446293826', '1446293826', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (260, NULL, 'Default', NULL, NULL, NULL, '1446293854', '1446293854', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (261, NULL, 'Currency', NULL, NULL, NULL, '1446294078', '1446294078', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (262, NULL, 'Unit $ price ', NULL, NULL, NULL, '1446294105', '1446294105', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (263, NULL, 'Image', NULL, NULL, NULL, '1446294130', '1446294130', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (264, NULL, 'Drag to data and then click \'Save\'', NULL, NULL, NULL, '1446294875', '1446294875', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (265, NULL, 'Are you sure?', NULL, NULL, NULL, '1446295018', '1446295018', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (266, NULL, 'Parent', NULL, NULL, NULL, '1446295561', '1446295561', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (267, NULL, 'Slug', NULL, NULL, NULL, '1446295594', '1446295594', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (268, NULL, 'Translation data', NULL, NULL, NULL, '1446295612', '1446295612', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (269, NULL, 'Subcategory', NULL, NULL, NULL, '1446296679', '1446296679', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (270, NULL, 'Section', NULL, NULL, NULL, '1446296704', '1446296704', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (271, NULL, 'Discount Price', NULL, NULL, NULL, '1446297902', '1446297902', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (272, NULL, 'Stock Quantity', NULL, NULL, NULL, '1446297927', '1446297927', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (273, NULL, 'Free', NULL, NULL, NULL, '1446297951', '1454997638', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (274, NULL, 'Product Code', NULL, NULL, NULL, '1446297975', '1446297975', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (275, NULL, 'Youtube Link', NULL, NULL, NULL, '1446297993', '1446297993', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (276, NULL, 'Body', NULL, NULL, NULL, '1446298012', '1446298012', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (277, NULL, 'More Photo', NULL, NULL, NULL, '1446298043', '1446298043', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (278, NULL, 'Upload', NULL, NULL, NULL, '1446298065', '1446298065', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (279, NULL, 'Export', NULL, NULL, NULL, '1446298652', '1446298652', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (280, NULL, 'Add Order History', NULL, NULL, NULL, '1446299588', '1446299588', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (281, NULL, 'Notify', NULL, NULL, NULL, '1446299616', '1446299616', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (282, NULL, 'Best Sell', NULL, NULL, NULL, '1446300679', '1446300679', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (283, NULL, 'Token', NULL, NULL, NULL, '1446300899', '1446300899', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (284, NULL, 'Place', NULL, NULL, NULL, '1446302138', '1446302138', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (285, NULL, 'Coupon Transection History', NULL, NULL, NULL, '1446303772', '1446303772', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (286, NULL, 'Download', NULL, NULL, NULL, '1446303867', '1455016332', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (287, NULL, 'Reduction Amount', NULL, NULL, NULL, '1446304467', '1446304467', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (288, NULL, 'Template', NULL, NULL, NULL, '1446305049', '1446305049', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (289, NULL, 'Top Menu', NULL, NULL, NULL, '1446305063', '1446305063', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (290, NULL, 'Bottom Menu', NULL, NULL, NULL, '1446305077', '1446305077', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (291, NULL, 'Position', NULL, NULL, NULL, '1446305683', '1446305683', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (292, NULL, 'Link', NULL, NULL, NULL, '1446306007', '1446306007', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (293, NULL, 'Save And Send', NULL, NULL, NULL, '1446306818', '1446306818', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (294, NULL, 'Setting has successfully updated', NULL, NULL, NULL, '1446451363', '1446451363', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (295, NULL, 'Data has successfully created', NULL, NULL, NULL, '1446451427', '1446451644', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (296, NULL, 'Data has successfully updated', NULL, NULL, NULL, '1446451585', '1446451669', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (297, NULL, 'Data has successfully deleted', NULL, NULL, NULL, '1446451599', '1446451599', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (298, NULL, 'Data has successfully sent', NULL, NULL, NULL, '1446452501', '1446452501', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (299, NULL, 'Code should be unique', NULL, NULL, NULL, '1446453473', '1446453473', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (300, NULL, 'Member', NULL, NULL, NULL, '1446616967', '1454996592', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (301, NULL, 'Get Answer', NULL, NULL, NULL, '1446616995', '1455014715', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (302, NULL, 'Anwser', NULL, NULL, NULL, '1446617025', '1455014672', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (303, NULL, 'Contact Us', NULL, NULL, NULL, '1446619679', '1446619679', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (304, NULL, 'Check in', NULL, NULL, NULL, '1446620477', '1454996634', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (305, NULL, 'check out', NULL, NULL, NULL, '1446620503', '1454996657', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (306, NULL, 'Company Name', NULL, NULL, NULL, '1446621306', '1446621306', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (307, NULL, 'Street Name', NULL, NULL, NULL, '1446621391', '1446621391', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (308, NULL, 'House Number', NULL, NULL, NULL, '1446621434', '1446621434', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (309, NULL, 'I accept the privacy policy of', NULL, NULL, NULL, '1446622474', '1446622474', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (310, NULL, 'Room Count', NULL, NULL, NULL, '1446640888', '1454997536', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (311, NULL, 'Occupation', NULL, NULL, NULL, '1446813761', '1454997566', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (312, NULL, 'privacy policy of', NULL, NULL, NULL, '1446814106', '1446814106', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (313, NULL, 'Saved date', NULL, NULL, NULL, '1446815422', '1455016095', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (314, NULL, 'World Best Hospitality Training Provider Company', NULL, NULL, NULL, '1446815437', '1454566915', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (315, NULL, 'Get More Customer Reduce Your Operating Cost Manage Your Staff & Team', NULL, NULL, NULL, '1446815599', '1454566950', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (316, NULL, 'Be Best in Hotel Industry with our Programs', NULL, NULL, NULL, '1446815612', '1454566998', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (317, NULL, 'Please select a quantity', NULL, NULL, NULL, '1446815631', '1446815631', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (318, NULL, 'About Us', NULL, NULL, NULL, '1446817456', '1454567124', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (319, NULL, 'Advertisement', NULL, NULL, NULL, '1447827893', '1447827893', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (320, NULL, 'Upload Excel Files', NULL, NULL, NULL, '1454566563', '1455016257', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (321, NULL, 'Excel Format data', NULL, NULL, NULL, '1455016281', '1455016281', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (322, NULL, 'Main Image', NULL, NULL, NULL, '1455017105', '1455017105', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (323, NULL, 'Online', NULL, NULL, NULL, '1455017418', '1455017418', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (324, NULL, 'Reassign', NULL, NULL, NULL, '1455021872', '1455021872', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (325, NULL, 'My Ticket', NULL, NULL, NULL, '1455022024', '1455022024', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (326, NULL, 'All Ticket', NULL, NULL, NULL, '1455022057', '1455022057', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (327, NULL, 'Reply', NULL, NULL, NULL, '1455022331', '1455022331', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (328, NULL, 'Excel', NULL, NULL, NULL, '1455023384', '1455023384', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (329, NULL, 'Excel File', NULL, NULL, NULL, '1455023670', '1455023670', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (330, NULL, 'Excel data', NULL, NULL, NULL, '1455023710', '1455023710', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (331, NULL, 'Room Number', NULL, NULL, NULL, '1455023833', '1455023833', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (332, NULL, 'Price Per Day', NULL, NULL, NULL, '1455023867', '1455023867', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (333, NULL, 'Room Type', NULL, NULL, NULL, '1455023892', '1455023892', 1);
INSERT INTO static_text (`id`, `parent_id`, `name`, `type`, `order`, `image`, `created`, `modified`, `enabled`) VALUES (334, NULL, 'Staff Count', NULL, NULL, NULL, '1455024194', '1455024194', 1);


#
# TABLE STRUCTURE FOR: static_text_lang
#

DROP TABLE IF EXISTS static_text_lang;

CREATE TABLE `static_text_lang` (
  `id_static_text_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `static_text_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_static_text_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`static_text_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2075 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1, 1, 1, 'Register now', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (3, 2, 1, 'Login', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (5, 3, 1, 'Search', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (11, 6, 1, 'Product', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (13, 7, 1, 'Checkout', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (15, 8, 1, 'Category', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (17, 9, 1, 'News', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (19, 10, 1, 'Home', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (21, 11, 1, 'Pages', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (23, 12, 1, 'Sign Up', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (25, 13, 1, 'Sign in', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (27, 14, 1, 'My account', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (29, 15, 1, 'Your personal information', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (31, 16, 1, 'Name', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (33, 17, 1, 'Surname', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (35, 18, 1, 'E-mail', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (37, 19, 1, 'Your Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (39, 20, 1, 'Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (41, 21, 1, 'Confirm password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (43, 22, 1, 'Cancel', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (49, 25, 1, 'Like', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (51, 26, 1, 'Available', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (63, 32, 1, 'Cart', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (67, 34, 1, 'Information', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (71, 36, 1, 'Review', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (73, 37, 1, 'Picture', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (75, 38, 1, 'Description', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (77, 39, 1, 'Code', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (79, 40, 1, 'Quantity', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (81, 41, 1, 'Price', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (83, 42, 1, 'Unit price', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (85, 43, 1, 'Total', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (89, 45, 1, 'Profile Update', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (91, 46, 1, 'Address', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (93, 47, 1, 'Liked', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (95, 48, 1, 'Wishlist', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (97, 49, 1, 'My Order', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (99, 50, 1, 'Change Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (101, 51, 1, 'Old Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (103, 52, 1, 'hood', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (105, 53, 1, 'Action', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (107, 54, 1, 'Order Number', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (109, 55, 1, 'Message', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (111, 56, 1, 'Submit', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (113, 57, 1, 'Logout', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (115, 58, 1, 'My Cart', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (117, 59, 1, 'My Product', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (119, 60, 1, 'My Product Order', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (373, 64, 1, 'Call us now', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (375, 65, 1, 'New', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (377, 66, 1, 'Services', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (383, 69, 1, 'Bought', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (385, 70, 1, 'Latest Blogs', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (387, 71, 1, 'More', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (391, 73, 1, 'Read More', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (395, 75, 1, 'NEWSLETTER', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (397, 76, 1, 'Company info', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (399, 77, 1, 'Subscribe', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (401, 78, 1, 'No Products', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (403, 79, 1, 'Go To Cart', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (405, 80, 1, 'Dashboard', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (407, 81, 1, 'Enter your email', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (409, 82, 1, 'Phone', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (411, 83, 1, 'Date of birth', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (413, 84, 1, 'City', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (415, 85, 1, 'Country', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (417, 86, 1, 'Create an account', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (437, 96, 1, 'Customer Service', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (453, 104, 1, 'Quantity', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (463, 109, 1, 'Remove', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (465, 110, 1, 'Registered Customer', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (467, 111, 1, 'Email Address', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (469, 112, 1, 'Personal Information', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (471, 113, 1, 'User Type', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (473, 114, 1, 'Address details', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (475, 115, 1, 'Login information', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (477, 116, 1, 'Shopping Cart', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (479, 117, 1, 'Subtotal', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (481, 118, 1, 'Size', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (485, 120, 1, 'Donation', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (487, 121, 1, 'Coupon', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (489, 122, 1, 'Remark', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (499, 127, 1, 'Next', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (509, 132, 1, 'Back', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (513, 134, 1, 'Language', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (529, 142, 1, 'Logistiek', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (531, 143, 1, 'Sign Up for Our Newsletter', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (539, 147, 1, 'Forgot Password?', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (541, 148, 1, 'Gallery', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (543, 149, 1, 'Total Cost Of Shipping', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (547, 151, 1, 'Visit', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (549, 152, 1, 'Order History', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (551, 153, 1, 'Date', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (553, 154, 1, 'Coupon Amount', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (555, 155, 1, 'Send', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (557, 156, 1, 'Option', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (559, 157, 1, 'Comment', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (561, 158, 1, 'Status', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (563, 159, 1, 'Select image', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (565, 160, 1, 'Change', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (567, 4, 1, 'Update', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (569, 161, 1, 'New Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (571, 162, 1, 'General Settings', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (573, 163, 1, 'Email Settings', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (575, 164, 1, 'Language', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (577, 165, 1, 'Update Data', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (579, 166, 1, 'Product Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (581, 167, 1, 'Category', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (583, 168, 1, 'Colour Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (585, 169, 1, 'Size Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (587, 170, 1, 'Products', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (589, 171, 1, 'Order Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (591, 172, 1, 'Website', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (593, 173, 1, 'Reports', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (595, 174, 1, 'Payment History', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (597, 175, 1, 'Event Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (599, 176, 1, 'Gallery Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (601, 177, 1, 'User Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (603, 178, 1, 'User', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (605, 179, 1, 'Coupon', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (607, 180, 1, 'Content Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (609, 181, 1, 'Content', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (611, 182, 1, 'Page', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (613, 183, 1, 'Background Slider', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (617, 185, 1, 'Newsletter Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (619, 186, 1, 'Newsletter', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (621, 187, 1, 'User Subcriber', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (623, 188, 1, 'Social Network', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (625, 189, 1, 'Static Text', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (627, 184, 1, 'Partner Logo', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (629, 190, 1, 'Thank you for subscribing', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (631, 191, 1, 'You already subscribe', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (633, 192, 1, 'Event', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (637, 194, 1, 'Sort By', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (639, 195, 1, 'Low to High', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (641, 196, 1, 'High to Low', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (643, 197, 1, 'New', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (645, 198, 1, 'There is no product', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (647, 199, 1, 'Thank you for your request. We will contact you soon!', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (649, 200, 1, 'Mail can not be send dur to some server problem', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (651, 201, 1, 'Please enter a valid email-id', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (653, 202, 1, 'Please enter email-id', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (655, 203, 1, 'Your product is sucessfully added to your cart !', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (657, 204, 1, 'Product can not add to cart', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (659, 205, 1, 'NEW CUSTOMER - Create your guest account', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (661, 206, 1, 'Do you have VAT No. or fature No.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (663, 207, 1, 'Yes', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (665, 208, 1, 'No', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (669, 210, 1, 'Postcode', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (671, 211, 1, 'Profile has been successfully updated', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (673, 212, 1, 'Old Password is wrong password.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (675, 213, 1, 'Password does not match.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (677, 214, 1, 'Your Password has successfully been Updated.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (679, 215, 1, 'Thank you for order', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (681, 216, 1, 'Thank you for register!', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (683, 217, 1, 'Please verify your account by clicking the link sent to your e-mail address.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (685, 218, 1, 'Be sure to check your junk mail folder', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (687, 219, 1, 'Field required', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (689, 220, 1, 'Email must unique', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (691, 221, 1, 'Field must contain an integer.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (693, 222, 1, 'Your email ID has not verify.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (695, 223, 1, 'Your account has been deactived.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (697, 224, 1, 'Invalid user id or password.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (699, 225, 1, 'Your password has successfully sent your email ID. Please Check email.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (701, 226, 1, 'Invalid email-ID!!', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (705, 228, 1, 'There is no data.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (707, 229, 1, 'Amount', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (711, 231, 1, 'Used', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (713, 232, 1, 'Expire Date', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (715, 233, 1, 'Add New', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (717, 234, 1, 'Add', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (719, 235, 1, 'Save', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (721, 236, 1, 'Title', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (723, 237, 1, 'Users', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (725, 238, 1, 'Guests', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (733, 242, 1, 'Username', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (735, 243, 1, 'Ordered On', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (737, 244, 1, 'ID', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (739, 245, 1, 'Site Name', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (741, 246, 1, 'Site Email', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (743, 247, 1, 'Meta Title', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (745, 248, 1, 'Meta Description', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (747, 249, 1, 'Home Title', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (751, 250, 1, 'Analytic Code', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (753, 251, 1, 'Website Active', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (755, 252, 1, 'Website Offline Message', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (757, 253, 1, 'Logo', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (759, 27, 1, 'Keywords', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (761, 254, 1, 'Edit', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (763, 255, 1, 'Subject', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (765, 256, 1, 'Confirm', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (767, 257, 1, 'Create', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (769, 258, 1, 'Options', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (771, 259, 1, 'Flag', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (773, 260, 1, 'Default', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (775, 261, 1, 'Currency', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (777, 262, 1, 'Unit $ price', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (779, 263, 1, 'Image', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (781, 264, 1, 'Drag to data and then click \'Save\'', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (783, 265, 1, 'Are you sure?', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (785, 266, 1, 'Parent', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (787, 267, 1, 'Slug', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (789, 268, 1, 'Translation data', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (791, 269, 1, 'Subcategory', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (793, 270, 1, 'Section', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (795, 271, 1, 'Discount Price', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (797, 272, 1, 'Stock Quantity', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (801, 274, 1, 'Product Code', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (803, 275, 1, 'Youtube Link', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (805, 276, 1, 'Body', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (807, 277, 1, 'More Photo', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (809, 278, 1, 'Upload', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (811, 279, 1, 'Export', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (813, 280, 1, 'Add Order History', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (815, 281, 1, 'Notify', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (817, 282, 1, 'Best Sell', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (819, 283, 1, 'Token', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (821, 284, 1, 'Place', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (823, 5, 1, 'Delete', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (825, 285, 1, 'Coupon Transection History', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (829, 287, 1, 'Reduction Amount', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (831, 288, 1, 'Template', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (833, 289, 1, 'Top Menu', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (835, 290, 1, 'Bottom Menu', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (837, 291, 1, 'Position', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (839, 292, 1, 'Link', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (841, 293, 1, 'Save And Send', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (843, 294, 1, 'Setting has successfully updated.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (849, 297, 1, 'Data has successfully deleted.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (851, 295, 1, 'Data has successfully created.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (853, 296, 1, 'Data has successfully updated.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (855, 298, 1, 'Data has successfully sent.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (857, 299, 1, 'Code should be unique.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (859, 44, 1, 'Product Description', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (867, 303, 1, 'Contact us', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (875, 306, 1, 'Company Name', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (877, 307, 1, 'Street Name', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (879, 308, 1, 'House Number', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (881, 309, 1, 'I accept the privacy policy of', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (889, 312, 1, 'privacy policy', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (899, 317, 1, 'Please select a quantity.', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1227, 33, 1, 'New Customer', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1229, 74, 1, 'Follow us', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1231, 72, 1, 'Get the latest deals and special offers', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1233, 23, 1, 'Menu', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1235, 62, 1, 'Copyright © 2016', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1241, 28, 1, 'View', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1243, 319, 1, 'Advertisement', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1574, 24, 1, 'Forgot Your Password', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1894, 135, 1, 'Choose Your Hotel', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1896, 67, 1, 'Welcome', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1898, 68, 1, 'Featured Hotel', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1900, 136, 1, 'Associates Services', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1902, 137, 1, 'FEATURED SERVICES', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1904, 138, 1, 'Associated Hotels', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1906, 139, 1, 'Site Links', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1908, 140, 1, 'Subscribe Newsletter', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1910, 141, 1, 'GET IN TOUCH', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1916, 314, 1, 'World Best Hospitality Training Provider Company', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1918, 315, 1, 'Get More Customer Reduce Your Operating Cost Manage Your Staff & Team', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1920, 316, 1, 'Be Best in Hotel Industry with our Programs', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1922, 318, 1, 'About Us', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1924, 63, 1, 'Select City', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1926, 123, 1, 'Enter The Code', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1928, 124, 1, 'Can\'t read the image? click', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1930, 125, 1, 'Click here', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1932, 126, 1, 'NEW CUSTOMERS', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1936, 146, 1, 'Hotel Details', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1938, 87, 1, 'Hotel Name', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1940, 88, 1, 'Department', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1942, 89, 1, 'Start Time', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1944, 90, 1, 'End Time', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1948, 92, 1, 'Here you can manage your online business, access the', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1950, 93, 1, 'and keep up to date with all the latest news through the Partner Blog', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1952, 94, 1, 'From', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1954, 95, 1, 'To', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1956, 91, 1, 'Welcome To user', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1958, 97, 1, 'Hotel management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1960, 98, 1, 'Import Export', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1962, 99, 1, 'Booking', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1964, 35, 1, 'Reviews', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1968, 101, 1, 'Remark', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1970, 102, 1, 'Ticket Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1972, 103, 1, 'Ticket', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1974, 105, 1, 'Chat', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1976, 29, 1, 'Background Setting', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1978, 30, 1, 'Background Image', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1980, 31, 1, 'Background Video', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1982, 106, 1, 'Employee Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1984, 107, 1, 'Employee', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1986, 108, 1, 'Our Team', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1988, 128, 1, 'Hotels Analysis', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1990, 129, 1, 'Hotel List', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1992, 130, 1, 'Hotel Staff', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1994, 131, 1, 'Tag', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1996, 133, 1, 'Booking Management', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (1998, 193, 1, 'Booking History', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2000, 209, 1, 'Hotel', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2002, 239, 1, 'Today Booking', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2004, 240, 1, 'Month Booking', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2006, 241, 1, 'Year Booking', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2008, 300, 1, 'Member', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2010, 304, 1, 'Check in', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2012, 305, 1, 'Check out', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2014, 310, 1, 'Room Count', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2016, 311, 1, 'Occupation', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2018, 273, 1, 'Free', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2020, 61, 1, 'Feature', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2022, 119, 1, 'Total Room', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2024, 150, 1, 'Attachment', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2028, 302, 1, 'Anwser', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2030, 301, 1, 'Get Answer', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2032, 230, 1, 'Send', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2034, 144, 1, 'Reviews and rating summary', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2036, 145, 1, 'Latest Reviews', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2038, 227, 1, 'Room', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2040, 313, 1, 'Saved date', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2042, 320, 1, 'Upload Excel Files', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2044, 321, 1, 'Excel Format data', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2046, 286, 1, 'Download', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2048, 322, 1, 'Main Image', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2050, 323, 1, 'Online', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2052, 324, 1, 'Reassign', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2054, 325, 1, 'My Ticket', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2056, 326, 1, 'All Ticket', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2058, 327, 1, 'Reply', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2060, 328, 1, 'Excel', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2062, 329, 1, 'Excel File', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2064, 330, 1, 'Excel data', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2066, 331, 1, 'Room Number', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2068, 332, 1, 'Price Per Day', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2070, 333, 1, 'Room Type', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2072, 334, 1, 'Staff Count', NULL, NULL, NULL, NULL);
INSERT INTO static_text_lang (`id_static_text_lang`, `static_text_id`, `language_id`, `title`, `body`, `description`, `short_description`, `keywords`) VALUES (2074, 100, 1, 'User', NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: stores
#

DROP TABLE IF EXISTS stores;

CREATE TABLE `stores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `category_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `sub_category_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `department_id` text COLLATE utf8_unicode_ci,
  `category` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `logo` text COLLATE utf8_unicode_ci,
  `delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gps` text COLLATE utf8_unicode_ci,
  `distance` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `boughtcount` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `total_room` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default` tinyint(4) DEFAULT '0',
  `is_feature` tinyint(4) DEFAULT '0',
  `is_online` tinyint(4) DEFAULT '1',
  `admin_id` bigint(20) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (1, 0, 1, 1, '1', '', '2', NULL, 'gk', NULL, NULL, NULL, 'GK', 'sfs fsd', 'house.jpg', NULL, '0', 'burhanpur', '450331', 'Rome', 'Italy', '42423423', NULL, '21.3193875, 76.22242729999994', '0', '6:00', '17:00', NULL, '', '0', '9', 1, 1, 1, 1, '2016-02-02 12:12:52', '1454415172', '1455017335', 1);
INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (3, 0, 2, 3, '4', '', '1', NULL, 'gm', NULL, NULL, NULL, 'GM', 'sda sdasjsd ad\n asd as', 'aaa.jpg', NULL, '0', 'indore', '343221', 'Milan', 'Italy', '3432432', NULL, '22.7022315, 75.83511920000001', '0', '7:00', '19:00', NULL, '', '0', '10', 1, 1, 1, 1, '2016-02-03 06:45:33', '1454481933', '1454668434', 1);
INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (4, 0, 3, 4, '5', '', '1', NULL, 'hotel-garden', NULL, NULL, NULL, 'Hotel garden', 'sadas dklas', '6.jpg', NULL, '0', 'jaipur', '34242', 'Milan', 'Italy', '342432', NULL, '5.8440425, -55.216611599999965', '0', '8:00', '18:00', NULL, '', '0', NULL, 0, 1, 1, 1, '2016-02-03 06:47:11', '1454482031', '1454482191', 1);
INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (5, 0, 4, 5, '3', '', '3,1,2', NULL, 'kj-hotel', NULL, NULL, NULL, 'KJ Hotel', 'asd akldsa', '5.jpg', NULL, '0', 'indore', '3429', 'Palermo', 'Italy', '234234324', NULL, '22.7022315, 75.83511920000001', '0', '9:00', '23:00', NULL, '', '0', NULL, 0, 1, 1, 1, '2016-02-03 06:48:09', '1454482089', '1454482192', 1);
INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (6, 0, NULL, 6, '5', '', '1', '', 'gmd', NULL, NULL, NULL, 'GMD', 'asdasjdakl ad\nda d', 'banner5i.jpg', NULL, '0', 'indore city', '3432423', 'Rome', 'Italy', '24234', NULL, '53.5500, -2.4333', '0', '3:00', '18:00', NULL, '', '0', NULL, 0, 0, 1, 0, NULL, '1454574446', '1454577770', 1);
INSERT INTO stores (`id`, `parent_id`, `order`, `user_id`, `category_id`, `sub_category_id`, `department_id`, `category`, `slug`, `username`, `email`, `password`, `name`, `description`, `image`, `logo`, `delivery`, `address`, `zip`, `city`, `country`, `phone`, `phone2`, `gps`, `distance`, `start_time`, `end_time`, `type`, `video`, `boughtcount`, `total_room`, `default`, `is_feature`, `is_online`, `admin_id`, `date`, `created`, `modified`, `enabled`) VALUES (7, 0, 5, 8, '1', '', '0', NULL, 'hotel-oro-blu', NULL, NULL, NULL, 'Hotel Oro Blu', '', NULL, 'Logo_Hotel_Oro_Blu.jpg', '0', 'Piazzale Lorenzo Lotto, 14', '20148', 'Rome', 'Italy', '3313933273', NULL, '45.480459, 9.143518699999959', '0', '1:00', '1:00', NULL, '', '0', NULL, 0, 1, 1, 1, '2016-02-05 08:26:35', '1454660795', '1454661038', 1);


#
# TABLE STRUCTURE FOR: stores_booking
#

DROP TABLE IF EXISTS stores_booking;

CREATE TABLE `stores_booking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `store_id` bigint(20) DEFAULT '0',
  `room` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `on_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=732 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (1, 1, '0', '0', '2015-01-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (2, 1, '0', '0', '2015-01-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (3, 1, '0', '0', '2015-01-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (4, 1, '0', '0', '2015-01-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (5, 1, '0', '0', '2015-01-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (6, 1, '0', '0', '2015-01-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (7, 1, '0', '0', '2015-01-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (8, 1, '0', '0', '2015-01-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (9, 1, '0', '0', '2015-01-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (10, 1, '0', '0', '2015-01-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (11, 1, '0', '0', '2015-01-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (12, 1, '0', '0', '2015-01-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (13, 1, '0', '0', '2015-01-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (14, 1, '7', '531', '2015-01-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (15, 1, '14', '949', '2015-01-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (16, 1, '15', '1018', '2015-01-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (17, 1, '11', '686', '2015-01-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (18, 1, '10', '930', '2015-01-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (19, 1, '12', '772.9', '2015-01-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (20, 1, '20', '1746.5', '2015-01-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (21, 1, '15', '1397.5', '2015-01-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (22, 1, '9', '626', '2015-01-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (23, 1, '15', '985', '2015-01-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (24, 1, '6', '391', '2015-01-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (25, 1, '10', '821', '2015-01-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (26, 1, '16', '1252', '2015-01-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (27, 1, '18', '1350', '2015-01-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (28, 1, '21', '1701', '2015-01-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (29, 1, '26', '2273.44', '2015-01-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (30, 1, '26', '2713.74', '2015-01-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (31, 1, '27', '2485.94', '2015-01-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (32, 1, '13', '649', '2015-02-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (33, 1, '25', '1870', '2015-02-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (34, 1, '15', '1506', '2015-02-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (35, 1, '10', '968.14', '2015-02-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (36, 1, '11', '1002.14', '2015-02-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (37, 1, '6', '528', '2015-02-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (38, 1, '3', '245', '2015-02-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (39, 1, '9', '1052', '2015-02-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (40, 1, '17', '2104', '2015-02-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (41, 1, '19', '2427', '2015-02-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (42, 1, '8', '755', '2015-02-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (43, 1, '6', '579', '2015-02-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (44, 1, '11', '1454.78', '2015-02-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (45, 1, '13', '1675.78', '2015-02-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (46, 1, '21', '2865.78', '2015-02-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (47, 1, '20', '2670.78', '2015-02-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (48, 1, '13', '1258.88', '2015-02-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (49, 1, '11', '1104.48', '2015-02-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (50, 1, '7', '640', '2015-02-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (51, 1, '11', '897', '2015-02-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (52, 1, '4', '297', '2015-02-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (53, 1, '12', '1191', '2015-02-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (54, 1, '18', '2731', '2015-02-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (55, 1, '18', '2893.4', '2015-02-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (56, 1, '7', '1093', '2015-02-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (57, 1, '15', '2165', '2015-02-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (58, 1, '17', '2570', '2015-02-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (59, 1, '17', '2570', '2015-02-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (60, 1, '3', '203', '2015-03-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (61, 1, '2', '128', '2015-03-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (62, 1, '2', '108', '2015-03-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (63, 1, '1', '59', '2015-03-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (64, 1, '2', '128', '2015-03-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (65, 1, '3', '166', '2015-03-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (66, 1, '1', '69', '2015-03-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (67, 1, '1', '75', '2015-03-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (68, 1, '0', '0', '2015-03-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (69, 1, '0', '0', '2015-03-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (70, 1, '0', '0', '2015-03-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (71, 1, '2', '195', '2015-03-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (72, 1, '2', '182', '2015-03-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (73, 1, '12', '1971', '2015-03-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (74, 1, '14', '2344', '2015-03-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (75, 1, '17', '2917', '2015-03-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (76, 1, '17', '2937', '2015-03-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (77, 1, '9', '824', '2015-03-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (78, 1, '3', '261', '2015-03-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (79, 1, '3', '301', '2015-03-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (80, 1, '1', '103', '2015-03-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (81, 1, '2', '178', '2015-03-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (82, 1, '0', '0', '2015-03-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (83, 1, '1', '89', '2015-03-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (84, 1, '1', '89', '2015-03-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (85, 1, '1', '84', '2015-03-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (86, 1, '0', '0', '2015-03-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (87, 1, '0', '0', '2015-03-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (88, 1, '1', '75', '2015-03-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (89, 1, '4', '295', '2015-03-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (90, 1, '12', '908', '2015-03-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (91, 1, '13', '1028', '2015-04-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (92, 1, '13', '1028', '2015-04-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (93, 1, '1', '76', '2015-04-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (94, 1, '0', '0', '2015-04-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (95, 1, '3', '232.32', '2015-04-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (96, 1, '3', '260.6', '2015-04-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (97, 1, '5', '380.4', '2015-04-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (98, 1, '6', '464.4', '2015-04-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (99, 1, '10', '1034.4', '2015-04-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (100, 1, '14', '1569.6', '2015-04-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (101, 1, '21', '5250.77', '2015-04-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (102, 1, '23', '5922.13', '2015-04-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (103, 1, '23', '6301.93', '2015-04-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (104, 1, '23', '6301.93', '2015-04-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (105, 1, '23', '6301.93', '2015-04-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (106, 1, '23', '6026.53', '2015-04-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (107, 1, '12', '1107.72', '2015-04-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (108, 1, '3', '226.32', '2015-04-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (109, 1, '6', '475.52', '2015-04-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (110, 1, '1', '94', '2015-04-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (111, 1, '1', '104', '2015-04-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (112, 1, '3', '307', '2015-04-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (113, 1, '2', '198', '2015-04-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (114, 1, '2', '198', '2015-04-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (115, 1, '0', '0', '2015-04-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (116, 1, '1', '65', '2015-04-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (117, 1, '0', '0', '2015-04-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (118, 1, '0', '0', '2015-04-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (119, 1, '0', '0', '2015-04-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (120, 1, '0', '0', '2015-04-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (121, 1, '0', '0', '2015-05-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (122, 1, '2', '206', '2015-05-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (123, 1, '10', '1038', '2015-05-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (124, 1, '13', '1466', '2015-05-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (125, 1, '15', '1684', '2015-05-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (126, 1, '16', '1831', '2015-05-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (127, 1, '4', '385', '2015-05-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (128, 1, '3', '316', '2015-05-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (129, 1, '1', '75', '2015-05-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (130, 1, '4', '334.6', '2015-05-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (131, 1, '7', '664.2', '2015-05-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (132, 1, '6', '589.2', '2015-05-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (133, 1, '4', '411', '2015-05-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (134, 1, '5', '432', '2015-05-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (135, 1, '1', '98', '2015-05-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (136, 1, '0', '0', '2015-05-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (137, 1, '2', '228', '2015-05-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (138, 1, '2', '228', '2015-05-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (139, 1, '4', '388', '2015-05-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (140, 1, '7', '660', '2015-05-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (141, 1, '7', '591', '2015-05-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (142, 1, '4', '317', '2015-05-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (143, 1, '1', '125', '2015-05-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (144, 1, '1', '125', '2015-05-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (145, 1, '1', '125', '2015-05-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (146, 1, '3', '285', '2015-05-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (147, 1, '4', '649', '2015-05-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (148, 1, '11', '2927', '2015-05-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (149, 1, '1', '98', '2015-05-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (150, 1, '1', '103', '2015-05-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (151, 1, '1', '103', '2015-05-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (152, 1, '1', '103', '2015-06-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (153, 1, '0', '0', '2015-06-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (154, 1, '0', '0', '2015-06-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (155, 1, '14', '1749', '2015-06-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (156, 1, '0', '0', '2015-06-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (157, 1, '0', '0', '2015-06-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (158, 1, '0', '0', '2015-06-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (159, 1, '0', '0', '2015-06-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (160, 1, '0', '0', '2015-06-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (161, 1, '3', '429', '2015-06-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (162, 1, '0', '0', '2015-06-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (163, 1, '2', '168', '2015-06-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (164, 1, '2', '178', '2015-06-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (165, 1, '2', '178', '2015-06-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (166, 1, '0', '0', '2015-06-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (167, 1, '0', '0', '2015-06-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (168, 1, '0', '0', '2015-06-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (169, 1, '13', '1666', '2015-06-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (170, 1, '5', '460', '2015-06-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (171, 1, '0', '0', '2015-06-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (172, 1, '0', '0', '2015-06-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (173, 1, '10', '955', '2015-06-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (174, 1, '10', '854', '2015-06-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (175, 1, '10', '854', '2015-06-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (176, 1, '10', '753', '2015-06-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (177, 1, '10', '804', '2015-06-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (178, 1, '0', '0', '2015-06-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (179, 1, '0', '0', '2015-06-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (180, 1, '0', '0', '2015-06-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (181, 1, '0', '0', '2015-06-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (182, 1, '0', '0', '2015-07-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (183, 1, '6', '553', '2015-07-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (184, 1, '9', '988', '2015-07-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (185, 1, '6', '570', '2015-07-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (186, 1, '6', '603', '2015-07-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (187, 1, '6', '603', '2015-07-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (188, 1, '6', '570', '2015-07-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (189, 1, '6', '504', '2015-07-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (190, 1, '0', '0', '2015-07-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (191, 1, '0', '0', '2015-07-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (192, 1, '0', '0', '2015-07-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (193, 1, '0', '0', '2015-07-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (194, 1, '2', '368', '2015-07-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (195, 1, '0', '0', '2015-07-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (196, 1, '0', '0', '2015-07-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (197, 1, '0', '0', '2015-07-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (198, 1, '0', '0', '2015-07-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (199, 1, '0', '0', '2015-07-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (200, 1, '0', '0', '2015-07-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (201, 1, '0', '0', '2015-07-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (202, 1, '0', '0', '2015-07-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (203, 1, '0', '0', '2015-07-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (204, 1, '0', '0', '2015-07-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (205, 1, '0', '0', '2015-07-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (206, 1, '0', '0', '2015-07-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (207, 1, '0', '0', '2015-07-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (208, 1, '0', '0', '2015-07-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (209, 1, '0', '0', '2015-07-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (210, 1, '0', '0', '2015-07-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (211, 1, '0', '0', '2015-07-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (212, 1, '0', '0', '2015-07-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (213, 1, '0', '0', '2015-08-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (214, 1, '0', '0', '2015-08-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (215, 1, '0', '0', '2015-08-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (216, 1, '0', '0', '2015-08-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (217, 1, '0', '0', '2015-08-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (218, 1, '0', '0', '2015-08-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (219, 1, '0', '0', '2015-08-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (220, 1, '0', '0', '2015-08-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (221, 1, '0', '0', '2015-08-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (222, 1, '0', '0', '2015-08-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (223, 1, '0', '0', '2015-08-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (224, 1, '0', '0', '2015-08-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (225, 1, '0', '0', '2015-08-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (226, 1, '0', '0', '2015-08-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (227, 1, '0', '0', '2015-08-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (228, 1, '0', '0', '2015-08-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (229, 1, '0', '0', '2015-08-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (230, 1, '0', '0', '2015-08-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (231, 1, '0', '0', '2015-08-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (232, 1, '0', '0', '2015-08-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (233, 1, '0', '0', '2015-08-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (234, 1, '0', '0', '2015-08-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (235, 1, '0', '0', '2015-08-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (236, 1, '0', '0', '2015-08-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (237, 1, '0', '0', '2015-08-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (238, 1, '0', '0', '2015-08-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (239, 1, '0', '0', '2015-08-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (240, 1, '0', '0', '2015-08-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (241, 1, '0', '0', '2015-08-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (242, 1, '0', '0', '2015-08-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (243, 1, '0', '0', '2015-08-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (244, 1, '2', '229', '2015-09-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (245, 1, '7', '774', '2015-09-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (246, 1, '8', '883', '2015-09-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (247, 1, '9', '992', '2015-09-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (248, 1, '3', '441', '2015-09-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (249, 1, '0', '0', '2015-09-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (250, 1, '0', '0', '2015-09-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (251, 1, '0', '0', '2015-09-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (252, 1, '0', '0', '2015-09-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (253, 1, '0', '0', '2015-09-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (254, 1, '0', '0', '2015-09-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (255, 1, '0', '0', '2015-09-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (256, 1, '0', '0', '2015-09-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (257, 1, '0', '0', '2015-09-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (258, 1, '0', '0', '2015-09-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (259, 1, '1', '103', '2015-09-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (260, 1, '1', '103', '2015-09-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (261, 1, '1', '103', '2015-09-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (262, 1, '1', '98', '2015-09-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (263, 1, '1', '87', '2015-09-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (264, 1, '0', '0', '2015-09-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (265, 1, '0', '0', '2015-09-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (266, 1, '0', '0', '2015-09-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (267, 1, '0', '0', '2015-09-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (268, 1, '0', '0', '2015-09-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (269, 1, '0', '0', '2015-09-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (270, 1, '8', '720', '2015-09-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (271, 1, '8', '808', '2015-09-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (272, 1, '2', '190', '2015-09-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (273, 1, '0', '0', '2015-09-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (274, 1, '0', '0', '2015-10-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (275, 1, '1', '89', '2015-10-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (276, 1, '1', '94', '2015-10-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (277, 1, '1', '94', '2015-10-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (278, 1, '0', '0', '2015-10-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (279, 1, '0', '0', '2015-10-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (280, 1, '0', '0', '2015-10-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (281, 1, '0', '0', '2015-10-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (282, 1, '0', '0', '2015-10-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (283, 1, '0', '0', '2015-10-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (284, 1, '0', '0', '2015-10-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (285, 1, '0', '0', '2015-10-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (286, 1, '0', '0', '2015-10-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (287, 1, '0', '0', '2015-10-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (288, 1, '0', '0', '2015-10-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (289, 1, '0', '0', '2015-10-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (290, 1, '0', '0', '2015-10-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (291, 1, '0', '0', '2015-10-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (292, 1, '0', '0', '2015-10-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (293, 1, '0', '0', '2015-10-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (294, 1, '0', '0', '2015-10-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (295, 1, '0', '0', '2015-10-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (296, 1, '0', '0', '2015-10-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (297, 1, '0', '0', '2015-10-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (298, 1, '0', '0', '2015-10-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (299, 1, '0', '0', '2015-10-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (300, 1, '0', '0', '2015-10-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (301, 1, '0', '0', '2015-10-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (302, 1, '0', '0', '2015-10-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (303, 1, '0', '0', '2015-10-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (304, 1, '0', '0', '2015-10-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (305, 1, '0', '0', '2015-11-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (306, 1, '0', '0', '2015-11-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (307, 1, '0', '0', '2015-11-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (308, 1, '0', '0', '2015-11-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (309, 1, '0', '0', '2015-11-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (310, 1, '0', '0', '2015-11-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (311, 1, '0', '0', '2015-11-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (312, 1, '0', '0', '2015-11-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (313, 1, '0', '0', '2015-11-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (314, 1, '0', '0', '2015-11-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (315, 1, '0', '0', '2015-11-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (316, 1, '0', '0', '2015-11-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (317, 1, '0', '0', '2015-11-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (318, 1, '0', '0', '2015-11-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (319, 1, '0', '0', '2015-11-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (320, 1, '0', '0', '2015-11-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (321, 1, '0', '0', '2015-11-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (322, 1, '0', '0', '2015-11-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (323, 1, '0', '0', '2015-11-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (324, 1, '0', '0', '2015-11-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (325, 1, '0', '0', '2015-11-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (326, 1, '0', '0', '2015-11-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (327, 1, '0', '0', '2015-11-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (328, 1, '0', '0', '2015-11-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (329, 1, '0', '0', '2015-11-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (330, 1, '0', '0', '2015-11-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (331, 1, '0', '0', '2015-11-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (332, 1, '0', '0', '2015-11-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (333, 1, '0', '0', '2015-11-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (334, 1, '0', '0', '2015-11-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (335, 1, '0', '0', '2015-12-01', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (336, 1, '0', '0', '2015-12-02', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (337, 1, '0', '0', '2015-12-03', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (338, 1, '0', '0', '2015-12-04', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (339, 1, '0', '0', '2015-12-05', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (340, 1, '0', '0', '2015-12-06', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (341, 1, '0', '0', '2015-12-07', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (342, 1, '0', '0', '2015-12-08', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (343, 1, '0', '0', '2015-12-09', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (344, 1, '0', '0', '2015-12-10', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (345, 1, '0', '0', '2015-12-11', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (346, 1, '0', '0', '2015-12-12', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (347, 1, '0', '0', '2015-12-13', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (348, 1, '0', '0', '2015-12-14', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (349, 1, '0', '0', '2015-12-15', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (350, 1, '0', '0', '2015-12-16', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (351, 1, '0', '0', '2015-12-17', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (352, 1, '0', '0', '2015-12-18', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (353, 1, '0', '0', '2015-12-19', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (354, 1, '0', '0', '2015-12-20', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (355, 1, '0', '0', '2015-12-21', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (356, 1, '0', '0', '2015-12-22', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (357, 1, '0', '0', '2015-12-23', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (358, 1, '0', '0', '2015-12-24', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (359, 1, '0', '0', '2015-12-25', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (360, 1, '0', '0', '2015-12-26', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (361, 1, '0', '0', '2015-12-27', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (362, 1, '0', '0', '2015-12-28', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (363, 1, '0', '0', '2015-12-29', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (364, 1, '0', '0', '2015-12-30', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (365, 1, '8', '295', '2015-12-31', '2016-02-07', NULL, '1454924382', '1454924382', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (366, 1, '9', '1068.8', '2016-01-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (367, 1, '9', '1117.6', '2016-01-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (368, 1, '8', '440.97', '2016-01-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (369, 1, '9', '688.08', '2016-01-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (370, 1, '9', '719.28', '2016-01-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (371, 1, '9', '855.58', '2016-01-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (372, 1, '6', '604.2', '2016-01-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (373, 1, '8', '631.88', '2016-01-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (374, 1, '6', '443.78', '2016-01-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (375, 1, '6', '308.48', '2016-01-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (376, 1, '9', '555.48', '2016-01-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (377, 1, '9', '632', '2016-01-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (378, 1, '8', '383.8', '2016-01-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (379, 1, '8', '514', '2016-01-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (380, 1, '10', '722.1', '2016-01-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (381, 1, '8', '528.3', '2016-01-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (382, 1, '7', '407.15', '2016-01-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (383, 1, '6', '405.77', '2016-01-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (384, 1, '7', '449.77', '2016-01-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (385, 1, '5', '336.1', '2016-01-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (386, 1, '5', '370', '2016-01-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (387, 1, '8', '606.4', '2016-01-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (388, 1, '10', '769.83', '2016-01-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (389, 1, '8', '602.73', '2016-01-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (390, 1, '6', '403.28', '2016-01-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (391, 1, '8', '671.7', '2016-01-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (392, 1, '9', '668.2', '2016-01-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (393, 1, '9', '562.6799999999999', '2016-01-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (394, 1, '9', '637.9', '2016-01-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (395, 1, '9', '586.5', '2016-01-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (396, 1, '7', '485.3', '2016-01-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (397, 1, '8', '553.4', '2016-02-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (398, 1, '8', '611.3', '2016-02-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (399, 1, '7', '565.6900000000001', '2016-02-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (400, 1, '8', '680.84', '2016-02-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (401, 1, '9', '742.6', '2016-02-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (402, 1, '7', '655.17', '2016-02-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (403, 1, '7', '612.59', '2016-02-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (404, 1, '7', '536.36', '2016-02-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (405, 1, '7', '536.36', '2016-02-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (406, 1, '8', '639.4', '2016-02-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (407, 1, '5', '495', '2016-02-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (408, 1, '5', '555', '2016-02-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (409, 1, '8', '1142', '2016-02-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (410, 1, '6', '764', '2016-02-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (411, 1, '9', '872', '2016-02-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (412, 1, '7', '543.6799999999999', '2016-02-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (413, 1, '7', '496.78', '2016-02-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (414, 1, '9', '672.38', '2016-02-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (415, 1, '4', '371.1', '2016-02-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (416, 1, '6', '624.2', '2016-02-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (417, 1, '3', '238.1', '2016-02-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (418, 1, '4', '327.1', '2016-02-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (419, 1, '5', '475', '2016-02-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (420, 1, '4', '310.2', '2016-02-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (421, 1, '4', '318.1', '2016-02-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (422, 1, '9', '929.7', '2016-02-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (423, 1, '7', '803', '2016-02-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (424, 1, '4', '386', '2016-02-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (425, 1, '5', '475', '2016-02-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (426, 1, '4', '296', '2016-03-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (427, 1, '4', '296', '2016-03-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (428, 1, '3', '217', '2016-03-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (429, 1, '7', '607.3', '2016-03-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (430, 1, '7', '491.7', '2016-03-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (431, 1, '4', '339.2', '2016-03-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (432, 1, '3', '249.99', '2016-03-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (433, 1, '5', '411.77', '2016-03-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (434, 1, '4', '466', '2016-03-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (435, 1, '6', '754', '2016-03-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (436, 1, '6', '764', '2016-03-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (437, 1, '7', '793', '2016-03-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (438, 1, '5', '585', '2016-03-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (439, 1, '7', '786.6', '2016-03-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (440, 1, '5', '553.6', '2016-03-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (441, 1, '5', '498.6', '2016-03-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (442, 1, '7', '815.1', '2016-03-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (443, 1, '6', '669.2', '2016-03-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (444, 1, '6', '638.91', '2016-03-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (445, 1, '7', '595.2', '2016-03-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (446, 1, '6', '466.9', '2016-03-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (447, 1, '7', '499.39', '2016-03-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (448, 1, '7', '636.6799999999999', '2016-03-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (449, 1, '8', '837.85', '2016-03-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (450, 1, '8', '1158.38', '2016-03-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (451, 1, '6', '906.76', '2016-03-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (452, 1, '6', '746.8099999999999', '2016-03-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (453, 1, '5', '488.7', '2016-03-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (454, 1, '5', '610.9400000000001', '2016-03-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (455, 1, '4', '509.88', '2016-03-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (456, 1, '4', '419.09', '2016-03-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (457, 1, '4', '567.58', '2016-04-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (458, 1, '7', '1004.28', '2016-04-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (459, 1, '5', '599.77', '2016-04-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (460, 1, '7', '931.17', '2016-04-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (461, 1, '7', '931.17', '2016-04-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (462, 1, '6', '804.17', '2016-04-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (463, 1, '8', '1144.88', '2016-04-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (464, 1, '6', '870.98', '2016-04-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (465, 1, '7', '1028.18', '2016-04-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (466, 1, '5', '623.5700000000001', '2016-04-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (467, 1, '4', '454.57', '2016-04-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (468, 1, '3', '335.57', '2016-04-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (469, 1, '3', '357', '2016-04-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (470, 1, '2', '238', '2016-04-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (471, 1, '7', '1223', '2016-04-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (472, 1, '8', '1368.1', '2016-04-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (473, 1, '3', '343.2', '2016-04-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (474, 1, '3', '311.78', '2016-04-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (475, 1, '2', '216.58', '2016-04-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (476, 1, '3', '403.78', '2016-04-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (477, 1, '4', '647', '2016-04-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (478, 1, '6', '949.98', '2016-04-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (479, 1, '8', '1382.58', '2016-04-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (480, 1, '6', '887.1799999999999', '2016-04-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (481, 1, '5', '776.38', '2016-04-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (482, 1, '3', '487', '2016-04-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (483, 1, '2', '226.1', '2016-04-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (484, 1, '3', '354.6', '2016-04-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (485, 1, '5', '732.6', '2016-04-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (486, 1, '4', '676', '2016-04-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (487, 1, '2', '298', '2016-05-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (488, 1, '3', '437', '2016-05-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (489, 1, '2', '308', '2016-05-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (490, 1, '6', '963.58', '2016-05-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (491, 1, '5', '784.58', '2016-05-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (492, 1, '5', '862.78', '2016-05-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (493, 1, '4', '713.78', '2016-05-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (494, 1, '4', '686', '2016-05-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (495, 1, '1', '169', '2016-05-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (496, 1, '2', '304.2', '2016-05-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (497, 1, '4', '652.2', '2016-05-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (498, 1, '5', '852.2', '2016-05-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (499, 1, '7', '1200.2', '2016-05-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (500, 1, '6', '1099.2', '2016-05-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (501, 1, '4', '700.2', '2016-05-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (502, 1, '5', '768.3', '2016-05-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (503, 1, '5', '791.78', '2016-05-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (504, 1, '6', '917.1799999999999', '2016-05-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (505, 1, '6', '917.1799999999999', '2016-05-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (506, 1, '7', '1256.1', '2016-05-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (507, 1, '5', '895', '2016-05-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (508, 1, '5', '945', '2016-05-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (509, 1, '4', '626', '2016-05-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (510, 1, '4', '626', '2016-05-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (511, 1, '4', '681', '2016-05-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (512, 1, '4', '681', '2016-05-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (513, 1, '3', '517', '2016-05-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (514, 1, '4', '505.6', '2016-05-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (515, 1, '5', '742.78', '2016-05-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (516, 1, '2', '264.78', '2016-05-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (517, 1, '2', '281.18', '2016-05-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (518, 1, '2', '308', '2016-06-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (519, 1, '5', '783', '2016-06-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (520, 1, '5', '764.38', '2016-06-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (521, 1, '5', '752.58', '2016-06-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (522, 1, '4', '379.36', '2016-06-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (523, 1, '0', '0', '2016-06-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (524, 1, '3', '307.96', '2016-06-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (525, 1, '1', '105.78', '2016-06-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (526, 1, '1', '105.78', '2016-06-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (527, 1, '2', '234.78', '2016-06-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (528, 1, '5', '742.78', '2016-06-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (529, 1, '3', '488', '2016-06-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (530, 1, '3', '488', '2016-06-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (531, 1, '1', '139', '2016-06-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (532, 1, '5', '636.46', '2016-06-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (533, 1, '2', '293.1', '2016-06-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (534, 1, '1', '169', '2016-06-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (535, 1, '0', '0', '2016-06-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (536, 1, '1', '99', '2016-06-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (537, 1, '0', '0', '2016-06-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (538, 1, '0', '0', '2016-06-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (539, 1, '1', '134.1', '2016-06-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (540, 1, '1', '134.1', '2016-06-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (541, 1, '0', '0', '2016-06-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (542, 1, '1', '125.1', '2016-06-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (543, 1, '1', '89.09999999999999', '2016-06-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (544, 1, '2', '318', '2016-06-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (545, 1, '3', '452.1', '2016-06-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (546, 1, '2', '293.1', '2016-06-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (547, 1, '1', '134.1', '2016-06-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (548, 1, '0', '0', '2016-07-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (549, 1, '2', '218', '2016-07-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (550, 1, '2', '178', '2016-07-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (551, 1, '1', '89.09999999999999', '2016-07-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (552, 1, '1', '89.09999999999999', '2016-07-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (553, 1, '2', '178.2', '2016-07-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (554, 1, '1', '89.09999999999999', '2016-07-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (555, 1, '2', '188.1', '2016-07-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (556, 1, '2', '196.2', '2016-07-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (557, 1, '2', '160.2', '2016-07-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (558, 1, '2', '178.2', '2016-07-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (559, 1, '2', '178.2', '2016-07-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (560, 1, '0', '0', '2016-07-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (561, 1, '0', '0', '2016-07-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (562, 1, '1', '99', '2016-07-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (563, 1, '1', '109', '2016-07-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (564, 1, '1', '89', '2016-07-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (565, 1, '1', '99', '2016-07-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (566, 1, '0', '0', '2016-07-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (567, 1, '0', '0', '2016-07-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (568, 1, '0', '0', '2016-07-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (569, 1, '0', '0', '2016-07-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (570, 1, '1', '109', '2016-07-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (571, 1, '2', '178', '2016-07-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (572, 1, '2', '198', '2016-07-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (573, 1, '1', '99', '2016-07-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (574, 1, '2', '188.1', '2016-07-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (575, 1, '2', '188.1', '2016-07-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (576, 1, '1', '99', '2016-07-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (577, 1, '1', '109', '2016-07-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (578, 1, '1', '89', '2016-07-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (579, 1, '1', '89', '2016-08-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (580, 1, '2', '169.1', '2016-08-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (581, 1, '3', '258.48', '2016-08-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (582, 1, '3', '258.48', '2016-08-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (583, 1, '4', '339.66', '2016-08-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (584, 1, '3', '285.58', '2016-08-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (585, 1, '3', '206.98', '2016-08-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (586, 1, '2', '153.08', '2016-08-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (587, 1, '2', '161.98', '2016-08-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (588, 1, '1', '72.98', '2016-08-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (589, 1, '4', '394.62', '2016-08-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (590, 1, '3', '307', '2016-08-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (591, 1, '3', '346.1', '2016-08-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (592, 1, '2', '150.1', '2016-08-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (593, 1, '2', '169.1', '2016-08-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (594, 1, '2', '178', '2016-08-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (595, 1, '2', '178', '2016-08-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (596, 1, '1', '89', '2016-08-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (597, 1, '0', '0', '2016-08-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (598, 1, '1', '98.09999999999999', '2016-08-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (599, 1, '2', '160.2', '2016-08-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (600, 1, '2', '178.2', '2016-08-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (601, 1, '2', '178.2', '2016-08-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (602, 1, '1', '80.09999999999999', '2016-08-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (603, 1, '1', '80.09999999999999', '2016-08-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (604, 1, '1', '80.09999999999999', '2016-08-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (605, 1, '1', '98.09999999999999', '2016-08-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (606, 1, '0', '0', '2016-08-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (607, 1, '0', '0', '2016-08-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (608, 1, '2', '232.2', '2016-08-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (609, 1, '2', '232.2', '2016-08-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (610, 1, '2', '268.2', '2016-09-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (611, 1, '1', '143.1', '2016-09-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (612, 1, '1', '143.1', '2016-09-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (613, 1, '2', '264.1', '2016-09-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (614, 1, '1', '149', '2016-09-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (615, 1, '1', '149', '2016-09-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (616, 1, '1', '149', '2016-09-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (617, 1, '1', '149', '2016-09-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (618, 1, '0', '0', '2016-09-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (619, 1, '0', '0', '2016-09-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (620, 1, '1', '129', '2016-09-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (621, 1, '2', '263.1', '2016-09-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (622, 1, '2', '263.1', '2016-09-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (623, 1, '2', '263.1', '2016-09-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (624, 1, '2', '263.1', '2016-09-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (625, 1, '2', '272.1', '2016-09-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (626, 1, '1', '129', '2016-09-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (627, 1, '1', '129', '2016-09-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (628, 1, '0', '0', '2016-09-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (629, 1, '0', '0', '2016-09-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (630, 1, '0', '0', '2016-09-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (631, 1, '0', '0', '2016-09-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (632, 1, '0', '0', '2016-09-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (633, 1, '0', '0', '2016-09-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (634, 1, '0', '0', '2016-09-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (635, 1, '1', '169', '2016-09-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (636, 1, '1', '169', '2016-09-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (637, 1, '1', '169', '2016-09-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (638, 1, '1', '169', '2016-09-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (639, 1, '0', '0', '2016-09-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (640, 1, '0', '0', '2016-10-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (641, 1, '1', '143.1', '2016-10-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (642, 1, '1', '143.1', '2016-10-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (643, 1, '1', '143.1', '2016-10-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (644, 1, '0', '0', '2016-10-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (645, 1, '0', '0', '2016-10-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (646, 1, '0', '0', '2016-10-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (647, 1, '0', '0', '2016-10-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (648, 1, '0', '0', '2016-10-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (649, 1, '0', '0', '2016-10-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (650, 1, '0', '0', '2016-10-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (651, 1, '0', '0', '2016-10-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (652, 1, '0', '0', '2016-10-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (653, 1, '0', '0', '2016-10-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (654, 1, '0', '0', '2016-10-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (655, 1, '0', '0', '2016-10-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (656, 1, '0', '0', '2016-10-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (657, 1, '0', '0', '2016-10-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (658, 1, '0', '0', '2016-10-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (659, 1, '0', '0', '2016-10-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (660, 1, '0', '0', '2016-10-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (661, 1, '0', '0', '2016-10-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (662, 1, '0', '0', '2016-10-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (663, 1, '0', '0', '2016-10-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (664, 1, '0', '0', '2016-10-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (665, 1, '0', '0', '2016-10-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (666, 1, '1', '209', '2016-10-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (667, 1, '1', '179', '2016-10-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (668, 1, '1', '189', '2016-10-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (669, 1, '0', '0', '2016-10-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (670, 1, '0', '0', '2016-10-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (671, 1, '1', '89.09999999999999', '2016-11-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (672, 1, '1', '89.09999999999999', '2016-11-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (673, 1, '1', '89.09999999999999', '2016-11-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (674, 1, '0', '0', '2016-11-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (675, 1, '0', '0', '2016-11-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (676, 1, '0', '0', '2016-11-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (677, 1, '0', '0', '2016-11-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (678, 1, '0', '0', '2016-11-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (679, 1, '0', '0', '2016-11-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (680, 1, '0', '0', '2016-11-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (681, 1, '0', '0', '2016-11-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (682, 1, '0', '0', '2016-11-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (683, 1, '0', '0', '2016-11-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (684, 1, '0', '0', '2016-11-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (685, 1, '0', '0', '2016-11-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (686, 1, '0', '0', '2016-11-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (687, 1, '0', '0', '2016-11-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (688, 1, '0', '0', '2016-11-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (689, 1, '0', '0', '2016-11-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (690, 1, '0', '0', '2016-11-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (691, 1, '0', '0', '2016-11-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (692, 1, '0', '0', '2016-11-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (693, 1, '0', '0', '2016-11-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (694, 1, '0', '0', '2016-11-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (695, 1, '0', '0', '2016-11-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (696, 1, '0', '0', '2016-11-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (697, 1, '0', '0', '2016-11-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (698, 1, '0', '0', '2016-11-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (699, 1, '0', '0', '2016-11-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (700, 1, '0', '0', '2016-11-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (701, 1, '0', '0', '2016-12-01', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (702, 1, '0', '0', '2016-12-02', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (703, 1, '0', '0', '2016-12-03', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (704, 1, '0', '0', '2016-12-04', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (705, 1, '0', '0', '2016-12-05', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (706, 1, '0', '0', '2016-12-06', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (707, 1, '0', '0', '2016-12-07', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (708, 1, '0', '0', '2016-12-08', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (709, 1, '0', '0', '2016-12-09', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (710, 1, '0', '0', '2016-12-10', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (711, 1, '0', '0', '2016-12-11', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (712, 1, '0', '0', '2016-12-12', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (713, 1, '0', '0', '2016-12-13', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (714, 1, '0', '0', '2016-12-14', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (715, 1, '0', '0', '2016-12-15', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (716, 1, '0', '0', '2016-12-16', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (717, 1, '1', '129', '2016-12-17', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (718, 1, '1', '129', '2016-12-18', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (719, 1, '0', '0', '2016-12-19', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (720, 1, '0', '0', '2016-12-20', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (721, 1, '0', '0', '2016-12-21', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (722, 1, '0', '0', '2016-12-22', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (723, 1, '0', '0', '2016-12-23', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (724, 1, '0', '0', '2016-12-24', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (725, 1, '0', '0', '2016-12-25', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (726, 1, '0', '0', '2016-12-26', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (727, 1, '0', '0', '2016-12-27', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (728, 1, '0', '0', '2016-12-28', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (729, 1, '0', '0', '2016-12-29', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (730, 1, '1', '119', '2016-12-30', '2016-02-08', NULL, '1454924548', '1454924548', 1);
INSERT INTO stores_booking (`id`, `store_id`, `room`, `price`, `on_date`, `date`, `date_publish`, `created`, `modified`, `enabled`) VALUES (731, 1, '3', '397', '2016-12-31', '2016-02-08', NULL, '1454924548', '1454924548', 1);


#
# TABLE STRUCTURE FOR: stores_category
#

DROP TABLE IF EXISTS stores_category;

CREATE TABLE `stores_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: stores_category_lang
#

DROP TABLE IF EXISTS stores_category_lang;

CREATE TABLE `stores_category_lang` (
  `id_category_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_category_lang`),
  KEY `fk_page_language1` (`language_id`),
  KEY `fk_page_lang_page1` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: stores_files
#

DROP TABLE IF EXISTS stores_files;

CREATE TABLE `stores_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slide_lang` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `store_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO stores_files (`id`, `slide_lang`, `order`, `filename`, `filetype`, `link`, `description`, `store_id`, `created`, `modified`) VALUES (1, NULL, NULL, 'Apple.jpg', NULL, NULL, NULL, 1, '1450108877', '1450108877');
INSERT INTO stores_files (`id`, `slide_lang`, `order`, `filename`, `filetype`, `link`, `description`, `store_id`, `created`, `modified`) VALUES (2, NULL, NULL, '5.jpg', NULL, NULL, NULL, 1, '1454773549', '1454773549');
INSERT INTO stores_files (`id`, `slide_lang`, `order`, `filename`, `filetype`, `link`, `description`, `store_id`, `created`, `modified`) VALUES (3, NULL, NULL, 'ccc.jpg', NULL, NULL, NULL, 1, '1454773549', '1454773549');
INSERT INTO stores_files (`id`, `slide_lang`, `order`, `filename`, `filetype`, `link`, `description`, `store_id`, `created`, `modified`) VALUES (4, NULL, NULL, 'ggg.jpg', NULL, NULL, NULL, 1, '1454773549', '1454773549');


#
# TABLE STRUCTURE FOR: stores_manage
#

DROP TABLE IF EXISTS stores_manage;

CREATE TABLE `stores_manage` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `store_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `tag_id` text COLLATE utf8_unicode_ci,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `default` tinyint(4) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO stores_manage (`id`, `parent_id`, `order`, `store_id`, `user_id`, `tag_id`, `name`, `room`, `price`, `description`, `default`, `date`, `created`, `modified`, `enabled`) VALUES (1, 0, NULL, 1, 0, '1,2', NULL, '102', '140', 'asdad a', 0, NULL, '1454491372', '1454491372', 1);
INSERT INTO stores_manage (`id`, `parent_id`, `order`, `store_id`, `user_id`, `tag_id`, `name`, `room`, `price`, `description`, `default`, `date`, `created`, `modified`, `enabled`) VALUES (2, 0, NULL, 1, 0, '1', NULL, '10', '120', 'asda', 0, NULL, '1454491506', '1454491506', 1);
INSERT INTO stores_manage (`id`, `parent_id`, `order`, `store_id`, `user_id`, `tag_id`, `name`, `room`, `price`, `description`, `default`, `date`, `created`, `modified`, `enabled`) VALUES (3, 0, NULL, 1, 0, '1', NULL, '104', '200', 'room is having TV only', 0, NULL, '1454592408', '1454592408', 1);
INSERT INTO stores_manage (`id`, `parent_id`, `order`, `store_id`, `user_id`, `tag_id`, `name`, `room`, `price`, `description`, `default`, `date`, `created`, `modified`, `enabled`) VALUES (4, 0, NULL, 1, 0, '2', NULL, '121', '12', 'asda dasl', 1, NULL, '1454598650', '1454598650', 1);


#
# TABLE STRUCTURE FOR: stores_rating
#

DROP TABLE IF EXISTS stores_rating;

CREATE TABLE `stores_rating` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT NULL,
  `store_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT '0',
  `rate` int(11) DEFAULT NULL,
  `quality_rate` int(11) DEFAULT NULL,
  `delivery_rate` int(11) DEFAULT NULL,
  `service_rate` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `comment` text,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `enabled` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: stores_review
#

DROP TABLE IF EXISTS stores_review;

CREATE TABLE `stores_review` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `read` tinyint(4) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `store_id` bigint(20) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: tags
#

DROP TABLE IF EXISTS tags;

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `menu_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tags (`id`, `parent_id`, `order`, `menu_location`, `image`, `type`, `date`, `slug`, `route_id`, `created`, `modified`, `enabled`) VALUES (1, 0, 1, NULL, NULL, NULL, '2016-02-03 08:27:39', NULL, NULL, '1454488059', '1454488059', 1);
INSERT INTO tags (`id`, `parent_id`, `order`, `menu_location`, `image`, `type`, `date`, `slug`, `route_id`, `created`, `modified`, `enabled`) VALUES (2, 0, 2, NULL, NULL, NULL, '2016-02-03 08:27:55', NULL, NULL, '1454488075', '1454488075', 1);


#
# TABLE STRUCTURE FOR: tags_lang
#

DROP TABLE IF EXISTS tags_lang;

CREATE TABLE `tags_lang` (
  `id_tag_lang` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_tag_lang`),
  KEY `fk_tag_language1` (`language_id`),
  KEY `fk_tag_lang_page1` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tags_lang (`id_tag_lang`, `tag_id`, `language_id`, `title`, `body`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (1, 1, 1, 'Ac Room', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO tags_lang (`id_tag_lang`, `tag_id`, `language_id`, `title`, `body`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (2, 1, 2, 'Ac Room', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO tags_lang (`id_tag_lang`, `tag_id`, `language_id`, `title`, `body`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (3, 2, 1, 'Non Ac Room', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO tags_lang (`id_tag_lang`, `tag_id`, `language_id`, `title`, `body`, `short_description`, `keywords`, `created`, `modified`, `enabled`) VALUES (4, 2, 2, 'Non Ac Room', NULL, NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: theme_settings
#

DROP TABLE IF EXISTS theme_settings;

CREATE TABLE `theme_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `font` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO theme_settings (`id`, `type`, `color`, `font`, `size`, `background`, `created`, `modified`, `enabled`) VALUES (1, 'main', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO theme_settings (`id`, `type`, `color`, `font`, `size`, `background`, `created`, `modified`, `enabled`) VALUES (2, 'footer', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO theme_settings (`id`, `type`, `color`, `font`, `size`, `background`, `created`, `modified`, `enabled`) VALUES (3, 'menu', NULL, NULL, NULL, NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: tickets
#

DROP TABLE IF EXISTS tickets;

CREATE TABLE `tickets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `parent_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `admin_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `desc2` text COLLATE utf8_unicode_ci,
  `solve_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_private` tinyint(4) DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tickets (`id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `desc2`, `solve_time`, `files`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created`, `modified`, `status`, `enabled`) VALUES (1, 0, 0, 0, 0, NULL, 'My item has not been delivered', 'My item has not been delivered', 'My item has not been delivered guide content', '10', NULL, NULL, NULL, NULL, NULL, 0, '1456925013', '1457521840', '1', 1);
INSERT INTO tickets (`id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `desc2`, `solve_time`, `files`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created`, `modified`, `status`, `enabled`) VALUES (2, 0, 0, 0, 0, NULL, 'I need to check an items stock level', 'I need to check an items stock level', 'I need to check an items stock level content', '3', NULL, NULL, NULL, NULL, NULL, 0, '1456925033', '1457521854', '1', 1);
INSERT INTO tickets (`id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `desc2`, `solve_time`, `files`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created`, `modified`, `status`, `enabled`) VALUES (3, 0, 0, 0, 0, NULL, 'I need a tracking code for an item', 'I need a tracking code for an item', 'I need a tracking code for an item 232 ', '5', NULL, NULL, NULL, NULL, NULL, 0, '1456925052', '1457521864', '1', 1);
INSERT INTO tickets (`id`, `user_id`, `parent_id`, `category_id`, `admin_id`, `order`, `name`, `desc`, `desc2`, `solve_time`, `files`, `type`, `date`, `date_publish`, `slug`, `is_private`, `created`, `modified`, `status`, `enabled`) VALUES (4, 0, 0, 0, 0, NULL, 'Need to send a Goods In File', 'Test 1', 'Please upload your formated xls file with all the relevent information.\n\nName :\n\nAddress :\n\nCountry:', '24', NULL, NULL, NULL, NULL, NULL, 0, '1457512355', '1457530552', '1', 1);


#
# TABLE STRUCTURE FOR: tickets_answer
#

DROP TABLE IF EXISTS tickets_answer;

CREATE TABLE `tickets_answer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `ticket_id` bigint(20) DEFAULT '0',
  `desc` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'user',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: tickets_category
#

DROP TABLE IF EXISTS tickets_category;

CREATE TABLE `tickets_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_contact
#

DROP TABLE IF EXISTS user_contact;

CREATE TABLE `user_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_history
#

DROP TABLE IF EXISTS user_history;

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `product_id` bigint(20) DEFAULT '0',
  `order_id` bigint(20) DEFAULT '0',
  `subscribe_type` varchar(255) DEFAULT NULL,
  `subscribe_status` varchar(255) DEFAULT '',
  `user_email` varchar(255) DEFAULT '',
  `token` varchar(255) DEFAULT '',
  `PayerID` varchar(255) DEFAULT '',
  `currencyCodeType` varchar(255) DEFAULT '',
  `credits` double DEFAULT NULL,
  `amt` varchar(255) DEFAULT NULL,
  `payment_record1` longtext,
  `payment_record2` longtext,
  `payment_type` varchar(255) DEFAULT NULL,
  `subscribe_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: user_news
#

DROP TABLE IF EXISTS user_news;

CREATE TABLE `user_news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `news_id` bigint(20) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: user_online
#

DROP TABLE IF EXISTS user_online;

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `last_active_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `modified` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (1, 4, NULL, NULL, 'user', 1, '2016-03-04 17:36:36', NULL, NULL);
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (2, 1, NULL, NULL, 'user', 1, '2016-03-12 11:24:52', NULL, NULL);
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (3, 0, 'admin', 'admin', 'admin', 0, '2016-05-20 11:54:54', '1463741694', '1457016862');
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (4, 7, NULL, NULL, 'user', 1, '2016-03-11 13:53:16', NULL, NULL);
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (5, 9, NULL, NULL, 'user', 1, '2016-03-09 15:50:21', NULL, NULL);
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (6, 10, NULL, NULL, 'user', 1, '2016-03-10 17:44:50', NULL, NULL);
INSERT INTO user_online (`id`, `user_id`, `user_name`, `email`, `user_type`, `status`, `last_active_time`, `created`, `modified`) VALUES (7, 2, NULL, NULL, 'user', 1, '2016-03-12 13:45:35', NULL, NULL);


#
# TABLE STRUCTURE FOR: user_order_history
#

DROP TABLE IF EXISTS user_order_history;

CREATE TABLE `user_order_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT 'Pending',
  `order_status_id` int(5) DEFAULT NULL,
  `notify` tinyint(1) DEFAULT '0',
  `comment` text,
  `user_id` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: user_order_item_coupons
#

DROP TABLE IF EXISTS user_order_item_coupons;

CREATE TABLE `user_order_item_coupons` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read` tinyint(4) DEFAULT '0',
  `item_id` bigint(20) DEFAULT '0',
  `order_id` bigint(20) DEFAULT '0',
  `product_id` bigint(20) DEFAULT '0',
  `ownner_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `complete_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complete_id` bigint(20) DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'pending',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_order_items
#

DROP TABLE IF EXISTS user_order_items;

CREATE TABLE `user_order_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `read` tinyint(4) DEFAULT '0',
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) DEFAULT '0',
  `product_id` bigint(20) DEFAULT '0',
  `ownner_id` bigint(20) DEFAULT '0',
  `store_id` bigint(20) DEFAULT '0',
  `color_id` bigint(20) DEFAULT '0',
  `size_id` bigint(20) DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `credits_point` double DEFAULT '0',
  `order_content` text COLLATE utf8_unicode_ci,
  `payment_content` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'pending',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_order_shipping_add
#

DROP TABLE IF EXISTS user_order_shipping_add;

CREATE TABLE `user_order_shipping_add` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `address1` text COLLATE utf8_unicode_ci,
  `address2` text COLLATE utf8_unicode_ci,
  `city` text COLLATE utf8_unicode_ci,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_house_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_orders
#

DROP TABLE IF EXISTS user_orders;

CREATE TABLE `user_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tracking_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` bigint(20) DEFAULT '0',
  `order_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `store_id` bigint(20) DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `tax` bigint(20) DEFAULT '0',
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `coupon_cost` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `donation_cost` double DEFAULT '0',
  `credits_point` double DEFAULT '0',
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_on` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT '0',
  `read` tinyint(4) DEFAULT '0',
  `admin_read` tinyint(4) DEFAULT '0',
  `created` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: user_product
#

DROP TABLE IF EXISTS user_product;

CREATE TABLE `user_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `product_id` bigint(20) DEFAULT '0',
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) DEFAULT '0',
  `parent_id` bigint(20) DEFAULT '0',
  `account_type` varchar(255) DEFAULT 'B',
  `department_id` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `credits_point` double DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` tinytext,
  `address2` text,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'free',
  `created_by` varchar(255) DEFAULT 'user',
  `admin_confirm` tinyint(4) DEFAULT '1',
  `confirm` varchar(255) DEFAULT NULL,
  `enabled` tinyint(255) DEFAULT '1',
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO users (`id`, `admin_id`, `parent_id`, `account_type`, `department_id`, `gender`, `company_name`, `credits_point`, `first_name`, `last_name`, `username`, `email`, `password`, `image`, `logo`, `dob`, `address`, `address2`, `street`, `city`, `state`, `country`, `zip`, `phone`, `phone2`, `mobile`, `website`, `user_type`, `created_by`, `admin_confirm`, `confirm`, `enabled`, `created`, `modified`, `status`, `date_added`) VALUES (1, 1, 0, 'C', NULL, NULL, 'Plants From Seed Ltd', '0', 'John', 'Watkins', NULL, 'info@plantsfromseed.co.uk', '5187rUBY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '07939055114', NULL, NULL, 'www.plantsfromseed.co.uk', 'free', 'admin', 1, 'confirm', 1, '1457697340', '1457697340', 1, '2016-03-11 11:55:40');
INSERT INTO users (`id`, `admin_id`, `parent_id`, `account_type`, `department_id`, `gender`, `company_name`, `credits_point`, `first_name`, `last_name`, `username`, `email`, `password`, `image`, `logo`, `dob`, `address`, `address2`, `street`, `city`, `state`, `country`, `zip`, `phone`, `phone2`, `mobile`, `website`, `user_type`, `created_by`, `admin_confirm`, `confirm`, `enabled`, `created`, `modified`, `status`, `date_added`) VALUES (2, 1, 1, 'U', NULL, NULL, NULL, '0', 'Lisa', 'Watkins', NULL, 'lisa@plantsfromseed.co.uk', '5187rUBY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'free', 'admin', 1, 'confirm', 1, '1457697373', '1457697373', 1, '2016-03-11 11:56:13');


#
# TABLE STRUCTURE FOR: users_chat
#

DROP TABLE IF EXISTS users_chat;

CREATE TABLE `users_chat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `from_name` varchar(255) DEFAULT NULL,
  `to` varchar(255) NOT NULL DEFAULT '',
  `to_name` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: visitor_activity
#

DROP TABLE IF EXISTS visitor_activity;

CREATE TABLE `visitor_activity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data` text,
  `country` varchar(255) DEFAULT NULL,
  `on_date` date DEFAULT NULL,
  `visit_date` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


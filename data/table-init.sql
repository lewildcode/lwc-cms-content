CREATE TABLE `cms_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` varchar(30) NOT NULL,
  `visible` tinyint(1) unsigned DEFAULT '1',
  `weight` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `row_id` (`row_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `cms_content_ibfk_1` FOREIGN KEY (`row_id`) REFERENCES `cms_row` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_row_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `row_id` int(11) unsigned DEFAULT NULL,
  `content_id` int(11) unsigned DEFAULT NULL,
  `position` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `row_id` (`row_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_row_content_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cms_row_content_ibfk_1` FOREIGN KEY (`row_id`) REFERENCES `cms_row` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_content_lwc_article` (
  `lwc_article_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `header_text` varchar(100) DEFAULT NULL,
  `header_weight` tinyint(1) NOT NULL DEFAULT '3',
  `header_byline` varchar(255) DEFAULT NULL,
  `header_link` varchar(100) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_link` varchar(100) DEFAULT NULL,
  `image_classes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lwc_article_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_content_lwc_article_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_content_lwc_bodycopy` (
  `lwc_bodycopy_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `bodycopy` text,
  PRIMARY KEY (`lwc_bodycopy_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_content_lwc_bodycopy_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_content_lwc_section` (
  `lwc_section_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `header_text` varchar(100) DEFAULT NULL,
  `header_weight` tinyint(1) NOT NULL DEFAULT '3',
  `header_byline` varchar(255) DEFAULT NULL,
  `header_link` varchar(100) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_link` varchar(100) DEFAULT NULL,
  `image_classes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lwc_section_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_content_lwc_section_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_content_lwc_definitionlist` (
  `lwc_definitionlist_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `dl_class` varchar(50) DEFAULT NULL,
  `definitions` text,
  PRIMARY KEY (`lwc_definitionlist_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_content_lwc_definitionlist_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cms_content_lwc_htmllist` (
  `lwc_bodycopy_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `ordered` tinyint(1) DEFAULT '0',
  `list_class` varchar(50) DEFAULT NULL,
  `items` text,
  PRIMARY KEY (`lwc_bodycopy_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `cms_content_lwc_htmllist_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
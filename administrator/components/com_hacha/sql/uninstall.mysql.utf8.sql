DROP TABLE IF EXISTS `#__menu_category`;
DROP TABLE IF EXISTS `#__menu_item`;
DROP TABLE IF EXISTS `#__news_newsgalery`;
DROP TABLE IF EXISTS `#__news_news`;
DROP TABLE IF EXISTS `#__news_news_tags`;
DROP TABLE IF EXISTS `#__news_newstag`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_hacha.%');
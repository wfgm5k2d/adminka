<?php
require $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

require SITE_TEMPLATE_PATH . '/error/ACErrors.php';

require SITE_TEMPLATE_PATH_CORE . 'ACConnect.php';
require SITE_TEMPLATE_PATH_CORE . 'ACRouter.php';
//require SITE_TEMPLATE_PATH_CORE . 'ACStatistic.php';

require SITE_TEMPLATE_PATH_CLASS . "function.php";
require SITE_TEMPLATE_PATH_CLASS . "Page.php";
require SITE_TEMPLATE_PATH_CLASS . "Lists.php";
require SITE_TEMPLATE_PATH_CLASS . "Menu.php";
require SITE_TEMPLATE_PATH_CLASS . "Blocks.php";
require SITE_TEMPLATE_PATH_CLASS . "Modules.php";
require SITE_TEMPLATE_PATH_CLASS . "Reviews.php";
require SITE_TEMPLATE_PATH_CLASS . "Catalog.php";
require SITE_TEMPLATE_PATH_CLASS . "Item.php";
require SITE_TEMPLATE_PATH_CLASS . "Message.php";
require SITE_TEMPLATE_PATH_CLASS . "Option.php";

$url = ACRouter::getUrl();

$cat = ACCatalog::addParent('Работай сука');
print_r($cat);
<?php
require 'admin/core/init.php';

require SITE_TEMPLATE_PATH_CORE . 'ACRouter.php';
require SITE_TEMPLATE_PATH_CORE . 'ACConnect.php';
require SITE_TEMPLATE_PATH_CORE . 'ACStatistic.php';

require SITE_TEMPLATE_PATH_CLASS . 'ACErrors.php';
require SITE_TEMPLATE_PATH_CLASS . "function.php";
require SITE_TEMPLATE_PATH_CLASS . "ACCatalog.php";
require SITE_TEMPLATE_PATH_CLASS . "ACPage.php";
require SITE_TEMPLATE_PATH_CLASS . "ACLists.php";
require SITE_TEMPLATE_PATH_CLASS . "ACMenu.php";
require SITE_TEMPLATE_PATH_CLASS . "ACBlocks.php";
require SITE_TEMPLATE_PATH_CLASS . "ACModules.php";
require SITE_TEMPLATE_PATH_CLASS . "ACReviews.php";
require SITE_TEMPLATE_PATH_CLASS . "ACItem.php";
require SITE_TEMPLATE_PATH_CLASS . "ACMessage.php";
require SITE_TEMPLATE_PATH_CLASS . "ACOption.php";

$url = ACRouter::parceUrl();

include "template/header.php";
ACRouter::url();
include "template/footer.php";
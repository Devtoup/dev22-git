<?php

$menuActive = "Search";
$menuDetail = "detail";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js' . $lastModify . '"></script>';

$contactPage = new contactPage;

require_once _DIR . '/front/controller/script/' . $menuActive . '/service/contact.php';


$urlfull = _FullUrl;
$smarty->assign("urlfull", $urlfull);
$smarty->assign("menuActive", $menuActive);
$smarty->assign("menuDetail", $menuDetail);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("settingModulus", $settingModulus);
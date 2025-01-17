<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";



$sql = "SELECT   ";
if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "   " . $mod_tb_root . "_id , " . $mod_tb_root . "_htmlfilename, " . $mod_tb_root . "_credate , " . $mod_tb_root . "_crebyid, " . $mod_tb_root . "_status,    " . $mod_tb_root . "_sdate  	 	 ,    " . $mod_tb_root . "_edate  	, " . $mod_tb_root . "_lastdate, " . $mod_tb_root . "_subject , " . $mod_tb_root . "_lastbyid,    " . $mod_tb_root . "_title,    " . $mod_tb_root . "_pic , " . $mod_tb_root . "_type , " . $mod_tb_root . "_filevdo , " . $mod_tb_root . "_url  ,    " . $mod_tb_root . "_metatitle  	 	 ,    " . $mod_tb_root . "_description  	 	 ,    " . $mod_tb_root . "_keywords , " . $mod_tb_root . "_address    ";
} else {
    $sql .= "  " . $mod_tb_root . "_id , " . $mod_tb_root . "_htmlfilenameen, " . $mod_tb_root . "_credate , " . $mod_tb_root . "_crebyid, " . $mod_tb_root . "_status,    " . $mod_tb_root . "_sdate  	 	 ,    " . $mod_tb_root . "_edate  	, " . $mod_tb_root . "_lastdate, " . $mod_tb_root . "_subjecten , " . $mod_tb_root . "_lastbyid ,    " . $mod_tb_root . "_titleen,    " . $mod_tb_root . "_pic , " . $mod_tb_root . "_type , " . $mod_tb_root . "_filevdo , " . $mod_tb_root . "_url 	 ,    " . $mod_tb_root . "_metatitleen  	 	 ,    " . $mod_tb_root . "_descriptionen  	 	 ,    " . $mod_tb_root . "_keywordsen , " . $mod_tb_root . "_addressen ";
}

$sql .= "  ,
			" . $mod_tb_root . "_typeSal ,
			" . $mod_tb_root . "_typeDateTo,
			" . $mod_tb_root . "_typeTimeTo,
			" . $mod_tb_root . "_fromHH,
			" . $mod_tb_root . "_quantity,
			" . $mod_tb_root . "_fromMM,
			" . $mod_tb_root . "_toHH,
			" . $mod_tb_root . "_toMM,
			" . $mod_tb_root . "_price,
			" . $mod_tb_root . "_sale,
			" . $mod_tb_root . "_eat,
			" . $mod_tb_root . "_walk,
			" . $mod_tb_root . "_map,
			" . $mod_tb_root . "_showicon,
			" . $mod_tb_root . "_gid,
			" . $mod_tb_root . "_person,
			" . $mod_tb_root . "_hotelname ,
			" . $mod_tb_root . "_resdate ,
			" . $mod_tb_root . "_reedate,
			" . $mod_tb_root . "_dwswitch
			";
$sql .= " , " . $mod_tb_root . "_tid as tid ";
$sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valHtml = $mod_path_html . "/" . $Row[1];
$valCredate = DateFormat($Row[2]);
$valCreby = $Row[3];
$valStatus = $Row[4];
if ($valStatus == "Enable") {
    $valStatusClass = "fontContantTbEnable";
} else {
    $valStatusClass = "fontContantTbDisable";
}

if ($Row[5] == "0000-00-00 00:00:00") {
    $valSdate = "-";
} else {
    $valSdate = DateFormatReal($Row[5]);
}
if ($Row[6] == "0000-00-00 00:00:00") {
    $valEdate = "-";
} else {
    $valEdate = DateFormatReal($Row[6]);
}

$valLastdate = DateFormat($Row[7]);
$valSubject = rechangeQuot($Row[8]);
$valLastby = $Row[9];

$valTitle = rechangeQuot($Row[10]);
$valPicName = $Row[11];
$valPic = $mod_path_pictures . "/" . $Row[11];
$valType = $Row[12];
$valFilevdo = $Row[13];
$valPathvdo = $mod_path_vdo . "/" . $Row[13];
$valUrl = rechangeQuot($Row[14]);
$valMetatitle = rechangeQuot($Row[15]);
$valDescription = rechangeQuot($Row[16]);
$valKeywords = rechangeQuot($Row[17]);

$valAddress = rechangeQuot($Row[18]);
$valTypeSal = $Row[19];
$valTypeDateTo = $Row[20];
$valTypeTimeTo = $Row[21];
$valFromHH = $Row[22];
$valQuantity = $Row[23];
$valFromMM = $Row[24];
$valToHH = $Row[25];
$valToMM = $Row[26];
$valPrice = $Row[27];
$valSale = $Row[28];
$valEat = rechangeQuot($Row[29]);
$valWalk = rechangeQuot($Row[30]);

$valMapName = $Row[31];
$valMap = $mod_path_pictures . "/" . $Row[31];
$valIcon = rechangeQuot($Row[32]);
$valGid = $Row[33];
$valPerson = rechangeQuot($Row[34]);
$valHotelname = rechangeQuot($Row[35]);

if ($Row[36] == "0000-00-00 00:00:00") {
    $valReSdate = "-";
} else {
    $valReSdate = DateFormatReal($Row[36]);
}
if ($Row[37] == "0000-00-00 00:00:00") {
    $valReEdate = "-";
} else {
    $valReEdate = DateFormatReal($Row[37]);
}
$valDwswitch = $Row[38];
$valTag = unserialize($Row['tid']);

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
        <input name="sdateInputSe" type="hidden" id="sdateInputSe" value="<?php echo  $_REQUEST['sdateInputSe'] ?>" />
        <input name="edateInputSe" type="hidden" id="edateInputSe" value="<?php echo  $_REQUEST['edateInputSe'] ?>" />

        <?php if ($_REQUEST['viewID'] <= 0) { ?>
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo  getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  $langMod["txt:titleview"] ?> <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                        <td class="divRightNavTb" align="right">



                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleview"] ?> <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                        <?php if ($valPermission == "RW") { ?>
                                            <div class="btnEditView" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                                                    document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                                    editContactNew('../<?php echo  $mod_fd_root ?>/editContant.php')"></div>
                                        <?php } ?>
                                        <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:subject"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["viw:subjectDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:selectgn"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql_group = "SELECT ";
                            if ($_REQUEST['inputLt'] == "Thai") {
                                $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
                            } else if ($_REQUEST['inputLt'] == "Eng") {
                                $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjecten";
                            } else {
                                $sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjectcn ";
                            }

                            $sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_id='" . $valGid . "'  ORDER BY " . $mod_tb_root_group . "_order DESC ";
                            $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                            $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                            $row_groupid = $row_group[0];
                            echo $row_groupname = $row_group[1];
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valSubject ?></div>
                    </td>
                </tr>
                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valTitle ?></div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:date"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:dateDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valSdate ?> <?php if ($valTypeDateTo == 1) { ?>- <?php echo  $valEdate ?><?php } ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:salary"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"> <?php if ($valTypeSal == 2) { ?><?php echo $valFromHH ?>:<?php echo $valFromMM ?> <?php if ($valTypeTimeTo == 1) { ?>- <?php echo $valToHH ?>:<?php echo $valToMM ?><?php } ?> <?php echo $langMod["tit:at"] ?><?php } else { ?><?php echo  $modTxtSalary[$valTypeSal] ?><?php } ?> </div>
                    </td>
                </tr>



                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:work"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valAddress ?></div>
                    </td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:hotelname"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valHotelname ?></div>
                    </td>
                </tr>
            </table>

            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <img src="<?php echo  $valPic ?>" style="float:left;border:#c8c7cc solid 1px;" onerror="this.src='<?php echo  "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["tit:hashtag"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["tit:hashtagDes"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:hashtag"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql_group = "SELECT ";
                            if ($_REQUEST['inputLt'] == "Thai") {
                                $sql_group .= "  " . $mod_tb_tag . "_id," . $mod_tb_tag . "_subject";
                            } else if ($_REQUEST['inputLt'] == "Eng") {
                                $sql_group .= "  " . $mod_tb_tag . "_id," . $mod_tb_tag . "_subjecten";
                            } else {
                                $sql_group .= " " . $mod_tb_tag . "_id," . $mod_tb_tag . "_subjectcn ";
                            }

                            $sql_group .= "  FROM " . $mod_tb_tag . " WHERE  " . $mod_tb_tag . "_masterkey='" . $masterkey_tag . "' AND " . $mod_tb_tag . "_status != 'Disable'  ORDER BY " . $mod_tb_tag . "_order DESC ";
                            $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                            if (!empty($valTag)) {
                                echo "<ul class='item-list'>";
                                while ($row_mem = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                                    $row_memid = $row_mem[0];
                                    $row_memname = $row_mem[1];
                                    foreach ($valTag as $keyvalTag => $valvalTag) {
                                        if ($valvalTag == $row_memid) {
                                            // echo "<div class='hashtag' >".$row_memname . "</div>";
                                            echo "<li class='hashtag'><a class='link'>#" . $row_memname . "</a></li>";
                                        }
                                    }
                                }
                                echo "</ul>";
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>

            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:titleDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="left" valign="top" class="formTileTxt">
                        <div class="viewEditorTileTxt">
                            <?php
                            $fd = @fopen($valHtml, "r");
                            $contents = @fread($fd, filesize($valHtml));
                            @fclose($fd);
                            echo txtReplaceHTML($contents);
                            ?>
                        </div>
                    </td>
                </tr>
                <?php if ($_REQUEST['viewID'] <= 0) { ?>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:album"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:albumDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $_REQUEST['valEditID'] . "'  AND   " . $mod_tb_root_album . "_language ='" . $_REQUEST['inputLt'] . "'   ORDER BY " . $mod_tb_root_album . "_id ASC";
                            $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
                            $number_filetemp = wewebNumRowsDB($coreLanguageSQL, $query_filetemp);
                            if ($number_filetemp >= 1) {
                                $valAlbum = "";
                                while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL, $query_filetemp)) {
                                    $linkRelativePath = $mod_path_album . "/" . $row_filetemp[1];
                                    $downloadFile = $row_filetemp[1];
                                    $downloadID = $row_filetemp[0];
                                    $downloadName = $row_filetemp[2];
                                    $countDownload = $row_filetemp[3];
                                    $imageType = strstr($downloadFile, '.');
                            ?>

                                    <a rel="viewAlbum" title="" href="<?php echo  $mod_path_album . "/reB_" . $downloadFile ?>">
                                        <img src="<?php echo  $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" /></a>

                                <?php }
                            } else { ?>
                                -
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:video"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:videoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:video"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($valType == "file") {
                                if ($valFilevdo != "") {
                                    $filename = $valFilevdo;
                                    $arrstrfile = explode(".", $valFilevdo);
                                    $filetype = strtolower($arrstrfile[sizeof($arrstrfile) - 1]);
                            ?>
                                    <div id="areaPlayer" style="z-index:-1999; "></div>
                                <?php } else { ?>
                                    -
                                <?php
                                }
                            } else {
                                if ($valUrl != "") {
                                    $myUrlArray = explode("v=", $valUrl);
                                    $myUrlCut = $myUrlArray[1];
                                    $myUrlCutArray = explode("&", $myUrlCut);
                                    $myUrlCutAnd = $myUrlCutArray[0];
                                ?>
                                    <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?php echo  $myUrlCutAnd ?>" frameborder="0" allowfullscreen style="z-index:-1999; "></iframe>
                                <?php } else { ?>
                                    -
                            <?php }
                            } ?>

                        </div>
                    </td>
                </tr>
            <?php } ?>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:attfile"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:attfileDe"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">แสดงเอกสารแนบ : <span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php if ($valDwswitch == 'On') { ?>
                                เปิด
                            <?php } elseif ($valDwswitch == 'Off') { ?>
                                ปิด
                            <?php } ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid 	='" . $valID . "' AND   " . $mod_tb_file . "_language ='" . $_REQUEST['inputLt'] . "' ORDER BY " . $mod_tb_file . "_id ASC";
                            $query_file = wewebQueryDB($coreLanguageSQL, $sql);
                            $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
                            if ($number_row >= 1) {
                                $txtFile = "";
                                while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                    $downloadFile = $row_file[1];
                                    $downloadID = $row_file[0];
                                    $downloadName = $row_file[2];
                                    $countDownload = $row_file[3];
                                    $imageType = strstr($downloadFile, '.');
                            ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo  get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="download.php?linkPath=<?php echo  $linkRelativePath ?>&amp;downloadFile=<?php echo  $downloadFile ?>"><?php echo  $downloadName . "" . $imageType ?></a> | <?php echo  $langMod["file:type"] ?>: <?php echo  $imageType ?> | <?php echo  $langMod["file:size"] ?>: <?php echo  get_IconSize($linkRelativePath) ?> | <?php echo  $langMod["file:download"] ?>: <?php echo  number_format($countDownload) ?></div>
                                    <div></div>

                            <?php
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:seo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:seoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valMetatitle ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seodes"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valDescription ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valKeywords ?></div>
                    </td>
                </tr>



            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valCreby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valCreby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo  $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valLastby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valLastby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langTxt["mg:status"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if ($valStatus == "Enable") { ?>
                                <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <?php } else { ?>
                                <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <?php if ($_REQUEST['viewID'] <= 0) { ?>
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                    <tr>
                        <td colspan="7" align="right" valign="top" height="20"></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                    </tr>
                <?php } ?>
                </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php"); ?>
    <?php if ($_REQUEST['viewID'] <= 0) { ?>
        <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
        <script language="JavaScript" type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('a[rel=viewAlbum]').fancybox({
                    'padding': 0,
                    'transitionIn': 'fade',
                    'transitionOut': 'fade',
                    'autoSize': false,
                });
            });
        </script>

        <script type='text/javascript' src='swfobject.js'></script>
        <script type='text/javascript' src='silverlight.js'></script>
        <script type='text/javascript' src='wmvplayer.js'></script>
        <script type='text/javascript'>
            var filename = "<?php echo  $filename ?>";
            var filetype = "<?php echo  $filetype ?>";
            var cnt = document.getElementById("areaPlayer");
            if (filetype == "flv") {
                var s1 = new SWFObject('player.swf', 'player', '560', '315', '9');
                s1.addParam('allowfullscreen', 'true');
                s1.addParam('wmode', 'transparent');
                s1.addParam('allowscriptaccess', 'always');
                s1.addParam('flashvars', 'file=<?php echo  $mod_path_vdo ?>/' + filename);
                s1.write('areaPlayer');
            } else /* if(filetype=="wmv")*/ {

                var src = 'wmvplayer.xaml';
                var cfg = "";
                var ply;
                cfg = {
                    file: '<?php echo  $mod_path_vdo ?>/' + filename,
                    image: '',
                    height: '315',
                    width: '560',
                    autostart: "false",
                    windowless: 'true',
                    showstop: 'true'
                };
                ply = new jeroenwijering.Player(cnt, src, cfg);
            }
        </script>
    <?php } ?>

</body>

</html>
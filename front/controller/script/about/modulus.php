<?php
class aboutPage
{
  function callCMS($masterkey, $id = null, $gid = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langOption = $url->pagelang[2];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_id as id,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey as masterkey,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_title" . $lang . " as title,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_pic" . $lang . " as pic,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lastdate as lastdate,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_url as url,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_target as target,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid as gid,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_view as view,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_typec as typec,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate as credate,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_metatitle" . $lang . " as metatitle,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_description" . $lang . " as description,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_keywords" . $lang . " as keywords,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id as menuid,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_name".$langFull." as menuname

    FROM
    " . $config['cms']['db']['main'] . "
    INNER JOIN 
    " . $config['sy_mnu']['db']['main'] . "
    ON
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_masterkey = " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey
    WHERE
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_status != 'Disable' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lang".$langOption." = '1' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " != '' AND
    ((" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid = '" . $gid . "' ";
    }

    if (!empty($id)) {
      $sql .= " AND " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_id = '" . $id . "' ";
    }

    $sql .= " ORDER  BY " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callCMSList($masterkey, $id = null, $gid = null, $page = 1, $limit = 10, $order = "DESC", $year = null, $sid = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langOption = $url->pagelang[2];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_id as id,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey as masterkey,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_title" . $lang . " as title,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_pic" . $lang . " as pic,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lastdate as lastdate,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_url as url,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_target as target,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid as gid,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_view as view,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_typec as typec,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate as credate,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_metatitle" . $lang . " as metatitle,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_description" . $lang . " as description,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_keywords" . $lang . " as keywords,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id as menuid,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_name".$langFull." as menuname

    FROM
    " . $config['cms']['db']['main'] . "
    INNER JOIN 
    " . $config['sy_mnu']['db']['main'] . "
    ON
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_masterkey = " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey
    WHERE
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_status != 'Disable' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lang".$langOption." = '1' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " != '' AND
    ((" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid = '" . $gid . "' ";
    }

    if (!empty($id)) {
      $sql .= " AND " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_id = '" . $id . "' ";
    }

    if (!empty($year)) {
      $sql .= " AND YEAR(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate) = '" . $year . "' ";
    }

    if (!empty($sid)) {
      $sql .= " AND " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sid = '" . $sid . "' ";
    }

    $sql .= " ORDER  BY " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_order ".$order." ";

    // print_pre($sql);
    $result = $db->pageexecute($sql, $limit, $page);
    return $result;
  }

  function callGroup($masterkey, $id = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_id as id,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_masterkey as masterkey,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_title" . $lang . " as title,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_pic" . $lang . " as pic,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_lastdate as lastdate,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_url as url,
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_types as types,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id as menuid,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_name".$langFull." as menuname
    FROM
    " . $config['cmg']['db']['main'] . "
    INNER JOIN 
    " . $config['sy_mnu']['db']['main'] . "
    ON
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_masterkey = " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_masterkey
    WHERE
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_status != 'Disable' AND
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_subject" . $lang . " != '' 
    ";

    if (!empty($id)) {
      $sql .= " AND " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_id = '" . $id . "' ";
    }

    $sql .= " ORDER  BY " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callYear($masterkey, $gid = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langOption = $url->pagelang[2];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_id as id,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey as masterkey,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_title" . $lang . " as title,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lastdate as lastdate,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid as gid,
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate as credate

    FROM
    " . $config['cms']['db']['main'] . "
    INNER JOIN 
    " . $config['cmg']['db']['main'] . "
    ON
    " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_id = " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_gid
    WHERE
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_status != 'Disable' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lang".$langOption." = '1' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " != '' AND
    ((" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['cmg']['db']['main'] . "." . $config['cmg']['db']['main'] . "_id = '" . $gid . "' ";
    }

    $sql .= " GROUP BY YEAR(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate) ORDER BY " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callSubGroup($masterkey, $gid = null, $page = 1, $limit = 10, $order = "DESC", $year = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langOption = $url->pagelang[2];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_id as id,
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_masterkey as masterkey,
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_title" . $lang . " as title,
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_lastdate as lastdate
    FROM
    " . $config['cmsg']['db']['main'] . "
    INNER JOIN 
    " . $config['cms']['db']['main'] . "
    ON
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sid = " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_id
    WHERE
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_status != 'Disable' AND
    " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_subject" . $lang . " != '' AND

    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_status != 'Disable' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_lang".$langOption." = '1' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_subject" . $lang . " != '' AND
    ((" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_gid = '" . $gid . "' ";
    }

    if (!empty($year)) {
      $sql .= " AND YEAR(" . $config['cms']['db']['main'] . "." . $config['cms']['db']['main'] . "_credate) = '" . $year . "' ";
    }

    $sql .= " GROUP BY " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_id ORDER  BY " . $config['cmsg']['db']['main'] . "." . $config['cmsg']['db']['main'] . "_order ".$order." ";

    // print_pre($sql);
    $result = $db->pageexecute($sql, $limit, $page);
    return $result;
  }

  ## คณะกรรมการสถาบัน
  function callGroupMem($masterkey, $id = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_id as id,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_masterkey as masterkey,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_title" . $lang . " as title,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_url" . $lang . " as url,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_lastdate as lastdate,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id as menuid,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_name".$langFull." as menuname
    FROM
    " . $config['memsg']['db']['main'] . "
    INNER JOIN 
    " . $config['sy_mnu']['db']['main'] . "
    ON
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_masterkey = " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_masterkey
    WHERE
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_status != 'Disable' AND
    " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_subject" . $lang . " != '' 
    ";

    if (!empty($id)) {
      $sql .= " AND " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_id = '" . $id . "' ";
    }

    $sql .= " ORDER  BY " . $config['memsg']['db']['main'] . "." . $config['memsg']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callSubGroupMem($masterkey, $id = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_id as id,
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_masterkey as masterkey,
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_subject" . $lang . " as subject,
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_title" . $lang . " as title,
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_lastdate as lastdate
    FROM
    " . $config['memg']['db']['main'] . "
    WHERE
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_status != 'Disable' AND
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_subject" . $lang . " != '' 
    ";

    if (!empty($id)) {
      $sql .= " AND " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_gid = '" . $id . "' ";
    }

    $sql .= " ORDER  BY " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }
  function callPositionMem($masterkey, $gid = null, $pid = null, $mid = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_id as id,
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_mid as mid,
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid as gid,
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_pid as pid
    FROM
    " . $config['memp']['db']['main'] . " 
    INNER JOIN
    " . $config['memg']['db']['main'] . " 
    ON
    " . $config['memp']['db']['main'] . " . " . $config['memp']['db']['main'] . "_gid = " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_id
    WHERE 1=1 
    AND " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_masterkey = '".$masterkey."'
    AND " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_subject".$lang." != ''
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid = '" . $gid . "' ";
    }

    if (!empty($pid)) {
      $sql .= " AND " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_pid = '" . $pid . "' ";
    }

    if (!empty($mid)) {
      $sql .= " AND " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_mid = '" . $mid . "' ";
    }

    $sql .= " GROUP BY " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid 
    ORDER  BY " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

  function callMem($masterkey, $gid = null)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    $langOption = $url->pagelang[2];
    $langFull = strtolower($url->pagelang[4]);

    $sql = "SELECT
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_id as id,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_masterkey as masterkey,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_pic" . $lang . " as pic,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_sdatetxt" . $lang . " as sdatetxt,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_email" . $lang . " as email,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_tel" . $lang . " as tel,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_fname" . $lang . " as fname,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_lname" . $lang . " as lname,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_depart" . $lang . " as depart,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_lastdate as lastdate,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_url as url,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_gid as gid,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_view as view,
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_credate as credate,
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid as posi_gid,
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_subject".$lang." as namegroup,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id as menuid,
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_name".$langFull." as menuname

    FROM
    " . $config['mem']['db']['main'] . "
    INNER JOIN 
    " . $config['memp']['db']['main'] . "
    ON
    " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_mid = " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_id
    INNER JOIN 
    " . $config['memg']['db']['main'] . "
    ON
    " . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_id = " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid
    INNER JOIN 
    " . $config['sy_mnu']['db']['main'] . "
    ON
    " . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_masterkey = " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_masterkey
    WHERE
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_status != 'Disable' AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_lang".$langOption." = '1' AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_fname" . $lang . " != '' AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_lname" . $lang . " != '' AND
    ((" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

    if (!empty($gid)) {
      $sql .= " AND " . $config['memp']['db']['main'] . "." . $config['memp']['db']['main'] . "_gid IN (" . $gid . ") ";
    }

    $sql .= " GROUP BY " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_id
    ," . $config['sy_mnu']['db']['main'] . "." . $config['sy_mnu']['db']['main'] . "_id 
    ORDER  BY " . $config['mem']['db']['main'] . "." . $config['mem']['db']['main'] . "_order ," . $config['memg']['db']['main'] . "." . $config['memg']['db']['main'] . "_order DESC ";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }

}
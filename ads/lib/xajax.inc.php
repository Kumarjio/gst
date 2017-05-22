<?php

/*
+---------------------------------------------------------------------------+
| Revive Adserver                                                           |
| http://www.revive-adserver.com                                            |
|                                                                           |
| Copyright: See the COPYRIGHT.txt file.                                    |
| License: GPLv2 or later, see the LICENSE.txt file.                        |
+---------------------------------------------------------------------------+
*/

/**
 * OpenX Schema Management Utility
 */
require_once MAX_PATH . '/lib/OA/Upgrade/Upgrade.php';
require_once(MAX_PATH.'/lib/OA/Upgrade/UpgradeAuditor.php');
require_once(MAX_PATH.'/lib/OA/Upgrade/DB_UpgradeAuditor.php');

/*function testAjax($form)
{
	$objResponse = new xajaxResponse();
	$objResponse->addAlert('testing ajax');
	$objResponse->addAlert(print_r($form,true));
	return $objResponse;
}*/

function expandOSURow($id)
{
    $oUpgrader = new OA_Upgrade();
    $oUpgrader->initDatabaseConnection();
    $html = getDBAuditTable($oUpgrader->oAuditor->queryAuditBackupTablesByUpgradeId($id));

	$objResponse = new xajaxResponse();
	$objResponse->addAssign('cell_'.$id,"style.display", 'block');
    $objResponse->addAssign('cell_'.$id, 'text-align', 'center');
	$objResponse->addAssign('cell_'.$id, 'innerHTML', $html);
	$objResponse->addAssign('img_expand_'.$id,"style.display", 'none');
	$objResponse->addAssign('img_collapse_'.$id,"style.display", 'inline');
	$objResponse->addAssign('text_expand_'.$id,"style.display", 'none');
	$objResponse->addAssign('text_collapse_'.$id,"style.display", 'inline');
	$objResponse->addAssign('info_expand_'.$id,"style.display", 'none');
	$objResponse->addAssign('info_collapse_'.$id,"style.display", 'inline');
	return $objResponse;
}

function collapseOSURow($id)
{
	$objResponse = new xajaxResponse();
	$objResponse->addAssign('cell_'.$id,"style.display", 'none');
	$objResponse->addAssign('cell_'.$id, 'innerHTML', '');
	$objResponse->addAssign('img_expand_'.$id,"style.display", 'inline');
	$objResponse->addAssign('img_collapse_'.$id,"style.display", 'none');
	$objResponse->addAssign('text_expand_'.$id,"style.display", 'inline');
	$objResponse->addAssign('text_collapse_'.$id,"style.display", 'none');
	$objResponse->addAssign('info_expand_'.$id,"style.display", 'inline');
	$objResponse->addAssign('info_collapse_'.$id,"style.display", 'none');
	return $objResponse;
}

function sessionExpired()
{
    $objResponse = new xajaxResponse();
    $objResponse->addAlert('Your session is expired, please reload the page and log in');
    return $objResponse;
}


require_once MAX_PATH.'/lib/xajax/xajax.inc.php';

$xajax = new xajax();
//$xajax->debugOn(); // Uncomment this line to turn debugging on
$xajax->debugOff(); // Uncomment this line to turn debugging on
//$xajax->registerFunction("testAjax");
$xajax->registerFunction("expandOSURow");
$xajax->registerFunction("collapseOSURow");
$xajax->registerFunction("sessionExpired");
// Process any requests.  Because our requestURI is the same as our html page,
// this must be called before any headers or HTML output have been sent
$xajax->processRequests();

$overwrite=true;

$jspath = MAX_PATH.'/var/templates_compiled/';
$jsfile = 'oxajax.js';
if (!file_exists($jspath.$jsfile) || $overwrite)
{
    ob_start();
    $xajax->printJavascript($jspath, $jsfile); // output the xajax javascript. This must be called between the head tags
    $js = ob_get_contents();
    ob_end_clean();

    $pattern    = '/(<script type="text\/javascript">)(?P<jscript>[\w\W\s]+)(<\/script>)/U';
	if (preg_match($pattern, $js, $aMatch))
	{
        $js = $aMatch['jscript'];
	}
	else
	{
        echo "Error parsing javascript generated by xAjax.  You should check the {$jspath}{$jsfile} manually.";
	}

    $fp = fopen($jspath.$jsfile, 'w');
    if ($fp === false) {
        echo "Error opening output file {$jspath}{$jsfile} for writing.  Check permissions.";
        die();
    }
    else
    {
        fwrite($fp, $js);
        fclose($fp);
    }
}


?>

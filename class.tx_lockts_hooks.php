<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Sven Juergens <post@t3area.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

$GLOBALS['LANG']->includeLLFile('EXT:lock_ts/locallang_db.xml');

class tx_lockts_hooks {

    function checklock($parameters, $pObj) {

        if (!$parameters['e']['config']) {
            // we are in the Tempplate overview

            // check if there was send the command to lock/ unlock the template
            $this->updateLock = t3lib_div::_GET('lock_ts');

            // update template record
            if(isset($this->updateLock) && t3lib_div::testInt($this->updateLock)) {
                $GLOBALS['TYPO3_DB']->exec_UpdateQuery(
                    'sys_template',
                    'uid = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($parameters['tplRow']['uid'],'sys_template'),
                    array('tx_lockts_lock' => ($this->updateLock == 1 ? 1 : 0))
                );
            }
            // get templaterecord and check if we must set the "LOCK TS" field "checked"
            $rec = t3lib_BEfunc::getRecord('sys_template', $parameters['tplRow']['uid'],'tx_lockts_lock');
            $additionalInput = '
			<div id="lock-ts">
                            <input type="checkbox" class="checkbox" id="lock_ts" onclick="window.location.href=window.location.href+\'&lock_ts=\'+(this.checked?1:2)" value="1" '
                            . ($rec['tx_lockts_lock'] == 1 ? ' checked="checked"' : '') . '/>
				<label for="lock_ts"> ' . $GLOBALS['LANG']->getLL('sys_template.locktstemplate', 1) . ' </label><br />
			</div>	
			';

            $parameters['theOutput'] .= $additionalInput;
        }else {
            $rec = t3lib_BEfunc::getRecord('sys_template', $parameters['tplRow']['uid'],'tx_lockts_lock');
            if($rec['tx_lockts_lock'] == 1) {
                $pObj->pObj->doc->inDocStylesArray[] = '
                     .locked{font-weight:bold;}
            ';

                $pObj->pObj->doc->JScodeArray[] = '
document.observe("dom:loaded", function () {
$$(".c-inputButton").each( function ( einElement ) {
    if($F(einElement) == \'Update\'){
        einElement.replace(\'<span class="locked">' . $GLOBALS['LANG']->getLL('sys_template.replacedSubmitText', 1) . '</span>\');
}
    });
});
';

           }
       }
    }

}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lock_ts/class.tx_lockts_hooks.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/lock_ts/class.tx_lockts_hooks.php']);
}

?>
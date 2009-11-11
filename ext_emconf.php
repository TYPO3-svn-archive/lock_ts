<?php

########################################################################
# Extension Manager/Repository config file for ext: "lock_ts"
#
# Auto generated 11-11-2009 22:20
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Lock TypoScript Templates',
	'description' => 'A simple write protection for TypoScript Templates.',
	'category' => 'be',
	'shy' => 0,
	'version' => '1.0.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Sven Juergens',
	'author_email' => 'post@t3area.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2-0.0.0',
			'typo3' => '4.2-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"229a";s:10:"README.txt";s:4:"ee2d";s:25:"class.tx_lockts_hooks.php";s:4:"d7af";s:12:"ext_icon.gif";s:4:"4c12";s:14:"ext_tables.php";s:4:"bcec";s:14:"ext_tables.sql";s:4:"51ea";s:16:"locallang_db.xml";s:4:"1a55";s:14:"doc/manual.sxw";s:4:"0378";s:19:"doc/wizard_form.dat";s:4:"2fc6";s:20:"doc/wizard_form.html";s:4:"9bf5";}',
);

?>
<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2021 Abramo Tesoro <abramotesoro@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

 if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/**
 * Add custom css for backend
 */
$GLOBALS['TBE_STYLES']['skins']['trameindipendenti']['stylesheetDirectories'][] = 'EXT:trameindipendenti/Resources/Public/css/backend/';

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Tra.trameindipendenti',
		'web',          						// Main area
		'tx_trameindipendenti_configuration',	// Name of the module
		'after:template',             			// Position of the module
		[
			'ModuleConf' => 'index, salvaSocial, salvaPage, salvaContainer, salvaContatti, salvaCopyright'
		],
		[               // Additional configuration
			'access' => 'user,group',
			'iconIdentifier' => 'module-icon',
			'labels' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_mod.xlf',
			'navigationComponentId' => 'TYPO3/CMS/Backend/PageTree/PageTreeElement',
			'inheritNavigationComponentFromMainModule' => true,
		]
	);
}

# TCA configuration
$boot = function () {
	foreach (['accordion_item'] as $table) {
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_trameindipendenti_'.$table,'EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf');
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_trameindipendenti_'.$table);
	}
};
$boot();
unset($boot);
?>
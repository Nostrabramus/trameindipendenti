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


if (!defined('TYPO3_MODE'))
	die('Access denied.');

/**
 * Add PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR:EXT:trameindipendenti/Configuration/TSconfig/" extensions="pagets">');



/*register icon plugin*/
if (TYPO3_MODE === 'BE') {
	$icons = [
		'slide' => 'slide.svg',
		'accordion' => 'accordion.svg',
		'child-item' => 'child-item.svg',
		'card_film' => 'card_film.svg',
		'card_giurato' => 'card_giurato.svg',
		'partner' => 'partner.svg',
		'module-icon' => 'module-icon.svg',
	];
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	foreach ($icons as $identifier => $path) {
		$iconRegistry->registerIcon(
			$identifier,
			\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
			['source' => 'EXT:trameindipendenti/Resources/Public/Icons/' . $path]
		);
	}
}
?>
<?php
defined('TYPO3_MODE') or die();

$partnerSysFileReferenceColumns = [
    'layout' => [
        'exclude' => true,
        'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_logo.layout',
        'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_logo.default', 0, ''],
				['LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_logo.black', 1, ''],
				['LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_logo.white', 2, ''],
			],
			'default' => 0,
		],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference', $partnerSysFileReferenceColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('sys_file_reference', 'imageTramePalette', 'layout');

<?php
/**
 * Created by PhpStorm.
 * User: abramotesoro
 * Date: 26/11/21
 * Time: 09:44
 */

defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:';

// CType CardFilm
// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
	'tt_content',
	'CType',
	[
		$ll .'card_film',
		'trameindipendenti_card_film',
		'card_film',
	],
	'html',
	'after'
);

// Configure the default backend fields for the content element card-film
$GLOBALS['TCA']['tt_content']['types']['trameindipendenti_card_film'] = array(
	'showitem' => '
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
			--palette--;;general,
			header;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.titolo,
			subheader;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.autore,
			--linebreak--,
			--palette--;;,header_layout;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.paese,
			header_position;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.anno,
			--linebreak--,
			--palette--;;,bodytext;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.sinossi,
			--palette--;;,image;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.locandina,	
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
			--palette--;;language,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
			--palette--;;hidden,
			--palette--;;access,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
			categories,
		',
	'columnsOverrides' => [
		'header_layout' => [
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					[
						'Italia',
						'0'
					],
					[
						'Spagna',
						'1'
					],
					[
						'Francia',
						'2'
					],
					[
						'Germania',
						'3'
					],
					[
						'Inghilterra',
						'4'
					],
					[
						'Iran',
						'5'
					],
					[
						'Austria',
						'100'
					]
				],
				'default' => 0
			]
		],
		'header_position' => [
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					[
						'2001',
						'2001'
					],
					[
						'2002',
						'2002'
					],
					[
						'2003',
						'2003'
					],
					[
						'2004',
						'2004'
					]
				],
				'default' => '2001'
			]
		],
		'bodytext' => [
			'config' => [
				'enableRichtext' => true,
			]
		],
		'image' => [
			'config' => [
				'maxitems' => 1,
				'autoSizeMax' => true
			]
		]
	]
);

// CType Employee
// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
	'tt_content',
	'CType',
	[
		$ll .'card_giurato',
		'trameindipendenti_card_giurato',
		'card_giurato',
	],
	'card_film',
	'after'
);
$GLOBALS['TCA']['tt_content']['columns']['giurato_foto'] = array (
	'exclude' => true,
	'label' => $ll . 'card_giurato.giurato_foto',
	'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
		'giurato_foto',
		[
			'appearance' => [
				'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			],
			'overrideChildTca' => [
				'types' => [
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
						'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
					]
				],
			],
			'maxitems' => 1,
			'autoSizeMax' => true
		],
		'gif,jpeg,jpg,png'

	)
);

// Configure the default backend fields for the content element scheda-persona
$GLOBALS['TCA']['tt_content']['types']['trameindipendenti_card_giurato'] = array(
	'showitem' => '
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
			--palette--;;general,
			--palette--;;headers,
			--palette--;;,bodytext;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_giurato.giurato_bio,
			--palette--;;,image;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_giurato.giurato_foto,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
			--palette--;;frames,
			--palette--;;appearanceLinks,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
			--palette--;;language,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
			--palette--;;hidden,
			--palette--;;access,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
			categories,
		',
		'columnsOverrides' => [
			'bodytext' => [
				'config' => [
					'enableRichtext' => true,
				]
			],
			'image' => [
				'config' => [
					'maxitems' => 1,
					'autoSizeMax' => true
				]
			]
		]
);
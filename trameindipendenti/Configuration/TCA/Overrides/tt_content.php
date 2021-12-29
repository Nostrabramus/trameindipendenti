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

// Configure palette for card-film
$GLOBALS['TCA']['tt_content']['palettes']['film_headers'] = array(
	'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.headers',
	'showitem' => '
			header;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.titolo,
			--linebreak--,
			subheader;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.autore,
			--linebreak--,
			header_layout;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.paese,
			date;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.anno,
			header_position;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.genere
		',
);

// Configure the default backend fields for the content element card-film
$GLOBALS['TCA']['tt_content']['types']['trameindipendenti_card_film'] = array(
	'showitem' => '
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
			--palette--;;general,
			--palette--;;film_headers,
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
		'date' => [
			'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.anno',
		],
		'header_layout' => [
			'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.paese',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					[
						'Non Specificato',
						'0'
					],
					[
						'Italia',
						'1'
					],
					[
						'Spagna',
						'2'
					],
					[
						'Francia',
						'3'
					],
					[
						'Germania',
						'4'
					],
					[
						'Inghilterra',
						'5'
					],
					[
						'Iran',
						'6'
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
			'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.genere',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					[
						'Non Specificato',
						''
					],
					[
						'Drammatico',
						'drama'
					],
					[
						'Commedia',
						'comedy'
					],
					[
						'Horror',
						'horror'
					],
					[
						'Noir',
						'noir'
					]
				],
				'default' => ''
			]
		],
		'subheader' => [
			'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.autore',
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
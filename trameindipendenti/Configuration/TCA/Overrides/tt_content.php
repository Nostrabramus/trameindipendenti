<?php
/**
 * Created by PhpStorm.
 * User: abramotesoro
 * Date: 26/11/21
 * Time: 09:44
 */

defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:';


// CType Accordion
// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
	'tt_content',
	'CType',
	[
		$ll .'accordion',
		'trameindipendenti_accordion',
		'accordion',
	],
	'html',
	'after'
);

// Configure the default backend fields for the content element accordion
$GLOBALS['TCA']['tt_content']['types']['trameindipendenti_accordion'] = array(
	'showitem' => '
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
			--palette--;;general,
			--palette--;;,header;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:accordion.titolo,
			--palette--;;,accordion_item;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:accordion.elementi,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
			--palette--;;language,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
			--palette--;;hidden,
			--palette--;;access,
		',
);
$GLOBALS['TCA']['tt_content']['columns']['accordion_item'] = array (
	'exclude' => false,
	'label' => $ll.'scheda_persona.employee_facebook',
	'config' => [
		'type' => 'inline',
		'foreign_table' => 'tx_trameindipendenti_accordion_item',
		'foreign_field' => 'tt_content',
	]
);


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
	'accordion',
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
			--palette--;;,frame_class;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.vincitore,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
			--palette--;;,layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
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
						'Afganistan',
						'Afghanistan'
					],
					[
						'Albania',
						'Albania'
					],
					[
						'Algeria',
						'Algeria'
					],
					[
						'American Samoa',
						'American Samoa'
					],
					[
						'Andorra',
						'Andorra'
					],
					[
						'Angola',
						'Angola'
					],
					[
						'Anguilla',
						'Anguilla'
					],
					[
						'Antigua & Barbuda',
						'Antigua & Barbuda'
					],
					[
						'Argentina',
						'Argentina'
					],
					[
						'Armenia',
						'Armenia'
					],
					[
						'Aruba',
						'Aruba'
					],
					[
						'Australia',
						'Australia'
					],
					[
						'Austria',
						'Austria'
					],
					[
						'Azerbaijan',
						'Azerbaijan'
					],
					[
						'Bahamas',
						'Bahamas'
					],
					[
						'Bahrain',
						'Bahrain'
					],
					[
						'Bangladesh',
						'Bangladesh'
					],
					[
						'Barbados',
						'Barbados'
					],
					[
						'Belarus',
						'Belarus'
					],
					[
						'Belgium',
						'Belgium'
					],
					[
						'Belize',
						'Belize'
					],
					[
						'Benin',
						'Benin'
					],
					[
						'Bermuda',
						'Bermuda'
					],
					[
						'Bhutan',
						'Bhutan'
					],
					[
						'Bolivia',
						'Bolivia'
					],
					[
						'Bonaire',
						'Bonaire'
					],
					[
						'Bosnia & Herzegovina',
						'Bosnia & Herzegovina'
					],
					[
						'Botswana',
						'Botswana'
					],
					[
						'Brazil',
						'Brazil'
					],
					[
						'British Indian Ocean Ter',
						'British Indian Ocean Ter'
					],
					[
						'Brunei',
						'Brunei'
					],
					[
						'Bulgaria',
						'Bulgaria'
					],
					[
						'Burkina Faso',
						'Burkina Faso'
					],
					[
						'Burundi',
						'Burundi'
					],
					[
						'Cambodia',
						'Cambodia'
					],
					[
						'Cameroon',
						'Cameroon'
					],
					[
						'Canada',
						'Canada'
					],
					[
						'Canary Islands',
						'Canary Islands'
					],
					[
						'Cape Verde',
						'Cape Verde'
					],
					[
						'Cayman Islands',
						'Cayman Islands'
					],
					[
						'Central African Republic',
						'Central African Republic'
					],
					[
						'Chad',
						'Chad'
					],
					[
						'Channel Islands',
						'Channel Islands'
					],
					[
						'Chile',
						'Chile'
					],
					[
						'China',
						'China'
					],
					[
						'Christmas Island',
						'Christmas Island'
					],
					[
						'Cocos Island',
						'Cocos Island'
					],
					[
						'Colombia',
						'Colombia'
					],
					[
						'Comoros',
						'Comoros'
					],
					[
						'Congo',
						'Congo'
					],
					[
						'Cook Islands',
						'Cook Islands'
					],
					[
						'Costa Rica',
						'Costa Rica'
					],
					[
						'Cote DIvoire',
						'Cote DIvoire'
					],
					[
						'Croatia',
						'Croatia'
					],
					[
						'Cuba',
						'Cuba'
					],
					[
						'Curaco',
						'Curacao'
					],
					[
						'Cyprus',
						'Cyprus'
					],
					[
						'Czech Republic',
						'Czech Republic'
					],
					[
						'Denmark',
						'Denmark'
					],
					[
						'Djibouti',
						'Djibouti'
					],
					[
						'Dominica',
						'Dominica'
					],
					[
						'Dominican Republic',
						'Dominican Republic'
					],
					[
						'East Timor',
						'East Timor'
					],
					[
						'Ecuador',
						'Ecuador'
					],
					[
						'Egypt',
						'Egypt'
					],
					[
						'El Salvador',
						'El Salvador'
					],
					[
						'Equatorial Guinea',
						'Equatorial Guinea'
					],
					[
						'Eritrea',
						'Eritrea'
					],
					[
						'Estonia',
						'Estonia'
					],
					[
						'Ethiopia',
						'Ethiopia'
					],
					[
						'Falkland Islands',
						'Falkland Islands'
					],
					[
						'Faroe Islands',
						'Faroe Islands'
					],
					[
						'Fiji',
						'Fiji'
					],
					[
						'Finland',
						'Finland'
					],
					[
						'France',
						'France'
					],
					[
						'French Guiana',
						'French Guiana'
					],
					[
						'French Polynesia',
						'French Polynesia'
					],
					[
						'French Southern Ter',
						'French Southern Ter'
					],
					[
						'Gabon',
						'Gabon'
					],
					[
						'Gambia',
						'Gambia'
					],
					[
						'Georgia',
						'Georgia'
					],
					[
						'Germany',
						'Germany'
					],
					[
						'Ghana',
						'Ghana'
					],
					[
						'Gibraltar',
						'Gibraltar'
					],
					[
						'Great Britain',
						'Great Britain'
					],
					[
						'Greece',
						'Greece'
					],
					[
						'Greenland',
						'Greenland'
					],
					[
						'Grenada',
						'Grenada'
					],
					[
						'Guadeloupe',
						'Guadeloupe'
					],
					[
						'Guam',
						'Guam'
					],
					[
						'Guatemala',
						'Guatemala'
					],
					[
						'Guinea',
						'Guinea'
					],
					[
						'Guyana',
						'Guyana'
					],
					[
						'Haiti',
						'Haiti'
					],
					[
						'Hawaii',
						'Hawaii'
					],
					[
						'Honduras',
						'Honduras'
					],
					[
						'Hong Kong',
						'Hong Kong'
					],
					[
						'Hungary',
						'Hungary'
					],
					[
						'Iceland',
						'Iceland'
					],
					[
						'Indonesia',
						'Indonesia'
					],
					[
						'India',
						'India'
					],
					[
						'Iran',
						'Iran'
					],
					[
						'Iraq',
						'Iraq'
					],
					[
						'Ireland',
						'Ireland'
					],
					[
						'Isle of Man',
						'Isle of Man'
					],
					[
						'Israel',
						'Israel'
					],
					[
						'Italy',
						'Italy'
					],
					[
						'Jamaica',
						'Jamaica'
					],
					[
						'Japan',
						'Japan'
					],
					[
						'Jordan',
						'Jordan'
					],
					[
						'Kazakhstan',
						'Kazakhstan'
					],
					[
						'Kenya',
						'Kenya'
					],
					[
						'Kiribati',
						'Kiribati'
					],
					[
						'Korea North',
						'Korea North'
					],
					[
						'Korea Sout',
						'Korea South'
					],
					[
						'Kuwait',
						'Kuwait'
					],
					[
						'Kyrgyzstan',
						'Kyrgyzstan'
					],
					[
						'Laos',
						'Laos'
					],
					[
						'Latvia',
						'Latvia'
					],
					[
						'Lebanon',
						'Lebanon'
					],
					[
						'Lesotho',
						'Lesotho'
					],
					[
						'Liberia',
						'Liberia'
					],
					[
						'Libya',
						'Libya'
					],
					[
						'Liechtenstein',
						'Liechtenstein'
					],
					[
						'Lithuania',
						'Lithuania'
					],
					[
						'Luxembourg',
						'Luxembourg'
					],
					[
						'Macau',
						'Macau'
					],
					[
						'Macedonia',
						'Macedonia'
					],
					[
						'Madagascar',
						'Madagascar'
					],
					[
						'Malaysia',
						'Malaysia'
					],
					[
						'Malawi',
						'Malawi'
					],
					[
						'Maldives',
						'Maldives'
					],
					[
						'Mali',
						'Mali'
					],
					[
						'Malta',
						'Malta'
					],
					[
						'Marshall Islands',
						'Marshall Islands'
					],
					[
						'Martinique',
						'Martinique'
					],
					[
						'Mauritania',
						'Mauritania'
					],
					[
						'Mauritius',
						'Mauritius'
					],
					[
						'Mayotte',
						'Mayotte'
					],
					[
						'Mexico',
						'Mexico'
					],
					[
						'Midway Islands',
						'Midway Islands'
					],
					[
						'Moldova',
						'Moldova'
					],
					[
						'Monaco',
						'Monaco'
					],
					[
						'Mongolia',
						'Mongolia'
					],
					[
						'Montserrat',
						'Montserrat'
					],
					[
						'Morocco',
						'Morocco'
					],
					[
						'Mozambique',
						'Mozambique'
					],
					[
						'Myanmar',
						'Myanmar'
					],
					[
						'Nambia',
						'Nambia'
					],
					[
						'Nauru',
						'Nauru'
					],
					[
						'Nepal',
						'Nepal'
					],
					[
						'Netherland Antilles',
						'Netherland Antilles'
					],
					[
						'Netherlands',
						'Netherlands (Holland, Europe)'
					],
					[
						'Nevis',
						'Nevis'
					],
					[
						'New Caledonia',
						'New Caledonia'
					],
					[
						'New Zealand',
						'New Zealand'
					],
					[
						'Nicaragua',
						'Nicaragua'
					],
					[
						'Niger',
						'Niger'
					],
					[
						'Nigeria',
						'Nigeria'
					],
					[
						'Niue',
						'Niue'
					],
					[
						'Norfolk Island',
						'Norfolk Island'
					],
					[
						'Norway',
						'Norway'
					],
					[
						'Oman',
						'Oman'
					],
					[
						'Pakistan',
						'Pakistan'
					],
					[
						'Palau Island',
						'Palau Island'
					],
					[
						'Palestine',
						'Palestine'
					],
					[
						'Panama',
						'Panama'
					],
					[
						'Papua New Guinea',
						'Papua New Guinea'
					],
					[
						'Paraguay',
						'Paraguay'
					],
					[
						'Peru',
						'Peru'
					],
					[
						'Phillipines',
						'Philippines'
					],
					[
						'Pitcairn Island',
						'Pitcairn Island'
					],
					[
						'Poland',
						'Poland'
					],
					[
						'Portugal',
						'Portugal'
					],
					[
						'Puerto Rico',
						'Puerto Rico'
					],
					[
						'Qatar',
						'Qatar'
					],
					[
						'Republic of Montenegro',
						'Republic of Montenegro'
					],
					[
						'Republic of Serbia',
						'Republic of Serbia'
					],
					[
						'Reunion',
						'Reunion'
					],
					[
						'Romania',
						'Romania'
					],
					[
						'Russia',
						'Russia'
					],
					[
						'Rwanda',
						'Rwanda'
					],
					[
						'St Barthelemy',
						'St Barthelemy'
					],
					[
						'St Eustatius',
						'St Eustatius'
					],
					[
						'St Helena',
						'St Helena'
					],
					[
						'St Kitts-Nevis',
						'St Kitts-Nevis'
					],
					[
						'St Lucia',
						'St Lucia'
					],
					[
						'St Maarten',
						'St Maarten'
					],
					[
						'St Pierre & Miquelon',
						'St Pierre & Miquelon'
					],
					[
						'St Vincent & Grenadines',
						'St Vincent & Grenadines'
					],
					[
						'Saipan',
						'Saipan'
					],
					[
						'Samoa',
						'Samoa'
					],
					[
						'Samoa American',
						'Samoa American'
					],
					[
						'San Marino',
						'San Marino'
					],
					[
						'Sao Tome & Principe',
						'Sao Tome & Principe'
					],
					[
						'Saudi Arabia',
						'Saudi Arabia'
					],
					[
						'Senegal',
						'Senegal'
					],
					[
						'Seychelles',
						'Seychelles'
					],
					[
						'Sierra Leone',
						'Sierra Leone'
					],
					[
						'Singapore',
						'Singapore'
					],
					[
						'Slovakia',
						'Slovakia'
					],
					[
						'Slovenia',
						'Slovenia'
					],
					[
						'Solomon Islands',
						'Solomon Islands'
					],
					[
						'Somalia',
						'Somalia'
					],
					[
						'South Africa',
						'South Africa'
					],
					[
						'Spain',
						'Spain'
					],
					[
						'Sri Lanka',
						'Sri Lanka'
					],
					[
						'Sudan',
						'Sudan'
					],
					[
						'Suriname',
						'Suriname'
					],
					[
						'Swaziland',
						'Swaziland'
					],
					[
						'Sweden',
						'Sweden'
					],
					[
						'Switzerland',
						'Switzerland'
					],
					[
						'Syria',
						'Syria'
					],
					[
						'Tahiti',
						'Tahiti'
					],
					[
						'Taiwan',
						'Taiwan'
					],
					[
						'Tajikistan',
						'Tajikistan'
					],
					[
						'Tanzania',
						'Tanzania'
					],
					[
						'Thailand',
						'Thailand'
					],
					[
						'Togo',
						'Togo'
					],
					[
						'Tokelau',
						'Tokelau'
					],
					[
						'Tonga',
						'Tonga'
					],
					[
						'Trinidad & Tobago',
						'Trinidad & Tobago'
					],
					[
						'Tunisia',
						'Tunisia'
					],
					[
						'Turkey',
						'Turkey'
					],
					[
						'Turkmenistan',
						'Turkmenistan'
					],
					[
						'Turks & Caicos Is',
						'Turks & Caicos Is'
					],
					[
						'Tuvalu',
						'Tuvalu'
					],
					[
						'Uganda',
						'Uganda'
					],
					[
						'United Kingdom',
						'United Kingdom'
					],
					[
						'Ukraine',
						'Ukraine'
					],
					[
						'United Arab Erimates',
						'United Arab Emirates'
					],
					[
						'United States of America',
						'United States of America'
					],
					[
						'Uraguay',
						'Uruguay'
					],
					[
						'Uzbekistan',
						'Uzbekistan'
					],
					[
						'Vanuatu',
						'Vanuatu'
					],
					[
						'Vatican City State',
						'Vatican City State'
					],
					[
						'Venezuela',
						'Venezuela'
					],
					[
						'Vietnam',
						'Vietnam'
					],
					[
						'Virgin Islands (Brit)',
						'Virgin Islands (Brit)'
					],
					[
						'Virgin Islands (USA)',
						'Virgin Islands (USA)'
					],
					[
						'Wake Island',
						'Wake Island'
					],
					[
						'Wallis & Futana Is',
						'Wallis & Futana Is'
					],
					[
						'Yemen',
						'Yemen'
					],
					[
						'Zaire',
						'Zaire'
					],
					[
						'Zambia',
						'Zambia'
					],
					[
						'Zimbabwe',
						'Zimbabwe'
					],
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
						'Animazione',
						'animation'
					],
					[
						'Documentario',
						'documentary'
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
					],
					[
						'Fantascienza',
						'sci-if'
					],
					[
						'Sperimentale',
						'sperimental'
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
		],
		'frame_class' => [
			'label' => 'LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_film.vincitore',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'items' => [
					[
						'Narrativi - Giuria',
						'NJ'
					],
					[
						'Narrativi - Pubblico',
						'NP'
					],
					[
						'Animazioni - Giuria',
						'AJ'
					],
					[
						'Animazioni - Pubblico',
						'AP'
					],
					[
						'Documentari - Giuria',
						'DJ'
					],
					[
						'Documentari - Pubblico',
						'DP'
					],
					[
						'',
						''
					]
				],
				'default' => ''
			]
		]
	]
);

// CType Giurato
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
			--palette--;;,header;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_giurato.nome,
			--palette--;;,bodytext;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_giurato.bio,
			--palette--;;,image;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:card_giurato.foto,
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

// CType Client
// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
	'tt_content',
	'CType',
	[
		$ll .'partner',
		'trameindipendenti_partner',
		'partner',
	],
	'card:giurato',
	'after'
);

// Configure the default backend fields for the content element scheda-persona
$GLOBALS['TCA']['tt_content']['types']['trameindipendenti_partner'] = array(
	'showitem' => '
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
			--palette--;;general,
			--palette--;;,header;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_title,
			--palette--;;,header_link;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_link,
			--palette--;;,bodytext;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_description,
			--palette--;;,image;LLL:EXT:trameindipendenti/Resources/Private/Language/locallang_db.xlf:partner.partner_logo,	
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
			--palette--;;language,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
			--palette--;;hidden,
			--palette--;;access,
		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
			categories,
		',
	'columnsOverrides' => [
		'image' => [
			'config' => [
				'maxitems' => 3,
				'autoSizeMax' => true,
				// custom configuration for displaying fields in the overlay/reference table
				// to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
				'overrideChildTca' => [
					'types' => [
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
								--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageTramePalette,
								--palette--;;imageoverlayPalette,
								--palette--;;filePalette'
						],
					],
				],
			]
		],
		'bodytext' => [
			'config' => [
				'enableRichtext' => true,
			]
		]
	]
);
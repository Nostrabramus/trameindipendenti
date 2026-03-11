# CLAUDE.md — Trame Indipendenti Sitepackage

## Descrizione del progetto

Sitepackage TYPO3 per il sito del **Festival Internazionale di Cortometraggi Trame Indipendenti**.
Sviluppato da Abramo Tesoro (abramotesoro@gmail.com / Nostrabramus) a partire dal 2021.

- Chiave estensione: `trameindipendenti`
- Namespace PHP: `Tra\Trameindipendenti`
- Versione TYPO3 supportata: 7.0 – 10.x
- Categoria: `fe` (frontend sitepackage)

## Struttura del repository

Il repository contiene tre aree principali (cartella radice `trameindipendenti/`):

```
trameindipendenti/          ← sitepackage TYPO3 (questa cartella)
statico/                    ← prototipo HTML statico del sito
red/                        ← tema Bootstrap "red" usato come base grafica
```

## Architettura TYPO3

### TypoScript
- `Configuration/TypoScript/constants.txt` — costanti configurabili (pagine, social, contatti, counters, flag produzione)
- `Configuration/TypoScript/setup.txt` — include tutti i file `.setupts` dalla cartella Library
- `Configuration/TypoScript/Library/page.setupts` — mapping backend layout → template Fluid

### Backend Layouts (TSconfig)
Definiti in `Configuration/TSconfig/Pages/`:
- `HomeTrame` — homepage con slideshow, finalisti, giuria, partner
- `1Col` — layout a una colonna (default)
- `2ColAsideLeft` / `2ColAsideRight` — layout a due colonne
- `3Col` — layout a tre colonne
- `Festival` — pagina edizione festival
- `Interviste` — pagina interviste
- `Blank` — layout vuoto
- `Folder` — cartelle dati (nascosto in frontend)

### Template Fluid
Percorsi standard:
- `Resources/Private/Templates/` — template di pagina (uno per backend layout)
- `Resources/Private/Layouts/` — layout wrapper (`Default.html`, `Home.html`, `Festival.html`, `Interviste.html`, `Blank.html`)
- `Resources/Private/Partials/Area/` — componenti UI riutilizzabili (Header, Footer, Hero, BurgerMenu, LanguageMenu, Breadcrumbs, PageHeader, Borders)
- `Resources/Private/Partials/Home/` — sezioni della homepage (Finalists, Jury, HallOfFame, Partner, Patrocini, Sponsor)
- `Resources/Private/Contents/Templates/` — template content element custom
- `Resources/Private/Contents/Layouts/` — layout content element
- `Resources/Private/Contents/Partials/` — partial content element (CardFilmH, CardFilmV)

### Content Element Custom (TCA/CType)
Definiti in `Configuration/TCA/Overrides/tt_content.php`:

| CType | Descrizione |
|---|---|
| `trameindipendenti_slide` | Slide per lo slideshow homepage (titolo, sottotitolo, testo RTF, immagine sfondo) |
| `trameindipendenti_accordion` | Accordion con sotto-elementi IRRE (`tx_trameindipendenti_accordion_item`) |
| `trameindipendenti_card_film` | Scheda film (titolo, autore, paese, anno, genere, sinossi RTF, locandina, premi vinti) |
| `trameindipendenti_card_giurato` | Scheda membro della giuria (nome, bio RTF, foto) |
| `trameindipendenti_partner` | Partner/sponsor (nome, link, descrizione RTF, logo con variante colore) |

#### Campi notevoli su `card_film`
- `header_layout` → paese di produzione (select con lista completa di nazioni)
- `header_position` → genere (Animazione, Documentario, Drammatico, Commedia, Horror, Mockumentary, Noir, Fantascienza, Satira, Sperimentale)
- `frame_class` → premi vinti (multiselect: NJ, NP, AJ, AP, DJ, DP, ARS, CSCI, LANT, MS)

### Database custom
`ext_tables.sql`:
- `tt_content.accordion_item` — campo INT per IRRE accordion
- `tx_trameindipendenti_accordion_item` — tabella elementi accordion (header, bodytext, versioning, l10n)
- `sys_file_reference.layout` — campo aggiuntivo per variante logo partner (default/nero/bianco)

### Multilanguage
Il sito supporta 4 lingue (languageId):
- `0` → Italiano
- `1` → Inglese
- `2` → Spagnolo
- `3` → Francese

Copyright e credits nel footer sono localizzati per lingua. Il menu lingua è gestito tramite `LanguageMenuProcessor` in TypoScript.

### Modulo backend (ModuleConf)
`Classes/Controller/ModuleConfController.php` — controller Extbase per modulo backend custom che permette di modificare le costanti TypoScript (`sys_template.constants`) direttamente dall'interfaccia TYPO3 BE:
- Social (facebook, twitter, instagram, youtube, vimeo, linkedin)
- Pagine (id_festival, id_finalisti, id_giuria, id_privacy, id_note_legali, id_mappa, id_credits)
- Folder (id_newsfolder, id_userfolder)
- Contatti (email, pec, tel, fax)
- Copyright/credits

`Classes/Domain/Repository/AbstractRepository.php` — lettura/scrittura di `sys_template.constants`.

### Costanti configurabili (constants.txt)
| Chiave | Descrizione |
|---|---|
| `id_festival` | PID pagina edizione corrente |
| `id_partners` | PID pagina partner/patrocini/sponsor |
| `id_archivio_news` | PID archivio news |
| `id_privacy`, `id_note_legali`, `id_mappa`, `id_credits` | PID pagine legali/utility |
| `id_newsfolder`, `id_userfolder` | PID folder dati |
| `facebook`, `twitter`, `instagram`, `youtube`, `vimeo` | URL social |
| `email`, `pec`, `tel`, `fax` | Contatti |
| `counter_movies`, `counter_countries`, `counter_prizes`, `counter_screenings` | Numeri statistici del festival |
| `production` | Flag produzione (boolean) |

## Dipendenze esterne (frontend)
Asset inclusi in `Resources/Public/`:
- Bootstrap (CSS + JS bundle)
- jQuery
- Font Awesome (webfonts)
- Owl Carousel
- Magnific Popup (lightbox)
- Isotope (filtro portfolio)
- jQuery MB YTPlayer (video YouTube)
- Animate.css, Waypoints, CounterUp, Easing, MouseWheel
- `theme.js` — script custom del tema

## Tracking / Analytics
GA4 integrato (shimystats rimosso nel commit `4e8842c`).

## Workflow di sviluppo

- Il codice frontend di riferimento è in `../statico/` (HTML statico) e `../red/UPLOAD/red/` (tema Red)
- Le modifiche al CSS/JS si fanno nei file in `Resources/Public/css/` e `Resources/Public/Javascript/`
- Dopo modifiche al TCA o all'SQL: svuotare la cache TYPO3 e aggiornare il database dallo Install Tool
- Le costanti TypoScript si possono modificare via modulo backend o direttamente in `constants.txt`

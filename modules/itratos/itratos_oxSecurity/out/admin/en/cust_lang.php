<?php
/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   lang
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop CE
 * @version   SVN: $Id: cust_lang.php 34120 2011-04-01 09:40:35Z juergen.busch $
 */

$sLangName  = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(
'charset'                                  => 'utf-8',
'itratos_oxSecurity' => 'oxSecurity',
'SHOPIDS_TITLE'   => 'Itratos PHPIDS Einstellungen',
'SHOPIDS_EMAIL'   => 'E-mail Adresse',
'SHOPIDS_EMAIL_TIP'   => 'Diese Adresse wird zum senden von Angriffs-Warnmeldungen genutzt.',
'SHOPIDS_EMAIL_BEN'   => 'E-Mail Benachrichtigung',
'SHOPIDS_EMAIL_ALARM'   => 'Sende Alarm E-mails',
'SHOPIDS_EMAIL_SENDE'   => 'E-mail sende Beginn',
'SHOPIDS_EMAIL_SENDE_MIN'   => 'Minimum Angriffswert für Alarm E-Mails.',
'SHOPIDS_ADMIN_WARNING'   => 'Admin Warnung',
'SHOPIDS_ADMIN_WARNING_TIP'   => 'User loggen außerhalb des SHOP Adminbereichs',
'SHOPIDS_ADMIN_WARNING_BEG'   => 'Warnungen beginnen',
'SHOPIDS_ADMIN_WARNING_BEG_TIP'   => 'Minumum Angriffswert um die Warnungsseite zu zeigen.',
'SHOPIDS_IPBAN'   => 'IP Bannen',
'SHOPIDS_IPBAN_TIP'   => 'Benutzer (IP) können bei Angriffen die eine bestimmte Schwelle übersteigen oder für eine Reihe von wiederholten Angriffe gesperrt werden.',
'SHOPIDS_IPBAN_TIP'   => 'Benutzer (IP) können bei Angriffen die eine bestimmte Schwelle übersteigen oder für eine Reihe von wiederholten Angriffe gesperrt werden.',
'SHOPIDS_IPBAN_ACTIVE'   => 'Bannen aktivieren',
'SHOPIDS_IPBAN_SCH'   => 'Ban Schwelle',
'SHOPIDS_IPBAN_SCH_TIP'   => 'Minimum Angriffswert zum bannen eines Users',
'SHOPIDS_ATTACK_LIMIT'   => 'Wiederholungsgrenze für Angriffe',
'SHOPIDS_ATTACK_LIMIT_TIP'   => 'Anzahl der erzeugten Angriffe bevor ein User gesperrt wird (wiederholte Angriffe können unter der Verbots-Schwelle liegen)',
'SHOPIDS_EXCLUDE'   => 'Ausnahmen',
'SHOPIDS_EXCLUDE_W'   => 'Ausnahme Werte',
'SHOPIDS_EXCLUDE_W_TIP'   => 'Nutze Ausnahme-Werte die von PHPIDS nicht als Angriff erfasst werden sollen. Wir haben wichtige Standartwerte bereits eingetragen<br>
								Beispiel - meinen Post Wert ausschließen: POST.mein_Wert<br>
								Beispiel - regulären Ausdruck ausschließen: /.*foo/i',
'SHOPIDS_EXCLUDE_H'   => 'HTML Werte',
'SHOPIDS_EXCLUDE_H_TIP'   => 'Definieren von Werten die HTML enthalten, müssen vorbereitet werden, bevor die Regeln von PHPIDS greifen.<br>
								Hinweis: Werte müssen valides HTML enthalten',

'SHOPIDS_EXCLUDE_J'   => 'JSON Werte',        
'SHOPIDS_EXCLUDE_J_TIP'   => 'Definieren Sie Werte die JSON-Daten enthalten und die als solche behandelt werden müssen.',        
);

/*
[{ oxmultilang ident="GENERAL_YOUWANTTODELETE" }]
*/

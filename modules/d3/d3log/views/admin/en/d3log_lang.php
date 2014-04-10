<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

$sLangName = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                               => 'ISO-8859-15',
    'd3mxlog'                               => 'Logging',
    'd3mxlog_main'                          => 'Analysis',
    'd3tbcllog_main'                        => 'Details',
    'd3tbcllog_cleanup'                     => 'Service',
    'd3tbcllog_export'                      => 'Export',

    'D3LOG_LIB_TRANSL'                      => 'Logging',
    'D3LOG_LIB_HELPLINK'                    => 'Modul-Connector/Logging/',

    'D3_CFG_LOG_LOGTYPE'                    => 'priority',
    'D3_CFG_LOG_TIME'                       => 'time',
    'D3_CFG_LOG_COUNTER'                    => 'counter',
    'D3_CFG_LOG_MODULE'                     => 'module',
    'D3_CFG_LOG_TEXT'                       => 'recorded data',
    'D3_CFG_LOG_SESSID'                     => 'session ID',
    'D3_CFG_LOG_ACTION'                     => 'action',
    'D3_CFG_LOG_CLASS'                      => 'class',
    'D3_CFG_LOG_FUNCTION'                   => 'method name',
    'D3_CFG_LOG_LINE'                       => 'line',
    'D3_CFG_LOG_WRAP'                       => 'no line wrap',
    'D3_CFG_LOG_ACTITEMS_MODULES'           => '<b>Sie sehen derzeit nur die Logeinträge des Moduls "%s". Um alle Logeinträge zu sehen, diese zu exportieren oder zu löschen, nutzen Sie bitte die Ansicht unter "Modul-Connector => Logging"</b><br><br>',
    'D3_CFG_LOG_ACTITEMS'                   => 'Derzeit sind ',
    'D3_CFG_LOG_ACTITEMS1'                  => ' Einträge im D3-Log gespeichert.',
    'D3_CFG_LOG_ACTITEMS2'                  => ' Einträge im D3-Log gespeichert. Deaktivieren Sie unnötige Logeinstellungen bzw. bereinigen Sie die Einträge.',
    'D3_CFG_CLEAN_DEL1'                     => 'Lösche alle Einträge mit folgenden Bedingungen:',
    'D3_CFG_CLEAN_DEL_MODULE'               => 'Module',
    'D3_CFG_CLEAN_DEL_MODULE_ALL'           => 'Einträge aller Module',
    'D3_CFG_CLEAN_DEL_TIME'                 => 'Einträge vor Datum',
    'D3_CFG_CLEAN_DEL_TYPE'                 => 'Priorität',
    'D3_CFG_CLEAN_DEL_TYPE_ALL'             => 'Einträge aller Prioritäten',
    'D3_CFG_CLEAN_DELETE'                   => 'Löschen',
    'D3_CFG_EXPORT_EXP1'                    => 'Exportiere alle Einträge mit folgenden Bedingungen:',
    'D3_CFG_EXPORT_EXP_MODULE'              => 'Module',
    'D3_CFG_EXPORT_EXP_MODULE_ALL'          => 'Einträge aller Module',
    'D3_CFG_EXPORT_EXP_TIME'                => 'Einträge ab Datum',
    'D3_CFG_EXPORT_EXP_SESSID'              => 'Einträge dieser Session (optional)',
    'D3_CFG_EXPORT_EXP_CLASS'               => 'Einträge dieser Klasse',
    'D3_CFG_EXPORT_EXP_CLASS_ALL'           => 'Einträge aller Klassen',
    'D3_CFG_EXPORT_SQL'                     => 'Exportieren als SQL',
    'D3_CFG_EXPORT_CSV'                     => 'Exportieren als CSV',
    'D3_CFG_EXPORT_FILEMESSAGE'             => 'Exportiert nach:',
    'D3_CFG_EXPORT_MAILMESSAGE'             => 'und per Mail versandt',
    'D3_CFG_EXPORT_EXP_MAIL'                => 'an Mailadresse versenden (optional):',
    'D3_LOG_MAIL_SUBJECT'                   => 'Logdaten',
    'D3_LOG_MAIL_NOTSEND'                   => 'Mail konnte nicht versandt werden. Zu versendende Datei: %s',

    'D3_CFG_FIELDTITLE_OXID'                => 'interne Identnr.',
    'D3_CFG_FIELDTITLE_OXSHOPID'            => 'Shop Identnr.',
    'D3_CFG_FIELDTITLE_OXSESSID'            => 'Session ID',
    'D3_CFG_FIELDTITLE_OXLOGTYPE'           => 'Priorität',
    'D3_CFG_FIELDTITLE_OXCOUNTER'           => 'Zähler',
    'D3_CFG_FIELDTITLE_OXTIME'              => 'Zeit',
    'D3_CFG_FIELDTITLE_OXMODID'             => 'Modulident',
    'D3_CFG_FIELDTITLE_OXCLASS'             => 'Klassenname',
    'D3_CFG_FIELDTITLE_OXFNC'               => 'Funktionsname',
    'D3_CFG_FIELDTITLE_OXLINE'              => 'Zeilennummer',
    'D3_CFG_FIELDTITLE_OXACTION'            => 'Aktion',
    'D3_CFG_FIELDTITLE_OXTEXT'              => 'LogText',

    'D3_LOG_CFG_USEEXTLOG'                  => 'erweiterte Logging-Einstellungen verwenden',
    'D3_LOG_CFG_EXTENDED_LOGGING_HELP'      => 'Der Shopbetreiber wählt im Regelfall aus zusammengefassten Loggruppen. Mit dieser Option kann jeder Logmodus einzeln eingestellt werden.',
    'D3_LOG_CFG_ENABLE_ERR_REPORT'          => 'ErrorReporting in internes Logging schreiben',
    'D3_LOG_CFG_ENABLE_ERR_REPORT_HELP'     => 'Im Normalbetrieb werden PHP-Meldungen aus Sicherheitsgründen nicht ausgegeben. Mit dieser Einstellung werden Meldungen in das interne Logging übernommen. Auf die Ausgabe dieser Daten am Bildschirm hat diese Einstellung keine Auswirkung.',
    'D3_LOG_CFG_ENABLE_EXC_REPORT'          => 'Exceptions in internes Logging schreiben',
    'D3_LOG_CFG_ENABLE_EXC_REPORT_HELP'     => 'Ausnahmebehandlungen werden on EXCEPTION_LOG.txt hinterlegt. Zur einfacheren Auswertung können Sie diese zusätzlich auch im internen Logging mitprotokollieren.',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING'      => 'Profiling auch im Adminbereich zeigen',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING_HELP' => 'Der Adminereich stellt das Profiling, welches über die Datei "config.inc.php" aktiviert werden kann, normalerweise nicht dar.',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS'          => 'alle Ausnahmebehandlungen zeigen',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS_HELP'     => 'Im Normalbetrieb werden Fehler unterdrückt und nur im Hintergrund mitgeschrieben. Um eventuelle Fehler schnell zu erkennen, setzen Sie diesen Schalter. Deaktivieren Sie diesen im Anschluss unbedingt wieder!',
    'D3_LOG_CFG_MODULELOGGING'              => 'Umfang des ErrorReportings',
    'D3_LOG_CFG_MAILMESSAGING'              => 'Mailbenachrichtigungen (optional)',
    'D3_LOG_CFG_MAILADDRESS'                => 'Mailadresse',
    'D3_LOG_CFG_MAILERRLEVEL'               => 'ab Fehlerlevel',
    'D3_LOG_CFG_MAILERRLEVEL_NOERR'         => '- kein Mailversand -',
    'D3_LOG_CFG_MAILERRLEVEL_EMERGENCY'     => 'Emergency',
    'D3_LOG_CFG_MAILERRLEVEL_ALERT'         => 'Alert und höher',
    'D3_LOG_CFG_MAILERRLEVEL_CRITICAL'      => 'Critical und höher',
    'D3_LOG_CFG_MAILERRLEVEL_FATALERR'      => 'Fatal Error',
    'D3_LOG_CFG_MAILERRLEVEL_ERROR'         => 'Error und höher',
    'D3_LOG_CFG_MAILERRLEVEL_ALLERROR'      => 'alle "Error" enthaltenden Status',
    'D3_LOG_CFG_MAILERRLEVEL_WARNING'       => 'Warnungen und höher',
    'D3_LOG_CFG_INTERVAL'                   => 'Intervall',
    'D3_LOG_CFG_INTERVALMAX'                => 'maximal alle',
    'D3_LOG_CFG_INTERVALMAX_DAYS'           => 'Tag(e)',
    'D3_LOG_CFG_INTERVALMAX_HOURS'          => 'Stunde(n)',
    'D3_LOG_CFG_INTERVALMAX_MINS'           => 'Minute(n)',
    'D3_LOG_CFG_MAILLASTSEND'               => 'Letzter Versand',
    'D3_LOG_CFG_SAVE'                       => 'Speichern',
    'D3_LOG_CFG_MODULELOGGING_ALL_DESC'     => 'Achtung: erzeugt große Datenmengen!',

    'D3_CFG_LOG_TYPE_NONE'                  => 'no log items',
    'D3_CFG_LOG_TYPE_ERROR'                 => 'errors only',
    'D3_CFG_LOG_TYPE_WARNING'               => 'errors and warnings',
    'D3_CFG_LOG_TYPE_NOTICE'                => 'errors, warnings, notices',
    'D3_CFG_LOG_TYPE_INFO'                  => 'all error and info levels',
    'D3_CFG_LOG_TYPE_USERDEFINED'           => 'user defined',

    'D3_LOGTYPE_EMERGENCY'                  => 'escalating errors (Emergency)',
    'D3_LOGTYPE_ALERT'                      => 'alarming errors (Alert)',
    'D3_LOGTYPE_CRITICAL'                   => 'critical errors (Critical)',
    'D3_LOGTYPE_ERROR'                      => 'general errors (Error)',
    'D3_LOGTYPE_WARNING'                    => 'warnings',
    'D3_LOGTYPE_NOTICE'                     => 'notices',
    'D3_LOGTYPE_INFO'                       => 'general informations (Infos)',
    'D3_LOGTYPE_DEBUG'                      => 'debug informations (Debug)',
    'D3_LOGTYPE_TEST'                       => 'test informations (Test)',
    'D3_LOGTYPE_DESC'                       => '<h4>Log-Level</h4><ul>
                                                <li>Emergency (Fehler) - System ist unbenutzbar (Bsp: alle PHP-Abbrüche zwischen FATAL ERRORs und WARNINGs, keine Modulkonfiguration gefunden)</li>
                                                <li>Alert (Fehler)    - es müssen sofort Massnahmen ergriffen werden (Bsp: Anforderungen nicht erfüllt, erforderliche Berechtigungen nicht vorhanden)</li>
                                                <li>Critical (Fehler)  - kritische Bedingung (Bsp: Zugangsdaten fehlen, wichtige Konfigurationsfehler)</li>
                                                <li>Error (Fehler)    - fehlerhafte Bedingung, sonstige Reaktion, die unerwartete ablaufrelevante Reaktionen auslösen können</li>
                                                <li>Warning	  - Bsp: Falschkonfigurationen, Eingabefehler auf View-Ebene</li>
                                                <li>Notice    - normale, jedoch bedeutsame Bedingung, essentielle Informationen zur Nachvollziehbarkeit von Aktionen (Protokollierung von Start / Ende / grobe Ablaufskizzierung)</li>
                                                <li>Info      - erweiterte Infos zur Nachvollziehbarkeit von Aktionen, statistische Daten</li>
                                                <li>Debug	  - Infos zur Nachvollziehbarkeit von Aktionen inkl. Daten der Aktion (Queries, Transaktionsdaten)</li>
                                                <li>Test	  - eingeschränkte oder speziell für Modutests manipulierte Funktion</li></ul>
                                                <li>Benutzerdefiniert  - über die erweiterten Loggingeinstellungen (aktivierbar in der Log-Bibliothek) wurde eine Log-Kombination eingestellt, die als Gruppe nicht verfügbar ist. Ändern Sie die Gruppe oder aktivieren Sie die erweiterten Loggingeinstellungen erneut.</li>',

);


/*

[{oxmultilang ident="GENERAL_YOUWANTTODELETE"}]


*/

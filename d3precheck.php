<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

/**
 * Alle Anforderungen sind �ber $this->_aCheck konfigurierbar. Manche Anforderungen haben dazu noch weitergehende
 * Informationen. Die Struktur dieser Requirementbeschreibungen:
 *
 * array(
 *      'blExec'    => 1,           // obligatorisch: 0 = keine Pr�fung, 1 = P�fung wird ausgef�hrt
 *      'aParams'   => array(...),  // optional, Inhalt ist von jeweiliger Pr�fung abh�ngig
 * )
 *
 * "Desc1": Diese Struktur kann allein eine Bedingung beschreiben. Wenn mehrere dieser Bedingungen
 * n�tig sind (z.B. bei unterschiedlichen Bibliotheksanforderungen), kann diese Struktur als
 * Arrayelemente auch mehrfach genannt werden (kaskadierbar). Grunds�tzlich sind alle Requirements
 * kaskadierbar, jedoch ergibt dies nicht bei allen Sinn. :) Eine Kaskadierung sieht so aus:
 *
 * array(
 *      array(
 *          'blExec'    => 1,
 *          ...
 *      ),
 *      array(
 *          'blExec'    => 1,
 *          ...
 *      )
 * )
 *
 * Unbedingt zu vermeiden sind �nderungen in der Scriptlogik, da diese bei Updates nur schwer zu �bernehmen sind.
 */

class requConfig
{
    public $sModName = 'D� erweiterte Suche / extended search';

    public $sModId   = 'd3extsearch';

    public $sModVersion = '5.1.1.0';

    /********************** check configuration section ************************/

    public $aCheck = array(
        // kleinste erlaubte PHP-Version
        'hasMinPhpVersion'       => array(
            'blExec'  => 0,
            'aParams' => array(
                'version' => '5.2.0'
            )
        ),

        // gr��te erlaubte PHP-Version
        'hasMaxPhpVersion'       => array(
            'blExec'  => 0,
            'aParams' => array(
                'version' => '5.4.200'
            )
        ),

        // PHP-Version zwischen 'from' und 'to'
        'hasFromToPhpVersion'    => array(
            'blExec'  => 1,
            'aParams' => array(
                'from' => '5.2.0',
                'to'   => '5.4.200',
            )
        ),

        // ben�tigt Zend Optimizer (PHP 5.2) bzw. Zend Guard Loader (> PHP 5.2)
        'hasZendLoaderOptimizer' => array(
            'blExec' => 1,
        ),

        // ben�tigt IonCubeLoader
        'hasIonCubeLoader'       => array(
            'blExec' => 0,
        ),

        // ben�tigt PHP-Extension (kaskadierbar (siehe "Desc1"))
        'hasExtension'           => array(
            array(
                'blExec'  => 0,
                'aParams' => array(
                    'type' => 'curl',
                ),
            ),
            array(
                'blExec'  => 0,
                'aParams' => array(
                    'type' => 'soap'
                ),
            ),
        ),

        // minimal ben�tigte Shopversion (editionsgetrennt), wird (sofern m�glich) Remote aktualisiert
        'hasMinShopVersion'      => array(
            'blExec'  => 1,
            'aParams' => array(
                'PE' => '4.7.0',
                'CE' => '4.7.0',
                'EE' => '5.0.0'
            ),
        ),

        // maximal verwendbare Shopversion (editionsgetrennt), wird (sofern m�glich) Remote aktualisiert
        'hasMaxShopVersion'      => array(
            'blExec'  => 1,
            'aParams' => array(
                'PE' => '4.8.0',
                'CE' => '4.8.0',
                'EE' => '5.1.0'
            ),
        ),

        // verf�gbar f�r diese Shopeditionen, wird (sofern m�glich) Remote aktualisiert
        'isShopEdition'          => array(
            'blExec'  => 1,
            'aParams' => array(
                array(
                    'PE',
                    'EE',
                    'CE',
                ),
            ),
        ),

        // ben�tigt Modul-Connector
        'hasModCfg'              => array('blExec' => 1),

        // ben�tigt mindestens diese Erweiterungen / Version lt. d3_cfg_mod (kaskadierbar (siehe "Desc1"))
        'hasMinModCfgVersion'    => array(
            array(
                'blExec'  => 1,
                'aParams' => array(
                    'id'      => 'd3modcfg_lib',
                    'name'    => 'Modul-Connector',
                    'version' => '3.9.0.0',
                ),
            ),
            array(
                'blExec'  => 1,
                'aParams' => array(
                    'id'      => 'd3install_lib',
                    'name'    => 'Installationsautomatik',
                    'version' => '2.5.0.0',
                ),
            ),
        ),

        // verwendbar bis zu diesen Erweiterungen / Version lt. d3_cfg_mod (kaskadierbar (siehe "Desc1"))
        'hasMaxModCfgVersion'    => array(
            array(
                'blExec'  => 0,
                'aParams' => array(
                    'id'      => 'd3modcfg_lib',
                    'name'    => 'Modul-Connector',
                    'version' => '3.9.0.5',
                ),
            ),
        ),
    );
}

/********* don't change content from here **********************/

date_default_timezone_set('Europe/Berlin');

/**
 * Class requcheck
 */
class requCheck
{
    public $sVersion = '4.0';

    protected $_db = false;

    public $dbHost;

    public $dbUser;

    public $dbPwd;

    public $dbName;

    /** @var requConfig */
    public $oConfig;

    /** @var requLayout */
    public $oLayout;

    protected $_sInFolderFileName = 'd3precheckinfolder.php';

    /********************** functional section ************************/

    public $blGlobalResult = true;

    /**
     *
     */
    public function __construct()
    {
        $this->oConfig = new requConfig();
        $this->oLayout = new requLayout($this, $this->oConfig);
        $this->oRemote = new requRemote();
    }

    /**
     * @param string $sName
     * @param array $aArguments
     */
    public function __call ($sName, $aArguments)
    {
        $this->oLayout->{$sName}($aArguments);
    }

    public function startCheck()
    {
        $this->oLayout->getHTMLHeader();

        $this->_runThroughChecks($this->oConfig->aCheck);

        $this->oLayout->getHTMLFooter();
    }

    /**
     * traversable requirement check
     *
     * @param        $aCheckList
     * @param string $sForceCheckType
     */
    protected function _runThroughChecks($aCheckList, $sForceCheckType = '')
    {
        foreach ($aCheckList as $sCheckType => $aConf) {
            if (array_key_exists('blExec', $aConf)) {
                if ($aConf['blExec']) {
                    if (strlen($sForceCheckType)) {
                        $sCheckType = $sForceCheckType;
                    }
                    $this->displayCheck($sCheckType, $aConf);
                }
            } else {
                $this->_runThroughChecks($aConf, $sCheckType);
            }
        }
    }

    /**
     * @param      $sMethodName
     * @param null $aArguments
     *
     * @return array
     */
    public function checkInSubDirs($sMethodName, $aArguments = null)
    {
        $sFolder = '.';

        $aCheckScripts = $this->_walkThroughDirs($sFolder);
        $aReturn       = $this->_checkScripts($aCheckScripts, $sMethodName, $aArguments);

        return $aReturn;
    }

    /**
     * @param $sFolder
     *
     * @return array
     */
    protected function _walkThroughDirs($sFolder)
    {
        $aIgnoreDirItems = array('.', '..');
        $aCheckScripts = array();

        /** @var SplFileInfo $oFileInfo */
        foreach (new RecursiveDirectoryIterator($sFolder) AS $oFileInfo) {
            if (!in_array($oFileInfo->getFileName(), $aIgnoreDirItems) && $oFileInfo->isDir()) {
                $aCheckScripts = array_merge($aCheckScripts, $this->_walkThroughDirs($oFileInfo->getRealPath()));
            } elseif ($oFileInfo->isFile()) {
                if (strtolower($oFileInfo->getFilename()) == $this->_sInFolderFileName) {
                    $aCheckScripts[] = str_replace('\\', '/', $oFileInfo->getRealPath());
                }
            }
        }

        return $aCheckScripts;
    }

    /**
     * @param $aScriptList
     * @param $sMethodName
     * @param $aArguments
     *
     * @return array
     */
    protected function _checkScripts($aScriptList, $sMethodName, $aArguments)
    {
        $aReturn = array();

        foreach ($aScriptList as $sScriptPath) {
            $sUrl                                       = $this->_getFolderCheckUrl(
                $sScriptPath,
                $sMethodName,
                $aArguments
            );

            $aReturn[$this->getBasePath($sScriptPath)] = unserialize(file_get_contents($sUrl));
        }

        return $aReturn;
    }

    /**
     * @param $sScriptPath
     * @param $sMethodName
     * @param $aArguments
     *
     * @return string
     */
    protected function _getFolderCheckUrl($sScriptPath, $sMethodName, $aArguments)
    {
        $sBaseDir = str_replace(
            array(basename($_SERVER['SCRIPT_FILENAME']), '\\'),
            array('', '/'),
            realpath($_SERVER['SCRIPT_FILENAME'])
        );
        $sUrlAdd  = str_replace($sBaseDir, '', $sScriptPath);
        $sBaseUrl = 'http://' . $_SERVER['HTTP_HOST'] . str_replace(
                basename($_SERVER['SCRIPT_NAME']),
                '',
                $_SERVER['SCRIPT_NAME']
            );

        $sUrl = $sBaseUrl . $sUrlAdd . '?fnc=' . $sMethodName . '&params=' . urlencode(serialize($aArguments));

        return $sUrl;
    }

    /**
     * @param null $sFolder
     *
     * @return mixed
     */
    public function getBasePath($sFolder = null)
    {
        if (!$sFolder) {
            $sFolder = $_SERVER['SCRIPT_FILENAME'];
        }

        $sScriptFileName = str_replace('\\', '/', realpath($_SERVER['SCRIPT_FILENAME']));
        $sSearch         = substr(str_replace(basename($sScriptFileName), '', $sScriptFileName), 0, -1);

        $sFolder = str_replace('\\', '/', realpath($sFolder));

        return str_replace(array(basename($sFolder), $sSearch), '', $sFolder);
    }

    /**
     * @param $aResult
     *
     * @return bool
     */
    protected function _hasFalseInResult($aResult)
    {
        if (is_array($aResult)) {
            foreach ($aResult as $blResult) {
                if (!$blResult) {
                    $this->blGlobalResult = false;

                    return true;
                }
            }

            return false;
        } else {
            if (!$aResult) {
                $this->blGlobalResult = false;
            }

            return !$aResult;
        }
    }

    /********************** conversion function section ************************/

    /**
     * @param $mParam
     */
    public function aTos(&$mParam)
    {
        if (is_array($mParam)) {
            $mParam = implode($this->oLayout->translate('or'), $mParam);
        }
    }

    /**
     * @return string
     */
    public function getLang()
    {
        if (isset($_REQUEST['lang'])) {
            return strtolower($_REQUEST['lang']);
        }

        return 'de';
    }

    /**
     * @return bool|resource
     */
    protected function _getDb()
    {
        if (!$this->_db) {
            if (file_exists('config.inc.php')) {
                require_once('config.inc.php');
                $this->_db = mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd);
                mysql_select_db($this->dbName, $this->_db);
            }
        }

        return $this->_db;
    }

    /**
     * @param     $version
     * @param int $iUnsetPart
     *
     * @return string
     */
    public function versionToInt($version, $iUnsetPart = 0)
    {
        $match = explode('.', $version);

        return sprintf(
            '%d%03d%03d%03d',
            intval($match[0] !== null ? $match[0] : $iUnsetPart),
            intval(
                $match[1] !== null ? $match[1] : $iUnsetPart
            ),
            intval($match[2] !== null ? $match[2] : $iUnsetPart),
            intval(
                $match[3] !== null ? $match[3] : $iUnsetPart
            )
        );
    }

    /********************** layout function section ************************/

    public function deleteme()
    {
        $sFolder = '.';

        $this->_checkDelFilesInDir($sFolder);
        $this->_delFile($_SERVER['SCRIPT_FILENAME']);

        if (is_file($_SERVER['SCRIPT_FILENAME'])) {
            exit($this->oLayout->translate('unableDeleteFile'));
        } else {
            exit($this->oLayout->translate('goodBye'));
        }
    }

    /**
     * @param $sFolder
     */
    protected function _checkDelFilesInDir($sFolder)
    {
        $aIgnoreDirItems = array('.', '..');

        /** @var SplFileInfo $oFileInfo */
        foreach (new RecursiveDirectoryIterator($sFolder) AS $oFileInfo) {
            if (!in_array($oFileInfo->getFileName(), $aIgnoreDirItems) && $oFileInfo->isDir()) {
                $this->_checkDelFilesInDir($oFileInfo->getRealPath());
            } elseif ($oFileInfo->isFile()) {
                if (strtolower($oFileInfo->getFilename()) == $this->_sInFolderFileName) {
                    $this->_delFile(str_replace('\\', '/', $oFileInfo->getRealPath()));
                }
            }
        }
    }

    /**
     * @param $sPath
     */
    protected function _delFile($sPath)
    {
        unlink($sPath);
    }

    /**
     * @param $sCheckType
     * @param $aConfiguration
     */
    public function displayCheck($sCheckType, &$aConfiguration)
    {
        $sGenCheckType = preg_replace("@(\_[0-9]$)@", "", $sCheckType);
        $oTests = new requTests($this, $this->oConfig, $this->_getDb(), $this->oRemote);

        if (method_exists($oTests, $sGenCheckType)) {
            $aResult = $oTests->{$sGenCheckType}($aConfiguration);
            $sElementId = (md5($sGenCheckType . serialize($aConfiguration)));

            if ($this->_hasFalseInResult($aResult)) {
                $this->oLayout->getNoSuccessItem($aResult, $sElementId, $sCheckType, $aConfiguration);
            } else {
                $this->oLayout->getSuccessItem($aResult, $sElementId, $sCheckType, $aConfiguration);
            }
        } else {
            $this->oLayout->getUncheckableItem($sCheckType, $aConfiguration);
            $this->blGlobalResult = false;
        }
    }

    public function showinfo()
    {
        phpinfo();
    }
}

/**
 * Class requLayout
 */
class requLayout
{
    public $oBase;
    public $oConfig;

    /**
     * @param requCheck  $oBase
     * @param requConfig $oConfig
     */
    public function __construct(requCheck $oBase, requConfig $oConfig)
    {
        $this->oBase = $oBase;
        $this->oConfig = $oConfig;
    }

    public function getHTMLHeader()
    {
        $sScriptName      = $_SERVER['SCRIPT_NAME'];
        $sTranslRequCheck = $this->translate('RequCheck');
        $sModName         = $this->oConfig->sModName;
        $sModVersion      = $this->oConfig->sModVersion;

        echo <<< EOT
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
            <html>
                <head>
                    <title>
                        $sTranslRequCheck "$sModName" $sModVersion
                    </title>
                    <style type="text/css">
                        <!--
                        body {background: #FFF url($sScriptName?fnc=getGifBg) repeat-x; font: 13px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;}
                        .btn_1 {background: url($sScriptName?fnc=getPngButton) no-repeat scroll right 0; height: 22px; padding: 0 3px 0 0; float: left; margin-bottom: 10px;}
                        .btn_2 {background: url($sScriptName?fnc=getPngButton) no-repeat; height: 22px; color: white; font-weight: bold; line-height: 1; display: block; padding: 4px 5px 0px; text-decoration: none; font-family: Verdana; font-size: 12px;}
                        #logo {position: absolute; top: 10px; right: 30px;}
                        .box_warning { text-align: center; background-color: DarkRed; border: 1px solid black; color: white; font-weight: normal; padding: 1px;}
                        .box_ok { text-align: center; background-color: DarkGreen; border: 1px solid black; color: white; font-weight: normal; padding: 1px;}
                        .box_warning a, .box_ok a {font-weight: bold; color: white;}
                        .squ_bullet {float: left; height: 10px; width: 10px; border: 1px solid black; margin: 0 5px 0 50px;  display: inline-block;}
                        .squ_toggle {font-size: 15px; line-height: 0.5; cursor: pointer; float: left; height: 10px; width: 9px; padding-left: 1px; border: 1px solid black; margin: 0 5px 0 3px;  display: inline-block;}
                        -->
                    </style>
                </head>
                <body>
                    <a href="http://www.oxidmodule.com/"><img id="logo" src="$sScriptName?fnc=getPngLogo"></a>
                    <a href="$sScriptName?lang=de"><img src="$sScriptName?fnc=getGifDe"></a> <a href="$sScriptName?lang=en"><img src="$sScriptName?fnc=getGifEn"></a>
EOT;
        echo "<h3>" . $this->translate('RequCheck') . ' "' . $this->oConfig->sModName . ' ' . $sModVersion . '"</h3>';
        echo '<p>' . $this->translate('ExecNotice') . '</p>' . PHP_EOL;

        return;
    }

    public function getHTMLFooter()
    {
        $sScriptName        = $_SERVER['SCRIPT_NAME'];
        $sTranslShopPhpInfo = $this->translate('showPhpInfo');
        $sTranslDependent   = $this->translate('dependentoffurther');

        if ($this->oBase->blGlobalResult) {
            echo '<p class="box_ok"><b>' . $this->translate('globalSuccess') . '</b>' . $this->translate(
                    'deleteFile1'
                ) . $sScriptName . $this->translate('deleteFile2') . '</p>';
        } else {
            echo '<p class="box_warning"><b>' . $this->translate('globalNotSuccess') . '</b>' . $this->translate(
                    'deleteFile1'
                ) . $sScriptName . $this->translate('deleteFile2') . '</p>';
        }

        echo <<< EOT
            <sub>$sTranslDependent</sub><br>
            <p>
                <span class="btn_1">
                    <a href="#" class="btn_2" onClick="document.getElementById('phpinfo').style.display = document.getElementById('phpinfo').style.display == 'none' ? 'block' : 'none';">$sTranslShopPhpInfo</a>
                </span>
            </p>
            <iframe id="phpinfo" src="$sScriptName?fnc=showinfo" style="display:none; width: 100%; height: 700px;"></iframe>
              </body>
              </html>
EOT;

        return;
    }

    /**
     * @param $aResult
     * @param $sElementId
     * @param $sCheckType
     * @param $aConfiguration
     */
    public function getNoSuccessItem($aResult, $sElementId, $sCheckType, $aConfiguration)
    {
        echo "<div class='squ_bullet' style='background-color: red;' title='" . $this->translate(
                'RequNotSucc'
            ) . "'></div>" . $this->_addToggleScript($aResult, $sElementId) . $this->translate(
                $sCheckType,
                $aConfiguration
            ) . "<br>" . PHP_EOL;

        $this->getSubDirItems($aResult, $sElementId);
    }

    /**
     * @param $aResult
     * @param $sElementId
     * @param $sCheckType
     * @param $aConfiguration
     */
    public function getSuccessItem($aResult, $sElementId, $sCheckType, $aConfiguration)
    {
        echo "<div class='squ_bullet' style='background-color: green;' title='" .
            $this->translate('RequSucc') . "'></div>" .
            $this->_addToggleScript($aResult, $sElementId) .
            $this->translate(
                $sCheckType,
                $aConfiguration
            ) . "<br>" . PHP_EOL;

        $this->getSubDirItems($aResult, $sElementId);
    }

    /**
     * @param $sCheckType
     * @param $aConfiguration
     */
    public function getUncheckableItem($sCheckType, $aConfiguration)
    {
        echo "<div class='squ_bullet' style='background-color: orange;' title='" .
            $this->translate('RequNotCheckable') . "'></div>" .
            $this->translate($sCheckType, $aConfiguration) . " (" . $this->translate(
                'RequNotCheckable'
            ) . ")<br>";
    }

    /**
     * @param $aResult
     * @param $sElementId
     */
    public function getSubDirItems($aResult, $sElementId)
    {
        if (is_array($aResult) && count($aResult)) {
            echo "<div style='margin-left: 20px; display: none;' id='" . $sElementId . "'>";
            foreach ($aResult as $sPath => $blResult) {
                if (!$blResult) {
                    echo "<div class='squ_bullet' style='background-color: red;' title='" . $this->translate(
                            'RequNotSucc'
                        ) . "'></div>" . $sPath . "<br>";
                } else {
                    echo "<div class='squ_bullet' style='background-color: green;' title='" . $this->translate(
                            'RequSucc'
                        ) . "'></div>" . $sPath . "<br>";
                }
            }
            echo "</div>" . PHP_EOL;
        }
    }

    /**
     * @param $aResult
     * @param $sElementId
     *
     * @return string
     */
    protected function _addToggleScript($aResult, $sElementId)
    {
        if (is_array($aResult) && count($aResult)) {
            $sScript = "<div class='squ_toggle' title='" . $this->translate(
                    'toggleswitch'
                ) . "' onClick='document.getElementById(\"" . $sElementId . "\").style.display = document.getElementById(\"" . $sElementId . "\").style.display == \"none\" ? \"block\" : \"none\"; this.innerHTML = document.getElementById(\"" . $sElementId . "\").style.display == \"none\" ? \"+\" : \"&minus;\";'>+</div>";
        } else {
            $sScript = "";
        }

        return $sScript;
    }

    /**
     * @param       $sIdent
     * @param array $aConfiguration
     *
     * @return mixed|string
     */
    public function translate($sIdent, $aConfiguration = array())
    {
        $sGenIdent = preg_replace("@(\_[0-9]$)@", "", $sIdent);
        $oTranslations = new requTranslations();
        $aTransl   = $oTranslations->getTranslations();

        if (isset($aConfiguration['aParams']) && is_array($aConfiguration['aParams'])) {
            array_walk($aConfiguration['aParams'], array($this->oBase, 'aTos'), $sIdent);
        }

        if (($sTranslation = $aTransl[$this->oBase->getLang()][$sGenIdent])) {
            if (isset($aConfiguration['aParams'])) {
                return vsprintf($sTranslation, $aConfiguration['aParams']);
            } else {
                return $sTranslation;
            }
        } else {
            return $sGenIdent;
        }
    }

    public function getPngButton()
    {
        $sImg = "iVBORw0KGgoAAAANSUhEUgAABDgAAAAWCAYAAAAl+SzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABMpJREFUeNrs3Y1O4zgUhuFY4hbb2ZthRjtczOz0Ght7cZwfQ5u2E4K0a55XiNDUXyWcT+ZwfGyHw+HQvZI6AACAT+J0OgW9AAAAtnA8Hh/JWYSnbkxuvAYeeg0AAAAAAPynuJevOB6P+ZKe6sYvLy96DgAA7M7z87NOAAAAm7iVq8gxRs5p5CTH03Tz758/uzAUc7x+Hy4pf71ex9fDj2leyxLG1vnNELpmdJPqo21a7afy+/MIj/AIj7zVhS/seWPD4zoAAIAtxJhW44+cy/jx/ftw/2kRxDEQSd0Uraah/RKVlLfK+/kDS0T7eieGZnTdA33QfeF+CpFHeIRHeORSF1Lw3I0Nd3UAAACbEhwprscfadnma05wpL7v8v0Sh4QiLimREqWEt7mSmK9xnLlrSBe6fdq02k9D1oxHeIRHeORCFz13Y8NtHQAAwNYER+zX44+q3Zzg6GOcbw6haqhmXG5MvuQPiw3q9mrTaj/xCI/wCI9c13juxoY/0wEAANxNcPTxbvzxLsHRd7mEo8y+pJIFCWEupy2XMTcSxjKQUMqSl1mb/79urzbN9hOP8AiP8MgV3Zf2vLHhIR0AAMBWcr5iNf6o4owlwdGPCY68hiUsZbRh2DGsWkz7/mUaVl83oxu3R/xwm1b7KfEIj/AIj1zRDfc9d2PDTR0AAMA2hgqOtfijWqOybDKaExzj6pVpzWyYG04zdGn5vByohVC924ou7NSm3X7iER7hER55r/P3w9jw6NgAAADwp+SCjPX442oFR5URWeaY5pKPsmNpmI+SnctN5zKRVnR7tWm1nwKP8AiP8MiKznM3NqzrAAAANic4zuf1+ONaBce576dQZAhMplPepvWzYdn6vSoBCUNJSCkPaUS3V5tm+4lHeIRHeORS97U9b2x4RAcAALA5wZEPRVmJP1K4ckxsPJ/H9SzjOvpuEc11INP805gtWQ6Ka0gXdmrTaD8NGTMe4REe4ZFrOs/d2HBLBwAAsJHzuV+PP6qJlKqCI3ZdvaZliVGm3MiYKZm3EJuvXera0aW0T5tG+2kKYHmER3iER2pdU8/Pc/+0sQEAAGALec/Q9fjjSgVH358v/zFZJNXy6ukYuFQqREZBK7q0U5tm+4lHeIRHeOSqLnnuxoa7YwMAAMAWzvF8M/64THDEOB+xEsYIJlV7d5R1tdNGHsMnlvW2I63opirrj7Zptp86HuERHuGRS92X9ryx4cGxAQAAYBv5mNi1+OP6HhzDMbEVad5JrKoxrdbfzlFa155urzYt9lPgER7hER658bt47saGVR0AAMA28ikqj8QfVQVH3705ceU1KEm5qmM+0y7N8crwOqY5a5Ja0sWd2jTaTykmHuERHuGRS52/H8aGuzoAAIBtxCGIWok/riU4Yl8EZVOwEpSUG9X62XmRS1w+oV5z24RurzaN9tO0QR6P8AiP8MgbnedubLitAwAA2EqfExo34o+LBMevX7+6b9/+KkFItYZlmI0tP1XBS3UE3LhNeju6vdq02k8dj/AIj/DIhW48W8NzNzbcHBsAAAC2MGypsRJ//P7n9/J/yOFwGO6fTie9BgAAPgvrVAAAwFZuzpgcj8fh+jQGHGm6AQAAsDcmUgAAwFYezFeEfwUYAAoCUXB0RZrTAAAAAElFTkSuQmCC";
        header("Content-type: image/png");
        echo base64_decode($sImg);
        exit;
    }

    public function getPngLogo()
    {
        $sImg = "iVBORw0KGgoAAAANSUhEUgAAADMAAAA0CAYAAAAnpACSAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAEIxJREFUeNq8Wgl4VNXZfu+dLZkkk5BA9kACYQlB2aIga6myuIEtFX+kLW1BJVT/akVrRds+rVqRX2lLRSsal5/nUaCgtmhi8BeaUhAl7EYTIWyGQPZlMsnM3Lnn/865dzJ3biaLVnsfDpk59yzf++3fOSMxxvANPlZqUdQs1FRqXmq+Ac7NpbaI2jxqQ6nZqDVR+z9qr1H71DxB+nfBPHYYSHUCK8fATl+HUZtK7Wpqo1SGeZ0BQCEYFolQETSrhDJ6d4rax9Q+pFa18SQ8HX6aHAcszUUS9T3U0IU1710ASqiddwNuBciMARbSDjcQtDQnnnj7HNYuGvY1gqHnW9RWBBi+f7kT+LwVKG8AjlDj38+0AR1EiJ1kk0XEZFAbO4gQJwOj44F0+m6TsYvWKKKWQOQUvVwFPHCAxNBlZDs1psk30wXsv4XWi8VvqefXXwcYWg6FRPy8racBzsXjjQxtXim4sra5bKCG6X3QCLOR4lxBwGakS1g+ChhORN5FcttWpSumpCunZADEH5L2iATa71bAaUUW9XzxVcEs4yCq2zD9qaMML1QQXQGdaMmwYW8PM41RQxwvmgu0+yU8Qap7uUMbN59UykUKXF4P0J5hgD4gi5qTjuW6DQkDHehDfMNvLnbgvp/vV7GdpKEGdA5aTMRiAIAQDj6HJHR7rgyHBc+T/a16jaQzNFbYB0FDXa0HC0a+QSrrD82J1qj3G73NQJ6buTT+eppdf+cehuauCCCCLDeDkcwAWM8xjA+T8JcKxp3FKu4oFGLUOZJEpyJNIqKfpP4F/kBI9bLIWUxIErPLvozNFLb5sOmRgwwbj6kaMbIUrjJMJzIIRooAUOpNzwzdAcMX+hfvlFC6UEaCQ8K0N4FGrzbVQuM+InuZNBjruOcLzpL7AbLSr2LT0lIVG8tpBZnpxDOtwfgX4X2snz5z4y8swaYRfWM2+fhkaS/3gotyqE/RVGnrAgHkz6daQ0D6A8Mlsvm24gDerSYgNhaZiP4avvq4giFCgkdJzZa+MAv442zCQxby9hmgK4C7c+MxZCBgZtJam24tVvBmlS4RhoERaH6nRhpvkg4FKfipKXrj32nPjy+p+NsZ9d4WL16noPvTu/OBuSSt/z1BaUCNoPN2c7phfhJoqbLfk1qVconwEUw3DEm3L1Xq3W0x9Ix0TDLnHTpwzZ5W5MsYP1gCqTSsxN5jFK+KTgbweiW1ChXzhksoXmh7lkx11Vvz8fxsCsaXOsVKI/sD84t3z6pYu5fkaZdCXJUkLSbQd56aWCQz5ZLJ57Juwn3csFV9jaDDCeoEfX+owIbceGmT3qseqmOri44oWjam8vmWoMt4iYJk/Pb5WPdpi/h+vC8wszwKHrpzt08zRE4Ql4LEwqL39httGJckD8in8yleUhs7sfVsG8MFN0PJ2QB2nAp0A/RrXmzrU+VK2YOTrWlXJEmr7y2w4C0ac90wGQ8UWPmwe1+pCCg/GmvZnO7EOovmPZ19gSn8w2E/LraomlRUg6fSmc0lMi1NRopTmjCAeB+UFN80YfQgiUeGoSvzLXMrm9nsxw76sOWYQvmbirxEy3i3j5Vtr1Jqbx1lXbBhtq3wd9Nsi2JteIfmPPer/b53HCKuWZafa2dYuduLD74XtYHo2UKdDeY4c2t1K9s2qsgj7E8I3Kw11AZFEYdXRlOKIZEp4tzsHT4Rdny6vrtINdq8DA76nEBjaygtSaIi4Hu5FhSfU9FFBs6Xeusm+xKyka1PH/LjUJ2KN25w8PlLlhd3bR8WL2Goy4qV4yxxtxd72/laL893pNK0R4/Vq6t/VOLF0Ysqdi6OwndyLb+i/t+ZwXxw127vnBdIMkJXI5kAETwxRcZHy5x8Y/L+8NyyywdKNZBNEfm2kTJON6nYVulHTryMKekyTjWrpGYS8pOtKK9jcJPX4uBHJkhYP8M2nta4Z8Nh/4r9NQG8OM+BeIf0Z+qjZAluPceglBJ5LV62nIeIHxZ3IaDncwUZRMtSJ1dBXn74g2AyPH72Re5LHtS2q707bNLtFRNstGnUe/RtAe96eJ8PWS4Z01IlJJIEslwWzsEMPWequ39P16Wq5gAmJVuQ6LTgIAFqpkienyhhIsWRZWOskzv87FD28x1IiqHsOd+GkYNkwYxOkmJFYwDnyda2fKrgXLMalkJxs65cGUMZtHw9fS0J2sxtB2oDqG0OaFLpLcOhtaani9WOBrsmEEH5SZoRE5ApRNiHfHOeBA6mdOTpOVH/omGbHz/Q9Wqak+HaDF5sSeRAJMTSmLdPKeWLcq3/s+E6x5of7PTg4fqApgnBPCyo7rJJ9fkQkvLm4z48OSuqkIORdYBPFx33adT2E6XzNS92LLhgLXmnd6sV7D6naA6k3IsrX2xHXlE7xtDfJX/zTP/7aeWVtddEbeK2aJd5ccZQ5w5QUAzgRL1wZe9clWKBhTNS1uOZVU9tJC2ARgzUtNZrn/hBWrWQawOnLLexk2FnpU+P9KrWVL0xHSB9jqINsuPlcP9O72Ta6IGrHXz28rLzCmW8ZOjkEWrIS23/xIuFW9txsFYpXJpnX9alcAdBCkBuKI8YMzpRrFeV5ZIwhNRMeB/VkD2YswlVDX0moLXNCg5fFgy5lq805RSpV1eXakozQh5MW4QhJ0HmBsonng9iibNrHo6e5E4S+4l6xRDhma4aDH85Is4xttwx3i4pKhMSaupUcdktInGHhazYaWEh5jHdylUWYm7QWQXfiX6GDy8KrZjFt5q274ISmsQMC+iDxV/i2NQ0UTy9T3Pag2AoNqDdKzbJqyHCLrUEQioRlC6BO3rJL9IVeuzbKrzYd8GHzFgJmXGCEVHcEfkUfT+oBimo4RIS/dDX1hi274Koz/K5Axj+aYMSLo1IyRZNLEgT/uKk8e2JOiVY3ow7SfrPWITii/ClkApZtXHKt4dZyVMBu075hI3fMsqeQK6X1C8oDUOKFFbMRfBMNKShQ0xwceoyq5uVUKTv45mcIsB8ZOzjbjR4znW+lajmQUAyJQYEMI3AUHfxmvfdAU5ffLQMa7SkxQyiodFDYDyqyWP1TxN/39wpbIY7R8R+wYmQ+phIxEhESZJTEHnW+CrZKWvSJuY3dhhUwpjpUN+0DMGIE7F2SbzxikyABaU66bNGJZwRPQrSCBWqTm9rl+CIg+9gc3sD4VxgekWJUJYbbZMQL7JoLQ8KPpfd3bXu0MpGv67v4SUCp2/BCB6ksWtyqlW84XbmJ5A6eXNLT3t1G5HCj6UkYwkSQdXoq0870pA5GCWaK7MaiFCHsO4Jg0klXJonazKudY4MftONLhflXNccqfUb0iCdEiL427kOpMeJYHuwneyCM2bEIC2UT820pdPcubsqO00luYEh3bWP2rPaoC82jSMqB+PmXuVMAzOkMSaVI0/GOWrXLLjZCGZ6lk2YTksXw1kuGWbkHmcbw9oZMVydVq/bx30f6bWdZwxM0EhgZleQO7/YpIiz25DxM5PNs8jaRovEOwThPv5/3XDOpUAf0Z+4Oz5VFEgvw7CdiHYNQsbjqgiI32+I1Dz4UeBcPT0Gs7MdfMyr1w53YA595mVEdVNASJWeG3dUdA7gnEANxa4wV60iMVqg6+CSqbwy2TpLGxDpiEjrvzpD6Pwhs29QNOv/1t5q0nmeoAU0I3GRY1g3LwF3XhXLpbL4klv1pMVS8kiAp2TYxHYFGfZC8oDLNvyjLfycofusTYrgBGAoxTU3nqw5plYO5vDkdLsehCTzyZwYzA147BBbjxgjDpzH8BsLfD5miBX/PTMOIxKtGE2fx6fakRpneYberW/wqJeaPAGUVXfiDIWBRfkxmDbUMZyEt+mON5vQyYshrviqGgIhzEENnTWHqZehwCKveGWKoO0MB1PGCXGS3/fwRU14eEuLt5BbFnrZ404kWTPs55aMc4LaOPrcoo8rXfxGY+WDM1y42OrDsYteECjUk/smIHzfNa8dcaP0kw5DVduLvZj/Gg2aNGdOjlDjUr7oZ8mxFszKtqOkwoNgmDZG7/GpNsRoLqPRDGZLeTsWXxnbvPGA+4nPyYhvGBklJMklQCUvPr7QiaM1XRgcQw6EjGXr7ckjaNr9JVWdhT/ZWq/t91VvImhabJSM8WnCBMqs+sHR2nuuiXu85AQVdxZTZUa6MGuYgxP4qtn4+fPI2/XYdqwdflKNFkocm1u9WDIhFh2Ur2TGyGij6Gwho+FG/8xNSYXkhje9Wu7Gqh31+jFvX1Ge9X3MQPZ3x4w4Ks/lYl6dBouz12dmRz3u4pt7TekIcW1iukB+JOKC5BaPX/B2B7RaovGmPCc2Lx7CjYnfnUzmHpxaweEa79Sf72rEP6o6Q0cprD+6+5Aa0baiIE4cQRlPZ87EOeR/fndczMxXPmwVV1lBjsmkBukihcN8vYWv91RupN1jKY7MaqE0o5pc9p7TnaRuXuw82aHZRlCVVaPn6hFA+pYKacyEoVEYM0QwusR81PTcfTPjZ76yv8WwicaV1TvqqG6hOtvSvxZwT+4iPa5u8uOzOj/aOgIhB8TVStbT9+50KZzT3QeO/YmMnFXhVBe3ij/xGGM+neGlkbK2uBG/L2nQ6lvzxVAk8RuPXoMMUAz1u3lymJs1EGrsY4aBkhR+tyOCG9VWOdHYuzqLskspjzsx88F5gKZd//C1gxDH3XBADVV0YOFltKqGru/CxhjuMSVT9A5O6C7F1fCC0Fh4ITzCh0V+vRX9VyoH8mAQSKRbgJJYu/yHjd9NoRw9SDALJ5gZozALVw9jqmGu9LqBm3I/4x1ON1NgcJyGdflDdK2aOQh5yfb3j9d61/d3pfHsD69y4Z7rEvkhsYGDhvMAY3ltrtG736H3iyUjk4xSCkoNxvMIA1hfAFdkReGZRcnCxr1KeKSIBOYUqdt31t+cjGtyozUJhXE/Aje7uWzipvlkxaiW5kOTsLXR82SGCOfZxnuFWbyEeKS6wbeTHyoO5LLpLdLHNcWFw5Cf6dAlFEG/zX2RiOhxCYWBXVIhHAgv6fb8LBtpLutTlXW+x/nhiBLAgMDw5+n4KPnRsp/lYPrIGHHvFvn2DF/t2m+gjVxwOuWGx9fmYmyK49mqOt8veiO4v0uWx0iU979LElo+fZAmIfVrJraPGorvN2loNPbdNxx5KY4n/3nac3dfxA7kxugZCoJLX1qWgUdvTtESTkWNcIJi0vkw2zGU0oz19GbmrEXRwPxgWiL23puDnCT7w6WfuX/Z7y3Ql/i5Cc+vCmta/Mt+vOUCdp9s1wKaBaHAJvXyK4w+k0jDxIBWoU7KceLF72diYmb0Xu61XtjftC070U6GLyMlzhqGe3Sy/d/6VdMqX4A9V/xJO/60pwF7PneD+fXfYMkSvvTDdBA0dSKp1E9IGsunJCIuSv7liwean+QXWLQfvikw4oiZ2l2kCetP13vx+qEWvHygUTvQ0AnrBiYhdDFrVCk9/0uItWJpQYIAcUV6NI/qfxTS+FdTJT+rs1m+eTDBx6ar353tXnXpR2c94O3QeQ9qWv3ooBjVTIkmJ8ZG4FxUzbqiLUgmABMyojBleAymZDsxJNZayu9wqO3+bfHl1iQq5PgtwX8ajPFJ039IN4faWP36Llb/WaOs5yc+PcNt1a/6+I94PuBnCF8HAf8vwADS7GaT0D4fMwAAAABJRU5ErkJggg==";
        header("Content-type: image/png");
        echo base64_decode($sImg);
        exit;
    }

    public function getGifBg()
    {
        $sImg = "R0lGODlhCgAyANUAANHo+pfK85rM8/X6/vb6/v///5jL85bJ8+Hv/KbS9dzt+87m+qTR9fH4/er1/b7e+MTh+P3+/63V9u/3/dfq+rnc97fa96DP9Nns+53N9LLY9tTp+sHg+Mzl+cfi+OPx/Pv9/7DX9p/O9Oz2/bTZ9uXy/KLQ9Pj7/ujz/bzd9/7+//r8//P5/snj+ZvM897u+6nT9avU9qvU9QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAAKADIAAAbFwINwSAwYj0iDcskUOJ9Ql3RKzVivWJF2y714v2CTeExmmM/ohHrNhrnf8Jh8PpdJ7vh8aM/va/6AgSSDhIUWh4iJFYuMjSmPkJEPk5SVHJeYmRCbnJ0en6ChLaOkpR2nqKkLq6ytAK+wsRuztLUUt7i5GLu8vQq/wMEvw8TFCMfIyR/LzM0lz9DRKNPU1Q7X2Nkj29zdE9/g4Q3j5OUs5+jpA+vs7QTv8PEn8/T1K/f4+SD7/P0R/wADqhhIsGCBgwgTBgEAOw==";
        header("Content-type: image/Gif");
        echo base64_decode($sImg);
        exit;
    }

    public function getGifDe()
    {
        $sImg = "R0lGODlhEgANAIQZAAAAABAFBhEGBhIGBhQHBxUHCCYNDZQqH5QrI9c4M+M4M9w9M+g/MuNDM/BFM99tI+t3H+CyDerIB+zIBuzKBurLCPfcAPfgAPjlAP///////////////////////////ywAAAAAEgANAAAFVaARCGRpmoExAGzrvsBAwHRLFHVdIEfv/8ADouEoGo9IR2PBaDqfUMYioahar1hF4gHper9gyKOCKZvPaExFcmm73/CLZGKp2+94yyRCmfj/gIAUESEAOw==";
        header("Content-type: image/Gif");
        echo base64_decode($sImg);
        exit;
    }

    public function getGifEn()
    {
        $sImg = "R0lGODlhEgANAOfRANzd6P9LQP7//93e6ba32v8HB/J4ef//+/85Of8fFVddwP8aFq+13P8aFPr////f3f8XE/n//62s3fQuLAIDj6ys3uHZ5P8uLOjp793f6dbX6uvBxsyasurCx/9fXcadtS88r+Da5EZHr+Hi7A0NlUVGqcjR9MKaunh5x/8REQAAkv9IP/9BPnh6wi4/td3c5uLl7P8PD7vO9aGSw7bM9uDh6UpLsf8hFv/f3PPx9/Dx9DFCuMDE4cHF4/sAANPU3ufp8JSDvuVocf8ODvz8+/xRTPQgG+PM0ZSWzs/R476+4ujp8v8/PurO0uPZ3//u5fQCAOPj6nFxxf8UE8rM4P/w5YGM18PH4/79/ExUuP3//4CAxqmo3KaZxv7+/RcstO3v89XW6fS8waOj2snM7Nra7Ccon+no9v03OFJZvuK2xBEipP89Ov8dE+be4u3u8/w3OOVocv8sKv8EBOjo9+/u+Kap15SFvgwRlba327uXteHh7tvc5yo3q9XX5SQ4uU5MrtjW5qaVxvDS2f8DA+Tj6vr6/j1FtVlgvL+euvHw9v+rqe7u+XKJ1ebn7p2x7CUmnvb2+dPW8P8cEc/P4efn8/38/5Ws66mYx/ccGNfY5vh0d927zSUlov96ev88OgAAjmmA09rb5v+xsPF5eMnR8i0upuuAgvEyLx0rq97f6cunwEBIuO/Aw/9/fuTm6vn5+vTEyM7P5rq63BESlf+Fgv8fF8SWsOfp7+2rrvX1+La23RgmqLe43PPV2vdydhcnqIWQ2BEgoube4wASn82atOHj6uTT2f97etKjuf9dWsSduZyb08fJ4fn5+/z8/f+ZAP///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////ywAAAAAEgANAAAI/gB/YHCkig+AAVGGuSmUAYCoEbpgGXsFY8kWM7T6JEI14QMIEpBaVNIBRBOSOtEqmAK27EabYqk6jYl2hpksKnjSmIgmqdEqWw2ShSITrZQCFXb8IDpkRdGBCLGmpBDj4ECOYKyyXHFyyoCQX8hceShQQFktT5viGCDV5AgUaHDjypXrI9exIgHYwEHA5MIcQnJYIEDzKcCKVi+63BE0CMeTUTGGLKrywBemIDMCJVnz5ZIWATI4LYCghoaAaI/+EGNAqQQXQ4xQuDiRYBKHHVLoWJIAaFaNZkSU2KAgTI+RTLd4gRKxC0uZPQPAvAnTiwCPEB02WOiRh4CGZ15wAgUEADs=";
        header("Content-type: image/Gif");
        echo base64_decode($sImg);
        exit;
    }
}

/**
 * Class requTranslations
 */
class requTranslations
{
    /**
     * @return array
     */
    public function getTranslations()
    {
        return array(
            'de' => array(
                'RequCheck'              => 'Mindestanforderungspr�fung',
                'ExecNotice'             => 'F�hren Sie diese Pr�fung immer aus dem Stammverzeichnis Ihres Shops aus. Nur dann k�nnen die Pr�fungen erfolgreich durchgef�hrt werden.',
                'RequSucc'               => 'Bedingung erf�llt',
                'RequNotSucc'            => 'Bedingung nicht erf�llt',
                'RequNotCheckable'       => 'Bedingung nicht pr�fbar',
                'hasMinPhpVersion'       => 'mindestens PHP Version %s',
                'hasMaxPhpVersion'       => 'maximal PHP Version %s',
                'hasFromToPhpVersion'    => 'Server verwendet PHP Version zwischen %s und %s',
                'hasSoap'                => 'SOAP-Erweiterung verf�gbar',
                'hasCurl'                => 'Curl-Erweiterung verf�gbar',
                'hasExtension'           => '%s-Erweiterung verf�gbar',
                'hasMinShopVersion'      => 'mindestens Shop Version %s',
                'hasMaxShopVersion'      => 'maximal Shop Version %s',
                'hasMinModCfgVersion'    => 'ModCfg-Eintrag "%s" (%s) mit mindestens Version %s',
                'hasMaxModCfgVersion'    => 'ModCfg-Eintrag "%s" (%s) mit maximal Version %s',
                'hasModCfg'              => '<a href="http://www.oxidmodule.com/Connector" target="Connector">Modul-Connector</a> installiert',
                'isShopEdition'          => 'ist Shopedition %s',
                'hasZendLoaderOptimizer' => 'Zend Optimizer (PHP 5.2) oder Zend Guard Loader (PHP 5.3, 5.4) installiert',
                'hasIonCubeLoader'       => 'ionCube loader installiert',
                'globalSuccess'          => 'Die Pr�fung war erfolgreich. Sie k�nnen das Modul installieren.*<br><br>',
                'globalNotSuccess'       => 'Die Pr�fung war nicht erfolgreich. Bitte kontrollieren Sie die rot markierten Bedingungen.<br><br>',
                'deleteFile1'            => 'L�schen Sie diese Datei nach der Verwendung bitte unbedingt wieder von Ihrem Server! Klicken Sie <a href="',
                'deleteFile2'            => '?fnc=deleteme">hier</a>, um diese Datei zu l�schen.',
                'showPhpInfo'            => 'PHPinfo anzeigen',
                'dependentoffurther'     => '* abh�ngig von ungepr�ften Voraussetzungen',
                'oneandonedescription'   => '** gepr�ft wurde das Ausf�hrungsverzeichnis, providerabh�ngig m�ssen Unterverzeichnisse separat gepr�ft werden (z.B. bei 1&1)',
                'or'                     => ' oder ',
                'toggleswitch'           => 'Klick f�r Details zur Pr�fung',
                'unableDeleteFile'       => 'Datei konnte nicht gel�scht werden. Bitte l�schen Sie diese manuell.',
                'goodBye'                => 'Auf Wiedersehen.',
            ),
            'en' => array(
                'RequCheck'              => 'Requirement check',
                'ExecNotice'             => 'Execute this check script in the root directory of your shop. In this case only checks can executed succesfully.',
                'RequSucc'               => 'condition is fulfilled',
                'RequNotSucc'            => 'condition isn\'t fulfilled',
                'RequNotCheckable'       => 'condition isn\'t checkable',
                'hasMinPhpVersion'       => 'at least PHP version %s',
                'hasMaxPhpVersion'       => 'not more than PHP version %s',
                'hasFromToPhpVersion'    => 'server use PHP version between %s and %s',
                'hasSoap'                => 'SOAP extension available',
                'hasCurl'                => 'curl extension available',
                'hasExtension'           => '%s extension is available',
                'hasMinShopVersion'      => 'at least shop version %s',
                'hasMaxShopVersion'      => 'not more than shop version %s',
                'hasMinModCfgVersion'    => 'ModCfg item "%s" (%s) has at least version %s',
                'hasMaxModCfgVersion'    => 'ModCfg item "%s" (%s) has not more than version %s',
                'hasModCfg'              => '<a href="http://www.oxidmodule.com/Connector" target="Connector">Module Connector</a> installed',
                'isShopEdition'          => 'shop edition is %s',
                'hasZendLoaderOptimizer' => 'Zend Optimizer (PHP 5.2) or Zend Guard Loader (PHP 5.3, 5.4) installed',
                'hasIonCubeLoader'       => 'ionCube loader installed',
                'globalSuccess'          => 'The test was successful. Your server is ready for installing the module.*<br><br>',
                'globalNotSuccess'       => 'The test wasn\'t successfull. Please check the red marked conditions.<br><br>',
                'deleteFile1'            => 'Please delete this file after use on your server! Click <a href="',
                'deleteFile2'            => '?fnc=deleteme">here</a>, to delete this file.',
                'showPhpInfo'            => 'show PHPinfo',
                'dependentoffurther'     => '* dependent of further unchecked conditions',
                'oneandonedescription'   => '** this check use execution directory only, provider dependend subdirectories have to check separately (e.g. at 1&1)',
                'or'                     => ' or ',
                'toggleswitch'           => 'click for details',
                'unableDeleteFile'       => 'Unable to delete file. Please delete it manually.',
                'goodBye'                => 'Good Bye.',
            ),
        );
    }
}

/**
 * Class requRemote
 */
class requRemote
{
    public $blUseRemote = true;

    public $oModuleData;

    /**
     * @param $sModId
     * @param $sModVersion
     * @param $sShopEdition
     *
     * @return bool|array
     */
    public function getShopEdition($sModId, $sModVersion, $sShopEdition)
    {
        $sUrl = "moduleversion/";
        $sUrl .= 'modid/' . urlencode($sModId) . '/';
        $sUrl .= 'forcemodversion/' . urlencode($sModVersion) . '/';
        $sUrl .= 'edition/' . urlencode($sShopEdition) . '/';

        /** @var stdClass $oModuleData */
        $oModuleData = $this->_getRemoteServerData($sUrl);

        if ($oModuleData->status == 'OK' && isset($oModuleData->moduleversion->compatible_release))
        {
            return explode(',', $oModuleData->moduleversion->compatible_release->shopedition);
        }

        return false;
    }

    /**
     * @param $sModId
     * @param $sModVersion
     * @param $sShopEdition
     *
     * @return bool|string
     */
    public function getMinShopVersion($sModId, $sModVersion, $sShopEdition)
    {
        $sUrl = "moduleversion/";
        $sUrl .= 'modid/' . urlencode($sModId) . '/';
        $sUrl .= 'forcemodversion/' . urlencode($sModVersion) . '/';
        $sUrl .= 'edition/' . urlencode($sShopEdition) . '/';

        /** @var stdClass $oModuleData */
        $oModuleData = $this->_getRemoteServerData($sUrl);

        if ($oModuleData->status == 'OK' && isset($oModuleData->moduleversion->compatible_release))
        {
            return $this->shortenVersion($oModuleData->moduleversion->compatible_release->fromshopversion);
        }

        return false;
    }

    /**
     * @param $sModId
     * @param $sModVersion
     * @param $sShopEdition
     *
     * @return bool|string
     */
    public function getMaxShopVersion($sModId, $sModVersion, $sShopEdition)
    {
        $sUrl = "moduleversion/";
        $sUrl .= 'modid/' . urlencode($sModId) . '/';
        $sUrl .= 'forcemodversion/' . urlencode($sModVersion) . '/';
        $sUrl .= 'edition/' . urlencode($sShopEdition) . '/';

        /** @var stdClass $oModuleData */
        $oModuleData = $this->_getRemoteServerData($sUrl);

        if ($oModuleData->status == 'OK' && isset($oModuleData->moduleversion->compatible_release))
        {
            return $this->shortenVersion($oModuleData->moduleversion->compatible_release->toshopversion);
        }

        return false;
    }

    /**
     * @param $sUrl
     *
     * @return string
     */
    protected function _getRemoteServerData($sUrl)
    {
        if ($this->oModuleData) {
            return $this->oModuleData;
        }

        if ($this->blUseRemote) {
            $sUrl = '/serialized/' . $sUrl;

            $sHost = "http://update.oxidmodule.com";
            $sData = $this->curlConnect($sHost . $sUrl);
            $oData = unserialize($sData);

            $this->oModuleData = $oData;
        } else {
            $oData = new stdClass();
            $oData->status = 'NOK';
        }

        return $oData;
    }

    /**
     * @param $sFilePath
     *
     * @return string
     */
    public function curlConnect($sFilePath)
    {
        $sContent = '';

        if (extension_loaded('curl') &&
            function_exists('curl_init') && function_exists('curl_exec') &&
            $ch = curl_init())
        {
            $sCurl_URL = preg_replace('@^((http|https)://)@', '', $sFilePath);
            curl_setopt($ch, CURLOPT_URL, $sCurl_URL);
            if ($_SERVER['HTTP_USER_AGENT']) {
                curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            }
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            curl_setopt($ch, CURLOPT_POST, 0);
            $sContent = curl_exec($ch);
        }

        return $sContent;
    }

    /**
     * @param $sVersion
     *
     * @return string
     */
    public function shortenVersion($sVersion)
    {
        $aVersion = explode('.', $sVersion);

        unset($aVersion[3]);

        return implode('.', $aVersion);
    }
}

/**
 * Class requTests
 * contains test functions
 */
class requTests
{
    public $oBase;
    public $oDb;
    public $oConfig;
    public $blGlobalResult = false;

    /**
     * @param requCheck  $oCheckInstance
     * @param requConfig $oConfig
     * @param            $oDb
     * @param requRemote $oRemote
     */
    public function __construct(requCheck $oCheckInstance, requConfig $oConfig, $oDb, requRemote $oRemote)
    {
        $this->oBase = $oCheckInstance;
        $this->oConfig = $oConfig;
        $this->oDb = $oDb;
        $this->oRemote = $oRemote;
    }

    /**
     * @return requCheck
     */
    public function getBase()
    {
        return $this->oBase;
    }

    public function getDb()
    {
        return $this->oDb;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->getBase()->getBasePath();
    }

    /**
     * @param bool $blResult
     */
    public function setGlobalResult($blResult)
    {
        $this->getBase()->blGlobalResult = $blResult;
    }

    /**
     * @param      $sMethodName
     * @param null $aArguments
     *
     * @return array
     */
    public function checkInSubDirs($sMethodName, $aArguments = null)
    {
        return $this->getBase()->checkInSubDirs($sMethodName, $aArguments);
    }

    /**
     * @param $aConfiguration
     *
     * @return array
     */
    public function hasMinPhpVersion(&$aConfiguration)
    {
        $aResult[$this->getBasePath()] = false;

        if (version_compare(phpversion(), $aConfiguration['aParams']['version'], '>=')) {
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__, $aConfiguration['aParams']));

        return $aResult;
    }

    /**
     * @param $aConfiguration
     *
     * @return array
     */
    public function hasFromToPhpVersion(&$aConfiguration)
    {
        $aResult[$this->getBasePath()] = false;

        if ((version_compare(phpversion(), $aConfiguration['aParams']['from'], '>=')) && (version_compare(
                phpversion(),
                $aConfiguration['aParams']['to'],
                '<'
            ))
        ) {
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__, $aConfiguration['aParams']));

        return $aResult;
    }

    /**
     * @param $aConfiguration
     *
     * @return array
     */
    public function hasMaxPhpVersion(&$aConfiguration)
    {
        $aResult[$this->getBasePath()] = false;

        if (version_compare(phpversion(), $aConfiguration['aParams']['version'], '<=')) {
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__, $aConfiguration['aParams']));

        return $aResult;
    }

    /**
     * @param $aConfiguration
     *
     * @return array
     */
    public function hasExtension(&$aConfiguration)
    {
        $aResult[$this->getBasePath()] = false;

        if (extension_loaded($aConfiguration['aParams']['type'])) {
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__, $aConfiguration['aParams']));

        return $aResult;
    }

    /**
     * @param $aConfiguration
     *
     * @return bool
     */
    public function hasMinShopVersion(&$aConfiguration)
    {
        if ($this->getDb()) {
            $sField  = 'oxversion';
            $sSelect = "SELECT " . $sField . " FROM oxshops WHERE 1 ORDER BY oxversion ASC LIMIT 1";
            $rResult = mysql_query($sSelect, $this->getDb());
            $oResult = mysql_fetch_object($rResult);

            $oEditionResult = $this->_getShopEdition();
            $sEdition       = strtoupper($oEditionResult->oxedition);

            $mMinRemoteVersion = $this->oRemote->getMinShopVersion($this->oConfig->sModId, $this->oConfig->sModVersion, $sEdition);
            if ($mMinRemoteVersion) {
                $aConfiguration['aParams'] = array('version' => $mMinRemoteVersion);
            } else  {
                $aConfiguration['aParams'] = array('version' => $aConfiguration['aParams'][$sEdition]);
            }

            if (version_compare($oResult->oxversion, $aConfiguration['aParams']['version'], '>=')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $aConfiguration
     *
     * @return bool
     */
    public function hasMaxShopVersion(&$aConfiguration)
    {
        if ($this->getDb()) {
            $sField  = 'oxversion';
            $sSelect = "SELECT " . $sField . " FROM oxshops WHERE 1 ORDER BY oxversion DESC LIMIT 1";
            $rResult = mysql_query($sSelect, $this->getDb());
            $oResult = mysql_fetch_object($rResult);

            $oEditionResult = $this->_getShopEdition();
            $sEdition       = strtoupper($oEditionResult->oxedition);

            $mMaxRemoteVersion = $this->oRemote->getMaxShopVersion($this->oConfig->sModId, $this->oConfig->sModVersion, $sEdition);
            if ($mMaxRemoteVersion) {
                $aConfiguration['aParams'] = array('version' => $mMaxRemoteVersion);
            } else  {
                $aConfiguration['aParams'] = array('version' => $aConfiguration['aParams'][$sEdition]);
            }

            if (version_compare($oResult->oxversion, $aConfiguration['aParams']['version'], '<=')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $aConfiguration
     *
     * @return bool
     */
    public function isShopEdition(&$aConfiguration)
    {
        if ($this->getDb()) {
            $oResult = $this->_getShopEdition();

            $mRemoteShopEditions = $this->oRemote->getShopEdition($this->oConfig->sModId, $this->oConfig->sModVersion, $oResult->oxedition);
            if (is_array($mRemoteShopEditions)) {
                $aConfiguration['aParams'][0] = $mRemoteShopEditions;
            }

            if (in_array(strtoupper($oResult->oxedition), $aConfiguration['aParams'][0])) {
                $aConfiguration['aParams'][0] = strtoupper($oResult->oxedition);
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool|object|stdClass
     */
    protected function _getShopEdition()
    {
        if ($this->getDb()) {
            $sField  = 'oxedition';
            $sSelect = "SELECT " . $sField . " FROM oxshops WHERE 1 LIMIT 1";
            $rResult = mysql_query($sSelect, $this->getDb());
            $oResult = mysql_fetch_object($rResult);

            return $oResult;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function hasModCfg()
    {
        if ($this->getDb()) {
            $sModId  = 'd3modcfg_lib';
            $sSelect = "SELECT 1 as result FROM d3_cfg_mod WHERE oxmodid = '" . $sModId . "' LIMIT 1";
            $rResult = mysql_query($sSelect, $this->getDb());
            if (is_resource($rResult)) {
                $oResult = mysql_fetch_object($rResult);

                if ($oResult->result) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param $aConfiguration
     *
     * @return bool|int
     */
    public function hasMinModCfgVersion(&$aConfiguration)
    {
        if ($this->getDb()) {
            $sSelect = "SELECT IF (INET_ATON(oxversion) >= INET_ATON('" . $aConfiguration['aParams']['version'] . "'), 1, 0) AS result
                        FROM d3_cfg_mod WHERE
                        oxmodid = '" . $aConfiguration['aParams']['id'] . "' AND
                        oxversion != 'basic'
                        ORDER BY oxversion ASC LIMIT 1";

            $rResult = mysql_query($sSelect, $this->getDb());
            $aResult = mysql_fetch_assoc($rResult);

            if (!(int)$aResult['result']) {
                $this->setGlobalResult(false);
            }

            return (int)$aResult['result'];
        }

        $this->setGlobalResult(false);

        return false;
    }

    /**
     * @param $aConfiguration
     *
     * @return bool|int
     */
    public function hasMaxModCfgVersion(&$aConfiguration)
    {
        if ($this->getDb()) {
            $sSelect = "SELECT
                        IF (INET_ATON(oxversion) <= INET_ATON('" . $aConfiguration['aParams']['version'] . "'), 1, 0) AS result
                        FROM d3_cfg_mod WHERE
                        oxmodid = '" . $aConfiguration['aParams']['id'] . "' AND
                        oxversion != 'basic'
                        ORDER BY oxversion ASC LIMIT 1";

            $rResult = mysql_query($sSelect, $this->getDb());
            $aResult = mysql_fetch_assoc($rResult);

            if (!(int)$aResult['result']) {
                $this->setGlobalResult(false);
            }

            return (int)$aResult['result'];
        }

        $this->setGlobalResult(false);

        return false;
    }

    /**
     * @return array
     */
    public function hasZendLoaderOptimizer()
    {
        $aResult = array($this->getBasePath() => false);

        if (
            (
                version_compare(phpversion(), '5.2.0', '>=') &&
                version_compare(phpversion(), '5.2.900', '<') &&
                function_exists('zend_optimizer_version')
            ) || (
                version_compare(phpversion(), '5.3.0', '>=') &&
                version_compare(phpversion(), '5.4.900', '<') &&
                function_exists('zend_loader_version')
            )
        ){
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__));

        return $aResult;
    }

    /**
     * @return array
     */
    public function hasIonCubeLoader()
    {
        $aResult = array($this->getBasePath() => false);

        if (function_exists('ioncube_loader_version')) {
            $aResult[$this->getBasePath()] = true;
        }

        $aResult = array_merge($aResult, $this->checkInSubDirs(__FUNCTION__));

        return $aResult;
    }
}

/**
 * @param $mVar
 */
function dumpvar($mVar)
{
    echo "<pre>";
    print_r($mVar);
    echo "</pre>";
}

$oRequCheck = new requcheck;
if (isset($_REQUEST['fnc']) && $_REQUEST['fnc']) {
    $oRequCheck->{$_REQUEST['fnc']}();
} else {
    $oRequCheck->startCheck();
}
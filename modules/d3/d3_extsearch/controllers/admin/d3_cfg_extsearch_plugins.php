<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_cfg_extsearch_plugins extends d3_cfg_mod_main
{
    protected $_sThisTemplate = "d3_cfg_extsearch_plugins.tpl";

    protected $_sModId = 'd3_extsearch';

    protected $_sOldPluginName = 'se_browserinstall.xml';

    /**
     * ruft oxutils-Funktion auf, die vom Template aus nicht verfuegbar ist

     */
    public function save()
    {
        $value = oxRegistry::getConfig()->getRequestParameter('value');
        if ($_FILES['value']['name']['sExtSearch_PluginIcon']) {
            $value['sExtSearch_PluginIcon'] = $_FILES['value']['name']['sExtSearch_PluginIcon'];
            copy(
                $_FILES['value']['tmp_name']['sExtSearch_PluginIcon'],
                oxRegistry::getConfig()->getConfigParam(
                    'sShopDir'
                ) . '/' . $_FILES['value']['name']['sExtSearch_PluginIcon']
            );
        }

        parent::save();

        return;
    }

    /**
     * @return string
     */
    public function getPluginFileName()
    {
        $oShop = oxRegistry::getConfig()->getActiveShop();

        $oFS = oxNew('d3filesystem');
        if ($oFS->exists(
            $oFS->trailingslashit(oxRegistry::getConfig()->getConfigParam('sShopDir')) . $this->_sOldPluginName
        )
        ) {
            $sFileName = $this->_sOldPluginName;
        } else {
            $sPattern  = "[^a-zA-Z0-9]";
            $sFileName = 'searchplugin_' . strtolower(
                preg_replace('@' . $sPattern . '@', '_', $oShop->getFieldData('oxname'))
            ) . ".xml";
        }

        return $sFileName;
    }

    public function generatePluginFile()
    {
        $oShop = oxRegistry::getConfig()->getActiveShop();

        $oFS = oxNew('d3filesystem');

        $img_info = array();
        $bild     = false;
        if (d3_cfg_mod::get($this->d3getModId())->getValue('sExtSearch_PluginIcon')) {
            $imgdir   = $oFS->trailingslashit(oxRegistry::getConfig()->getConfigParam('sShopDir')) . d3_cfg_mod::get(
                $this->d3getModId()
            )->getValue('sExtSearch_PluginIcon');
            $img_info = getimagesize($imgdir);
            $fp_img   = fopen($imgdir, "r");
            $bild     = fread($fp_img, filesize($imgdir));
            fclose($fp_img);
        }

        $sFile = "<?xml version=\"1.0\" encoding=\"ISO-8859-15\" ?>\n";
        $sFile .= "<OpenSearchDescription xmlns=\"http://a9.com/-/spec/opensearch/1.1/\">\n";
        $sFile .= "<ShortName>" . $oShop->getFieldData('oxname') . "</ShortName>\n";
        $sEncoding = oxRegistry::getConfig()->isUtf() ? 'UTF-8' : 'ISO-8859-15';
        $sFile .= "<InputEncoding>" . $sEncoding . "</InputEncoding>\n";
        $sFile .= "<OutputEncoding>" . $sEncoding . "</OutputEncoding>\n";
        if (d3_cfg_mod::get($this->d3getModId())->getValue('sExtSearch_PluginIcon') && count($img_info) && $bild) {
            $sFile .= "<Image height=\"" . $img_info[1] . "\" width=\"" . $img_info[0] . "\">\n";
            $sFile .= "data:" . $img_info['mime'] . ";base64, ";
            $sFile .= base64_encode($bild);
            $sFile .= "</Image>\n";
        }
        $sFile .= "<Url type=\"text/html\" template=\"" . oxRegistry::getConfig()->getConfigParam(
            'sShopURL'
        ) . "index.php?cl=search&amp;searchparam={searchTerms}\"/>\n";
        $sFile .= "<Url type=\"application/x-suggestions+json\" method=\"GET\" template=\"" . oxRegistry::getConfig(
        )->getConfigParam('sShopURL') . "index.php?fnc=d3_browser_suggest&amp;searchparam={searchTerms}\"/>\n";
        $sFile .= "</OpenSearchDescription>";

        $sFileName = $oFS->trailingslashit(
            oxRegistry::getConfig()->getConfigParam('sShopDir')
        ) . $this->getPluginFileName();
        $oFS->createFile($sFileName, $sFile, true);

        echo '<br><br>Installationsdatei wurde erfolgreich generiert.<br><br><a href="#" onclick="window.close();">Fenster schlie&szlig;en</a>';
        oxRegistry::getConfig()->pageClose();
        die();
    }
}
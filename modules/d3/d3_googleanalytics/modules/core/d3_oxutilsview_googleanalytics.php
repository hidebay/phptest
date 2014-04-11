<?php

/**
 *
 */
class d3_oxutilsview_googleanalytics extends d3_oxutilsview_googleanalytics_parent
{
    protected function _fillCommonSmartyProperties( $oSmarty )
    {
        parent::_fillCommonSmartyProperties($oSmarty);

        $oSmarty->plugins_dir[] =
            oxRegistry::getConfig()->getActiveView()->getViewConfig()->getModulePath('d3_googleanalytics').
            'core/smarty/plugins';
    }
}
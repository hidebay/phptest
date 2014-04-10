<?php

if(false)
{
    class dre_cleartmp_oxshopcontrol_parent extends oxShopControl{}
}

class dre_cleartmp_oxshopcontrol extends dre_cleartmp_oxshopcontrol_parent
{
    
    protected function _runOnce()
    {
        $oConf     = oxRegistry::getConfig();
        $blDevMode = $oConf->getShopConfVar('blDevMode',null,'module:dre_cleartmp');
        
        
        if( $blDevMode && !$oConf->isProductiveMode())
        {
            
            $sTmpDir = realpath($oConf->getShopConfVar('sCompileDir'));
            $aFiles = glob($sTmpDir.'/*{.php,.txt}',GLOB_BRACE);
            $aFiles = array_merge($aFiles, glob($sTmpDir.'/smarty/*.php'));
            if(count($aFiles) > 0)
            {
                foreach($aFiles as $file) {
                    @unlink($file);
                }
            }
        }
        parent::_runOnce();
    }
    
}

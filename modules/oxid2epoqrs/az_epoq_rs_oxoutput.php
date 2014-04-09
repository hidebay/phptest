<?php
/**
 * epoq oxoutput module.
 *
 * @extend oxOutput
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxoutput extends az_epoq_rs_oxoutput_parent
{
    /**
     * Product from the details view (only set if the current view is the details view)
     * @var oxArticle
     */
    protected $_az_epoq_oProduct = null;

    /**
     * Adds epoq javascript snippets just before the closing </head> tag.
     * This module modifies the input data if the epoq module has been activated.
     * 
     * @extend process
     * 
     * @param $sValue input value
     * @param $sClassName current view class
     * @return string modified input value
     */
    public function process ( $sValue, $sClassName )
    {
        $sValue = parent::process( $sValue, $sClassName );
        
        if ( $this->isAdmin() ) {
            return $sValue;
        }
        
        // check if oxoutput usage has been disabled:
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq->isUseOxOutput() ) {
            return $sValue;
        }
        
        $sHeaderSnippet = $oEpoq->getHeaderSnippet();
        if ( $sClassName == 'details' && $this->_az_epoq_oProduct ) {
            $sHeaderSnippet .= $oEpoq->getDetailsSnippet( $this->_az_epoq_oProduct );
        }
        if ( $sHeaderSnippet ) {
            $sValue = str_ireplace( '</head>', $sHeaderSnippet . "\n</head>", $sValue );
        }

        $sFooterSnippet = '';
        if ( $sClassName == 'details' && $this->_az_epoq_oProduct ) {
            $sFooterSnippet .= $oEpoq->getAjaxFooterSnippet( $this->_az_epoq_oProduct );
        }
        if ( $sFooterSnippet ) {
            $sValue = str_ireplace( '</body>', $sFooterSnippet . "\n\n</body>", $sValue );
        }

        return $sValue;
    }

    /**
     * Remembers the product from the details page for later processing in the process() method.
     * This method does not modify the view data.
     * 
     * @extend processViewArray
     * 
     * @param $aViewData view data
     * @param $sClassName current view class
     * @return array unmodified view data
     */
    public function processViewArray ( $aViewData, $sClassName )
    {
        $aViewData = parent::processViewArray( $aViewData, $sClassName );
        
        if ( $this->isAdmin() ) {
            return $aViewData;
        }
        
        // check if oxoutput usage has been disabled:
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq->isUseOxOutput() ) {
            return $aViewData;
        }
        
        if ( $sClassName == 'details' ) {
            $this->_az_epoq_oProduct = $aViewData[ 'product' ];
            // OXID eShop 4.5 doesn't use the 'product' template variable anymore:
            if ( !$this->_az_epoq_oProduct ) {
                $oView = $this->getConfig()->getActiveView();
                if ( $oView && method_exists( $oView, 'getProduct' ) ) {
                    $this->_az_epoq_oProduct = $oView->getProduct();
                }
            }
        }
        
        return $aViewData;
    }
}

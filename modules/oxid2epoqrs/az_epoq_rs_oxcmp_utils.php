<?php
/**
 * Adds template variables for inclusion of the epoq snippets.
 * 
 * @extend oxcmp_utils
 * 
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxcmp_utils extends az_epoq_rs_oxcmp_utils_parent
{
    /**
     * Adds some view data for manual inclusion in templates.
     * 
     * @extend render
     * 
     * @return string template name
     */
    public function render ()
    {
        $sTemplate = parent::render();
        
        $this->_azEpoqRender();
        
        return $sTemplate;
    }

    /**
     * Adds some view data for manual inclusion in templates.
     * 
     * The following variables are added:
     * <ul>
     * <li>az_epoq_blActive - active flag of the epoq Recommendation Service module</li>
     * <li>az_epoq_sHeaderSnippet - snippet for inclusion into the html head</li>
     * <li>az_epoq_sDetailsSnippet - snippet for inclusion into the html head (for the details page)</li>
     * </ul>
     * 
     * @return null
     */
    protected function _azEpoqRender ()
    {
        $oParent = $this->getParent();
        if ( is_object( $oParent ) )
        {
            $oEpoq = az_epoq::getInstance();
            $oParent->_aViewData[ 'az_epoq_blActive' ] = $oEpoq->isActive();
            $oParent->_aViewData[ 'az_epoq_sHeaderSnippet' ] = $oEpoq->getHeaderSnippet();
            if ( $oParent->getClassName() == 'details' )
                $oParent->_aViewData[ 'az_epoq_sDetailsSnippet' ] = $oEpoq->getDetailsSnippet( $oParent->getProduct() );
        }
    }
}

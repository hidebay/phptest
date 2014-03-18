<?php

class trocontent extends trocontent_parent
{
    /**
     * Returns content parsed through smarty
     *
     * @return string
     */
    public function getParsedContent()
    {
        return oxUtilsView::getInstance()->parseThroughSmarty( $this->getContent()->oxcontents__oxcontent->value, $this->getContent()->getId() );
    }

}
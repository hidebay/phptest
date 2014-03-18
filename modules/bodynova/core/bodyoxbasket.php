<?php

class bodyoxbasket extends bodyoxbasket_parent
{
	public function getMostUsedVatPercent()
    {
		if(0==$this->_oProductsPriceList->getMostUsedVatPercent())return $this->_oProductsPriceList->getMostUsedVatPercent();
		if($this->getConfig()->getConfigParam('dTroDefaultVAT'))return $this->getConfig()->getConfigParam('dTroDefaultVAT');
        else return $this->_oProductsPriceList->getMostUsedVatPercent();
    }

}

<?php

class trooxbasket extends trooxbasket_parent
{
	public function getMostUsedVatPercent()
    {
		if($this->getConfig()->getConfigParam('dTroDefaultVAT'))return $this->getConfig()->getConfigParam('dTroDefaultVAT');
        else return $this->_oProductsPriceList->getMostUsedVatPercent();
    }

}
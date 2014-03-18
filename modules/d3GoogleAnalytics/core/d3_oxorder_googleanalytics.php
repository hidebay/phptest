<?php

class d3_oxorder_googleanalytics extends d3_oxorder_googleanalytics_parent
{
    public function getPayment()
    {
        if (!$this->_oPayment)
        {
            $this->_oPayment = oxNew('oxpayment');
            $this->_oPayment->Load($this->getFieldData('oxpaymenttype'));
        }

        return parent::getPayment();
    }

    public function d3getVoucherSerieList()
    {
        $sSelect = "SELECT oxvoucherserieid FROM oxvouchers WHERE oxorderid =  ".oxDb::getDb()->quote($this->getId());
        $aVoucherIds = oxDb::getDb()->getArray($sSelect);
        $aVoucherSerieList = array();

        foreach ($aVoucherIds as $aVoucherId)
        {
            $oVoucherSerie = oxNew('oxvoucherserie');
            $oVoucherSerie->Load($aVoucherId[0]);
            $aVoucherSerieList[] = $oVoucherSerie;
        }

        return $aVoucherSerieList;
    }
}
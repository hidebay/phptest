<?php
 class trooxarticle extends trooxarticle_parent {

    public function isBuyable()
    {
        if ($this->oxarticles__troshowprice == '0')
        {
            return false;
        }
        if ($this->_blNotBuyableParent)
        {
            return false;
        }

        return !$this->_blNotBuyable;
    }

    public function isNotBuyable()
    {
        if ($this->oxarticles__troshowprice == '0')
        {
            return true;
        }
        return $this->_blNotBuyable;
    }

 }
?>

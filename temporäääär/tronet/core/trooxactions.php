<?php

class trooxactions extends trooxactions_parent
{
	/*
	 * TRONet -> function that returns the id of the current slide
	 */	
    public function getBannerId()
    {
    	return  $this->oxactions__oxid->value;
    }
    
	/*
	 * TRONet -> function that returns the height of the current slide
	 */	
    public function getBannerHeight()
    {
    	return  $this->oxactions__troheight->value;
    }
    
	/*
	 * TRONet -> function that returns the slide effect of the current slide
	 */	
    public function getBannerEffect()
    {
    	return  $this->oxactions__troeffect->value;
    }	

    public function isFlash()
    {
        return strstr($this->oxactions__oxpic->value, '.swf')?true:false;
    }
} 
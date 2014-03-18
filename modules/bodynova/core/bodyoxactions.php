<?php

class bodyoxactions extends bodyoxactions_parent
{
	/*
	 * BODYNOVA -> function that returns the id of the current slide
	 */	
    public function getBannerId()
    {
    	return  $this->oxactions__oxid->value;
    }
    
	/*
	 * BODYNOVA -> function that returns the height of the current slide
	 */	
    public function getBannerHeight()
    {
    	return  $this->oxactions__bodyheight->value;
    }
    
	/*
	 * BODYNOVA -> function that returns the slide effect of the current slide
	 */	
    public function getBannerEffect()
    {
    	return  $this->oxactions__bodyeffect->value;
    }	

    public function isFlash()
    {
        return strstr($this->oxactions__oxpic->value, '.swf')?true:false;
    }
} 

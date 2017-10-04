<?php

class VTI_VTISeoSitemap_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CONFIG_PATH = 'vtiseositemap/sitemap/';

    public function getConfig($field)
	{
		return Mage::getStoreConfig(self::CONFIG_PATH.$field);
	}
}
<?php

class VTI_VTISeoCore_Block_Schema_Social extends Mage_Core_Block_Template
{
    public $_socialProfiles;

    public function __construct()
    {
        $this->_socialProfiles = explode("\n", Mage::getStoreConfig('vtiseocore/social_schema/social_profiles'));
    }

    public function isEnabled()
    {
        return Mage::getStoreConfig('vtiseocore/social_schema/enabled');
    }

    public function socialProfileCount()
    {
        return count($this->_socialProfiles);
    }
}
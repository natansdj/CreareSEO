<?php
class VTI_VTISeoCore_Model_Source_Protocols
{
  public function toOptionArray()
  {
    return array(
      array('value' => 'http://', 'label' => Mage::helper('vtiseocore')->__('http://')),
      array('value' => 'https://', 'label' => Mage::helper('vtiseocore')->__('https:// (secure)'))
    );
  }
}
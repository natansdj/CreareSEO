<?php
class VTI_VTISeoCore_Model_Source_AnalyticsType
{
  public function toOptionArray()
  {
    return array(
      array('value' => 0, 'label' => Mage::helper('vtiseocore')->__('Standard Google Analytics (default)')),
      array('value' => 1, 'label' => Mage::helper('vtiseocore')->__('Universal Analytics'))
    );
  }
}
<?php

class VTI_VTISeoCore_Helper_Data extends Mage_Core_Helper_Abstract
{
    const DEFAULT_CONFIG_PATH = 'vtiseocore/defaultseo/';

    public function getConfig($field)
    {
        return Mage::getStoreConfig(self::DEFAULT_CONFIG_PATH . $field);
    }

    public function getConfigPath()
    {
        return Mage::app()->getRequest()->getControllerName() . '_' . Mage::app()->getRequest()->getParam('section');
    }

    public function isWriteable($file)
    {
        $io = new Varien_Io_File();
        $io->open(array('path' => Mage::getBaseDir()));
        return $io->isWriteable($file);
    }

    public function exists($file)
    {
        $io = new Varien_Io_File();
        $io->open(array('path' => Mage::getBaseDir()));
        return $io->fileExists($file);
    }

    public function checkDefaultStoreNames()
    {
        $stores = Mage::getModel('core/store')->getCollection();
        foreach ($stores as $store) {
            if ($store->getName() == "Default Store View") {
                return false;
            }
        }
        return true;
    }

    public function getProductStartingprice($product)
    {
        if ($product->getTypeId() === 'bundle') {
            return Mage::getModel('bundle/product_price')->getTotalPrices($product, 'min', 1);
        }

        return $product->getFinalPrice();
    }

}

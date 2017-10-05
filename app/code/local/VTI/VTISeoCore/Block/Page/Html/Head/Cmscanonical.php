<?php

class VTI_VTISeoCore_Block_Page_Html_Head_Cmscanonical extends Mage_Core_Block_Template
{
    public function getCanonicalUrl()
    {
        $cmsPagePath = Mage::getSingleton('cms/page')->getIdentifier();
        $isHomePage = Mage::app()->getFrontController()->getAction()->getFullActionName() == 'cms_index_index';
        if ($isHomePage) {
            $canonicalUrl = Mage::getBaseUrl();
        } else {
            $canonicalUrl = Mage::getBaseUrl() . $cmsPagePath;
        }
        $protocol = $this->vtiseoHelper()->getConfig('cms_canonical_protocol');

        $canonicalUrl = str_replace(
            array("http://", "https://"),
            $protocol,
            $canonicalUrl
        );

        if (Mage::helper('core')->isModuleEnabled('Wyomind_Cmstree') && !$isHomePage) {
            $canonicalUrl .= Mage::helper('cmstree')->getUrlSuffix();
        }

        $addSlash = $this->vtiseoHelper()->getConfig('cms_canonical_slashes');

        if ($addSlash) {
            $canonicalUrl .= substr($canonicalUrl, -1) !== '/'
                ? "/"
                : "";
        } else {
            $canonicalUrl = substr($canonicalUrl, -1) == '/'
                ? substr($canonicalUrl, 0, -1)
                : $canonicalUrl;
        }

        $result = new Varien_Object();
        $result->setData('canonical', $canonicalUrl);
        Mage::dispatchEvent('vtiseocore_canonical', array(
            'result' => $result,
            'cms_page_identifier' => $cmsPagePath,
            'protocol' => $protocol,
            'add_slash' => $addSlash,
            'is_homepage' => $isHomePage
        ));
        $canonicalUrl = $result->getData('canonical');

        return $canonicalUrl;
    }

    /**
     * @return VTI_VTISeoCore_Helper_Data
     */
    public function vtiseoHelper()
    {
        return Mage::helper("vtiseocore");
    }
}

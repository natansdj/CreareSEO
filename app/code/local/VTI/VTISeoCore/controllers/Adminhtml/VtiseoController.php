<?php

class VTI_VTISeoCore_Adminhtml_VTIseoController extends Mage_Adminhtml_Controller_Action
{

    public function checkAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/vtiseo/defaultseo');
    }
}

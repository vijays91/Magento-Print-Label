<?php
class Learn_Printlabel_Block_Sales_Order_View extends Mage_Adminhtml_Block_Sales_Order_View
{

    public function __construct()
    {
		parent::__construct();		
		$order = $this->getOrder();	
		
		/* 
			if ($this->_isAllowedAction('ship') && $order->canShip() && !$order->getForcedDoShipmentWithInvoice())
		*/		
		
		if ( !$order->canVirtual() && Mage::helper('printlabel')->printlabel_enable()) {
			$this->_addButton('order_print_label', array(
				'label'     => Mage::helper('sales')->__('Print Label'),
				'onclick'   => 'setLocation(\'' . $this->getPrintLabelUrl() . '\')',
				'class'     => 'go'
			));
		}
	}

    public function getPrintLabelUrl()
    {
        return $this->getUrl('printlabel/index/view');
    }
}
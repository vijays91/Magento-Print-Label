<?php
class Learn_Printlabel_Block_Printlabel extends Mage_Core_Block_Template
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('printlabel/printlabel.phtml');
	}
	
	public function getLogoSrc()
    {
		$logo_src = Mage::getStoreConfig('design/header/logo_src');
        return $this->getSkinUrl($logo_src);
    }
	
	public function getLogoAlt()
    {
		$logo_alt = Mage::getStoreConfig('design/header/logo_alt');
        return $this->getSkinUrl($logo_alt);
    }
	
	public function OrderincrementId($order_id) {
		$order = Mage::getModel('sales/order')->load($order_id);
		return $order->getIncrementId();
	}
	
	public function OrderCustomerName($order_id) {
		$order = Mage::getModel('sales/order')->load($order_id);
		return  $order->getCustomerFirstname()." ". $order->getCustomerLastname();
	}
	
	public function OrderProducts($order_id) {
		$order = Mage::getModel('sales/order')->load($order_id);
		return $order->getAllItems();
	}
	
	public function OrderShippingAddress($order_id) {
		$ret  = "<div>";
		$order = Mage::getModel('sales/order')->load($order_id);
		$address = $order->getShippingAddress()->getData();
		$address = $order->getShippingAddress();
		$ret .= $address->getName();
		$ret .= "</div><div>";
		$ret .= ($address->getCompany()) ? $address->getCompany()."</div><div>" : "";
		$ret .= $address->getStreetFull();
		$ret .= "</div>";
		$ret .= $address->getCity();
		$ret .= " ";
		$ret .= $address->getRegion();
		$ret .= "  "; 
		$ret .= $address->getCountry();		
		$ret .= "  -  "; 
		$ret .= $address->getPostcode();
		$ret .= "  "; 
		$ret .= "</div><div style='margin-top:10px;'> Tel : <i>";
		$ret .= $address->getTelephone();
		$ret .= "</i></div>";
		return $ret;		
	}
}
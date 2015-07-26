<?php
class Learn_Printlabel_Model_Order extends Mage_Sales_Model_Order
{
    public function canVirtual()
	{
		if ($this->getIsVirtual()) {
			return true;
		}
		return false;
	}
}


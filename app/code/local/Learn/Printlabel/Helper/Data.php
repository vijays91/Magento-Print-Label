<?php
class Learn_Printlabel_Helper_Data extends Mage_Core_Helper_Abstract  {

	const XML_PATH_PRINT_LABEL_ENABLE = 'printlabel_tab/printlabel_setting/printlabel_active';
	
	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function printlabel_enable($store) {
		return $this->conf(self::XML_PATH_PRINT_LABEL_ENABLE, $store);
	}
}
?>
<?php
class NewsModules_RichSnippet_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getCategory()
	{
		$_category = Mage::registry('current_category');
		if ($_category)
		{
			$value = $_category->getData('richsnippet_category');
			if ($value > 1)
			{
				$text = Mage::getModel('richsnippet/entity_attribute_source_category')->getOptionText($value);
				return $text;
			}
		}
		return false;
	}
	
	public function getBrand()
	{
		$_product = Mage::registry('current_product');
		if ($_product)
		{
			$value = $_product->getManufacturer();
			if ($value)
			{
				$text = $_product->getResource()->getAttribute('manufacturer')->getFrontend()->getValue($_product);
				return $text;
			}
		}
		return false;
	}
}

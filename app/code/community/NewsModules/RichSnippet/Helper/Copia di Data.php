<?php
class NewsModules_RichSnippet_Helper_Data extends Mage_Core_Helper_Abstract
{
	/*
	protected function getVersionPath($template)
	{
		$version = Mage::getVersion();
		$path = '';
		
		/ *
		if (version_compare($version, '1.6.0.0', '>=') and version_compare($version, '1.6.1.0', '<')) $path = '1_6_0_0';
		else if (version_compare($version, '1.6.1.0', '>=') and version_compare($version, '1.7.0.0', '<')) $path = '1_6_1_0';
		else if (version_compare($version, '1.7.0.0', '>=') and version_compare($version, '1.8.0.0', '<')) $path = '1_7_0_0';
		else if (version_compare($version, '1.8.0.0', '>=') and version_compare($version, '1.9.0.0', '<')) $path = '1_8_0_0';
		else 
		* /
		if (version_compare($version, '1.9.0.0', '>=') and version_compare($version, '1.9.0.1', '<=')) $path = '1_9_0_0';
		
		if (!empty($path)) return 'richsnippet/'.$path.'/'.$template;
		else return $template;
	}

	public function getPriceTemplate($blockName, $productType)
    {
		$template = 'catalog/product/price.phtml';
		if ($productType == 'bundle') $template = 'bundle/catalog/product/price.phtml';
		
		$template = $this->getVersionPath($template);
		
        return $template;
    }

    public function getTemplate($blockName)
    {
		$block = Mage::app()->getLayout()->getBlock($blockName);
		$template = $this->getVersionPath($block->getTemplate());
		
        return $template;
    }
	*/
	
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

<?php
	class NewsModules_RichSnippet_UninstallController extends Mage_Core_Controller_Front_Action
	{
		public function indexAction()
		{
			$enabled = Mage::getStoreConfig('catalog/newsmodules_richsnippet/enable_uninstall') == 1;
			$attribute_id = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_category', 'richsnippet_category');
			$attribute_exists = (boolean) $attribute_id;
			$display_form = $enabled && $attribute_exists;
			
			if (!$attribute_exists) Mage::getSingleton('core/session')->addSuccess('The database has been modified. Now you can uninstall the module via Magento Connect.');
			else if (!$enabled) Mage::getSingleton('core/session')->addError('You need to enable the page in System > Configuration > Catalog > Rich Snippet > Enable Uninstall Page');
			
			$this->loadLayout();
			$this->_initLayoutMessages('customer/session');

			$this->getLayout()->getBlock('form')
				->assign('display_form', $display_form)
				;
				
			$this->renderLayout();
		}
		
		public function executeAction()
		{
			try
			{
				$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
				$installer->startSetup();
				$installer->removeAttribute('catalog_category','richsnippet_category');
				$installer->endSetup();
				
				/*
				$db_resource = Mage::getSingleton('core/resource');
				$table_name = $db_resource->getTableName('core_resource');
				$connection = $db_resource->getConnection('core_write');
				$table = new Zend_Db_Table(array('name' => $table_name, 'db' => $connection));
				$select = $table->select()->where('code = ?', 'richsnippet_setup');
				$row = $table->fetchRow($select);
				$row->delete();
				*/
				
				$config = new Mage_Core_Model_Config();
				$config->saveConfig('catalog/newsmodules_richsnippet/enable_uninstall', "0", 'default', 0);
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				Mage::getSingleton('core/session')->addError('There was an error. Contact technical support.');
			}		
			$this->_redirect('*/*/index');
		}
	}
?>
<?php
	$installer = $this;
	$installer->startSetup();
	
	$entityTypeId     = $installer->getEntityTypeId('catalog_category');
	$attributeSetId   = $installer->getDefaultAttributeSetId($entityTypeId);
	$attributeGroupId = $installer->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);
	
	$installer->addAttribute('catalog_category', 'richsnippet_category',  array(
		'type'     => 'int',
		'label'    => 'Rich Snippet Category',
		'input'    => 'select',
		'source'   => 'richsnippet/entity_attribute_source_category',
		'global'   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
		'required' => false
	));
	
	$installer->addAttributeToGroup(
		$entityTypeId,
		$attributeSetId,
		4, //$attributeGroupId, //General Informations Tab
		'richsnippet_category',
		'20'
	);
	
	$attributeId = $installer->getAttributeId($entityTypeId, 'richsnippet_category');
	
	$installer->endSetup();

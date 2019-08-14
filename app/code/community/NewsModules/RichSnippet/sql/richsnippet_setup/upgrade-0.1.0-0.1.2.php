<?php
	$installer = $this;
	$installer->startSetup();

	$entityTypeId     = $installer->getEntityTypeId('catalog_category');
	$attributeSetId   = $installer->getDefaultAttributeSetId($entityTypeId);
	$attributeGroupId = $installer->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);
	
	$installer->addAttributeToGroup(
		$entityTypeId,
		$attributeSetId,
		$attributeGroupId,
		'richsnippet_category',
		'20'
	);
	
	$installer->endSetup();
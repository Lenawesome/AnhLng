<?php
namespace AnhLng\UiTest\Model;

use AnhLng\UiTest\Api\Data\ContactInterface;

class Contact extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, ContactInterface
{
	const CACHE_TAG = 'aht_blog_contact';

	protected $_cacheTag = 'aht_blog_contact';

	protected $_eventPrefix = 'aht_blog_contact';

	protected function _construct()
	{
		$this->_init('AnhLng\UiTest\Model\ResourceModel\Contact');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}

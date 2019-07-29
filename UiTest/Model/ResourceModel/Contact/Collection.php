<?php
namespace AnhLng\UiTest\Model\ResourceModel\Contact;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'contact_id';
	protected $_eventPrefix = 'aht_blog_contact_collection';
	protected $_eventObject = 'contact_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AnhLng\UiTest\Model\Contact', 'AnhLng\UiTest\Model\ResourceModel\Contact');
	}
}

<?php
namespace AnhLng\ProductQuestion\Model\ResourceModel\Question;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'question_id';
	protected $_eventPrefix = 'anhlng_productquestion_question_collection';
	protected $_eventObject = 'question_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AnhLng\ProductQuestion\Model\Question', 'AnhLng\ProductQuestion\Model\ResourceModel\Question');
	}
}
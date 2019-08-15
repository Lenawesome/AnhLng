<?php
namespace AnhLng\ProductQuestion\Model;

use AnhLng\ProductQuestion\Api\Data\QuestionInterface;

class Question extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, QuestionInterface
{
	const CACHE_TAG = 'anhlng_productquestion_question';

	protected $_cacheTag = 'anhlng_productquestion_question';

	protected $_eventPrefix = 'anhlng_productquestion_question';

	protected function _construct()
	{
		$this->_init('AnhLng\ProductQuestion\Model\ResourceModel\Question');
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
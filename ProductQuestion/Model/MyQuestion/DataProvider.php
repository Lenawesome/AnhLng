<?php
namespace AnhLng\ProductQuestion\Model\MyQuestion;

use AnhLng\ProductQuestion\Model\ResourceModel\Question\CollectionFactory;
use AnhLng\ProductQuestion\Model\MyQuestion;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $questionCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $questionCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $question)
        {
            $this->_loadedData[$question->getId()] = $question->getData();
        }

        return $this->_loadedData;
    }
}

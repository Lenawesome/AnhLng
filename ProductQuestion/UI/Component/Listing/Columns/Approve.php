<?php
namespace AnhLng\ProductQuestion\Ui\Component\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Approve extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
         if(isset($dataSource['data']['items'])) {
            foreach($dataSource['data']['items'] as &$item)
            {
                $item[$this->getData('name')]['approve'] = [
                    'href' => $this->urlBuilder->getUrl('listquestion/index/approve', ['id' => $item['question_id']]),
                    'label' => __('Approve Question'),
                    'hidden' => false
                ];
                $item[$this->getData('name')]['deleteQuestion'] = [
                    'href' => $this->urlBuilder->getUrl('listquestion/index/delete', ['id' => $item['question_id']]),
                    'label' => __('Delete Question'),
                    'hidden' => false
                ];
                $item[$this->getData('name')]['answer'] = [
                    'href' => $this->urlBuilder->getUrl('listquestion/index/answer', ['id' => $item['question_id']]),
                    'label' => __('Answer Question'),
                    'hidden' => false
                ];
            }
         }

        return $dataSource;
    }
}

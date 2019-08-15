<?php
namespace AnhLng\ProductQuestion\Block\Catalog\Product\View;
class QuestionList extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $questionRepository;
    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository,
    \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->questionRepository = $questionRepository;
        parent::__construct($context);
    }
    public function getQuestion(){
        $questionList = $this->questionRepository->getList();
        $product = $this->_registry->registry("current_product");
        $productId = $product->getId();
        $quesArray = array();
        foreach($questionList as $question){
            $questPId = $question->getProduct_id();
            if($questPId==$productId){
                $quesArray[] = $question;
            }
        }
        return $quesArray;
    }
    
}

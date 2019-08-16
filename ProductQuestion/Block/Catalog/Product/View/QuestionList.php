<?php
namespace AnhLng\ProductQuestion\Block\Catalog\Product\View;
class QuestionList extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $questionRepository;
    protected $customerRepository;
    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository,
    \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
    \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->questionRepository = $questionRepository;
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }
    public function getCustomer($id){
        $customer = $this->customerRepository->getById($id);
        return $customer;
    }
    public function getQuestion(){
        $questionList = $this->questionRepository->getList();
        if(isset($questionList)){
            if($questionList!=null){
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
        return null;
    }
    
}

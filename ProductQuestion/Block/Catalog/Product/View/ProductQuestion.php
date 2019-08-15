<?php
namespace AnhLng\ProductQuestion\Block\Catalog\Product\View;
class ProductQuestion extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $customer;
    protected $_customerRepository;
    protected $_questionRepository;
    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\Framework\Registry $registry,
    \Magento\Customer\Model\Session $customer,
    \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
    \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository
    )
    {
        parent::__construct($context);
        $this->_registry = $registry;
        $this->_customerRepository = $customerRepository;
        $this->_questionRepository = $questionRepository;
        $this->customer = $customer;
    }
    public function getProduct(){
        $product = $this->_registry->registry('current_product');
        return $product;
    }
    public function getContent(){
        $questionId = $this->_registry->registry('id');
        $question = $this->_questionRepository->getById($questionId);
        $content = $question->getContent();
        return $content;
    }
    public function getQuestion(){
        $questionId = $this->_registry->registry('id');
        $question = $this->_questionRepository->getById($questionId);
        return $question;
    }
    public function getCustomer(){
        $customerId = $this->customer->getId();
        $customer = $this->_customerRepository->getById($customerId);
        return $customer;
    }
    public function getCustomerQuestion(){
        $questionList = $this->_questionRepository->getList();
        $customerId = $this->customer->getId();
        $customer = $this->_customerRepository->getById($customerId);
        $quesArray = array();
        foreach($questionList as $question){
            $questCId = $question->getCustomer_id();
            if($questCId==$customerId){
                $quesArray[] = $question;
            }
        }
        return $quesArray;
    }
}

<?php
namespace AnhLng\ProductQuestion\Controller\Index;
class SubmitQuestion extends \Magento\Framework\App\Action\Action{
    protected $_pageFactory;
    protected $questionRepository;
    protected $_registry;
    protected $_questionFactory;
    protected $resultRedirect;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AnhLng\ProductQuestion\Model\QuestionRepository $questionRepository,
        \Magento\Framework\Registry $registry,
        \AnhLng\ProductQuestion\Model\QuestionFactory $questionFactory,
        \Magento\Framework\Controller\ResultFactory $result
    )
    {
        $this->_registry = $registry; 
        $this->questionRepository = $questionRepository;
        $this->_pageFactory = $pageFactory;
        $this->_resultRedirect = $result;
        $this->_questionFactory = $questionFactory;
        return parent::__construct($context);
    }
    
    public function execute()
	{
        $data = $this->getRequest()->getPostValue();
        $question = $this->_questionFactory->create();
//        var_dump($data);
//        exit;
        $question->setProduct_id($data['product-id']);
        $question->setCustomer_id($data['customer-id']);
        $question->setEmail($data['email']);
        $question->setContent($data['question']);
        $question->setC_name($data['name']);
        $question->setP_name($data['pName']);
//        $list = $this->questionRepository->getList();
//        foreach ($list as $a){
//            echo "<br>".$a->getC_name();
//        }
//        exit();
        $this->questionRepository->save($question);
        $this->resultRedirect = $this->resultRedirectFactory->create();
        $this->resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $this->resultRedirect;
	}
}   

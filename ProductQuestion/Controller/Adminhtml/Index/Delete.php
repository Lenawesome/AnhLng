<?php
namespace AnhLng\ProductQuestion\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action{
    protected $resultPageFactory;
    protected $questionRepository;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        // \Magento\Customer\Api\CustomerRepositoryInterface $questionRepository
        \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository
    )
    {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
        $this->resultPageFactory = $resultPageFactory;
    }
    
    public function execute(){
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('listquestion/*/');
        $this->questionRepository->deleteById($this->getRequest()->getParam('id'));
        return $resultRedirect;
    }
    
}

<?php
namespace AnhLng\NaPayment\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action{
    protected $resultPageFactory;
    protected $customerRepository;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
    )
    {
        parent::__construct($context);
        $this->customerRepository = $customerRepository;
        $this->resultPageFactory = $resultPageFactory;
    }
    
    public function execute(){
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('napayment/*/');
        $this->customerRepository->deleteById($this->getRequest()->getParam('id'));
        return $resultRedirect;
    }
    
}

<?php
namespace AnhLng\ChangePW\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $customerRepository;
    protected $encryptor;
    protected $resultRedirect;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\Controller\ResultFactory $result
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirect = $result;
        $this->customerRepository = $customerRepository;
        $this->encryptor = $encryptor;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->resultRedirect = $this->resultRedirectFactory->create();
		$this->resultRedirect->setPath('customer/*/');
        $data = $this->getRequest()->getPostValue();
        $id = $data['entity_id'];
        $password = $data['password'];
        $customer = $this->customerRepository->getById($id);
        $this->customerRepository->save($customer, $this->encryptor->getHash($password, true));
        return $this->resultRedirect;
    }
}

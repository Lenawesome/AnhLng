<?php
namespace AnhLng\ChangePW\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $customerRepository;
    protected $encryptor;
    protected $resultRedirect;
    protected $customerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
//        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Customer\Model\Data\CustomerFactory $customerFactory
    )
    {
        $this->customerRepository = $customerRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->customerFactory = $customerFactory;
        $this->resultRedirect = $result;
        
//        $this->customerRepository = $customerRepository;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }
    function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); 
    }
    
    public function execute()
    {
        $this->resultRedirect = $this->resultRedirectFactory->create();
		$this->resultRedirect->setPath('customer/*/');
        $data = $this->getRequest()->getPostValue();
        $password = isset($data['password']) ? $data['password'] : null;
        
        if(!empty($data['entity_id'])){
            $customer = $this->customerRepository->getById($data['entity_id']);
            if($password == null){
                $customer->setFirstname($data['firstname']);
                $customer->setMiddlename($data['middlename']);
                $customer->setLastname($data['lastname']);
                $customer->setEmail($data['email']);
                $customer->setDob($data['dob']);
            }            
        }else{
            $customer = $this->customerFactory->create();
            $customer->setFirstname($data['firstname']);
            $customer->setMiddlename($data['middlename']);
            $customer->setLastname($data['lastname']);
            $customer->setEmail($data['email']);
            $customer->setDob($data['dob']);
            $password = $this->randomPassword();
            // sendMail();
        }
        $this->customerRepository->save($customer,$this->encryptor->getHash($password,true));
        return $this->resultRedirect;
    }
}

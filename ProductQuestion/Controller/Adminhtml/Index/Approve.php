<?php
namespace AnhLng\ProductQuestion\Controller\Adminhtml\Index;

class Approve extends \Magento\Backend\App\Action
{
    // const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $questionRepository;
    protected $encryptor;
    protected $resultRedirect;
    protected $questionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
//        \Magento\Customer\Model\ResourceModel\CustomerRepository $questionRepository,
        \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\Controller\ResultFactory $result,
        \AnhLng\ProductQuestion\Model\QuestionFactory $questionFactory
    )
    {
        $this->questionRepository = $questionRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->questionFactory = $questionFactory;
        $this->resultRedirect = $result;
        
//        $this->questionRepository = $questionRepository;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $this->resultRedirect = $this->resultRedirectFactory->create();
		$this->resultRedirect->setPath('listquestion/*/');
        $id = $this->getRequest()->getParam('id');
        $question = $this->questionRepository->getById($id);
        $question->setApproved('true');
        $this->questionRepository->save($question);
        return $this->resultRedirect;
    }
}

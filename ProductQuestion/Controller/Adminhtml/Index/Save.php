<?php
namespace AnhLng\ProductQuestion\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
//    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $resultRedirect;
    protected $questionRepostory;
    protected $questionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\ResultFactory $result,
        \AnhLng\ProductQuestion\Model\QuestionRepository $questionRepostory,
        \AnhLng\ProductQuestion\Model\QuestionFactory $questionFactory
        
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->questionFactory = $questionFactory;
        $this->resultRedirect = $result;
        $this->questionRepostory = $questionRepostory;
        parent::__construct($context);
    }
    public function execute()
    {
        $this->resultRedirect = $this->resultRedirectFactory->create();
		$this->resultRedirect->setPath('listquestion/*/');
        $data = $this->getRequest()->getPostValue();
        $question = $this->questionRepostory->getById($data['question_id']);
        $question->setContent($data['content']);
        $question->setAnswer($data['answer']);
        $this->questionRepostory->save($question);
        return $this->resultRedirect;
    }
}

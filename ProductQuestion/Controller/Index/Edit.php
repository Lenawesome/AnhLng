<?php
namespace AnhLng\ProductQuestion\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{

//    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_registry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {  
        $questionId = $this->getRequest()->getParam('id');
        $this->_registry->register('id',$questionId);
        return $this->resultPageFactory->create();
    }
}

<?php
namespace AnhLng\ProductQuestion\Controller\Index;

class CustomerQuestion extends \Magento\Framework\App\Action\Action
{

//    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_registry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {  
        return $this->resultPageFactory->create();
    }
}

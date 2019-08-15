<?php 
namespace AnhLng\ProductQuestion\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface; 
 
class Question extends Template implements BlockInterface 
{
    protected $_template = "widget/question.phtml";
    protected $_questionRepository;
    public function __construct(
    \AnhLng\ProductQuestion\Api\QuestionRepositoryInterface $questionRepository,
    \Magento\Framework\View\Element\Template\Context $context,
    )
    {
        $this->_questionRepository = $questionRepository;
        parent::__contruct($context);
    }
    public function showParam(){
        return $this->getData();
    }
    public function getQuestion(){
        return $this->_questionRepository->getList();
    }
    
}

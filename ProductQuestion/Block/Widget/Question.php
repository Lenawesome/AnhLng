<?php 
namespace AnhLng\ProductQuestion\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface; 
 
class Question extends Template implements BlockInterface 
{   
    protected $questionRepository;
    protected $_template = "widget/question.phtml";
    public function __construct(
        \AnhLng\ProductQuestion\Model\QuestionRepository $questionRepository,
        \Magento\Backend\Block\Widget\Context $context
    ){
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
    }
    public function getQuestion(){
        $list =  $this->questionRepository->getList();
        $listApprove = array();
        foreach($list as $question){
            if($question->getApproved() == 'true')
                $listApprove[] = $question;
        }
        return $listApprove;
    }
    public function showParam(){
        return $this->getData();
    }
    
}

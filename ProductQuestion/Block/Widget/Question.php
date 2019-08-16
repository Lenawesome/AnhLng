<?php 
namespace AnhLng\ProductQuestion\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface; 
 
class Question extends Template implements BlockInterface 
{
    protected $_template = "widget/question.phtml";
    public function showParam(){
        return $this->getData();
    }
    
}

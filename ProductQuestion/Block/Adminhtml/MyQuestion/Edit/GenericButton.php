<?php
namespace AnhLng\ProductQuestion\Block\Adminhtml\MyQuestion\Edit;
use Magento\Search\Controller\RegistryConstants;
class GenericButton
{
    protected $urlBuilder;
    protected $registry;
    public function __construct(
       \Magento\Backend\Block\Widget\Context $context,
       \Magento\Framework\Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }
    public function getId()
    {
        $contact = $this->registry->registry('question');
        return $contact ? $contact->getId() : null;
    }
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}

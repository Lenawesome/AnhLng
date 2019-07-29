<?php
namespace AnhLng\UiTest\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ContactRepositoryInterface
{
    /**
     * Save Contact.
     *
     * @param \AnhLng\UiTest\Api\Data\ContactInterface $Contact
     * @return \AnhLng\UiTest\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AnhLng\UiTest\Api\Data\ContactInterface $Contact);

    /**
     * Retrieve Contact.
     *
     * @param int $ContactId
     * @return \AnhLng\UiTest\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ContactId);

    /**
     * Retrieve Contacts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AnhLng\UiTest\Api\Data\ContactSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Contact.
     *
     * @param \AnhLng\UiTest\Api\Data\ContactInterface $Contact
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AnhLng\UiTest\Api\Data\ContactInterface $Contact);

    /**
     * Delete Contact by ID.
     *
     * @param int $ContactId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ContactId);
}

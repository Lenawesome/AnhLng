<?php
namespace AnhLng\ProductQuestion\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface QuestionRepositoryInterface
{
    /**
     * Save Question.
     *
     * @param \AnhLng\ProductQuestion\Api\Data\QuestionInterface$Question
     * @return \AnhLng\ProductQuestion\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AnhLng\ProductQuestion\Api\Data\QuestionInterface $Question);

    /**
     * Retrieve Question.
     *
     * @param int $QuestionId
     * @return \AnhLng\ProductQuestion\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($QuestionId);

    /**
     * Retrieve Questions matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AnhLng\ProductQuestion\Api\Data\QuestionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
     public function getList();
    /**
     * Delete Question.
     *
     * @param \AnhLng\ProductQuestion\Api\Data\QuestionInterface$Question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AnhLng\ProductQuestion\Api\Data\QuestionInterface$Question);

    /**
     * Delete Question by ID.
     *
     * @param int $QuestionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($QuestionId);
}
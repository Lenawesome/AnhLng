<?php
namespace AnhLng\ProductQuestion\Model;

use AnhLng\ProductQuestion\Api\Data;
use AnhLng\ProductQuestion\Api\QuestionRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AnhLng\ProductQuestion\Model\ResourceModel\Question as ResourceQuestion;
use AnhLng\ProductQuestion\Model\ResourceModel\Question\CollectionFactory as QuestionCollectionFactory;
/**
 * Class QuestionRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @var ResourceQuestion
     */
    protected $resource;

    /**
     * @var QuestionFactory
     */
    protected $QuestionFactory;

    /**
     * @var QuestionCollectionFactory
     */
    protected $QuestionCollectionFactory;

    /**
     * @var Data\QuestionSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceQuestion $resource
     * @param QuestionFactory $QuestionFactory
     * @param Data\QuestionInterfaceFactory $dataQuestionFactory
     * @param QuestionCollectionFactory $QuestionCollectionFactory
     * @param Data\QuestionSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceQuestion $resource,
        QuestionFactory $QuestionFactory,
        Data\QuestionInterfaceFactory $dataQuestionFactory,
        QuestionCollectionFactory $QuestionCollectionFactory
    ) {
        $this->resource = $resource;
        $this->QuestionFactory = $QuestionFactory;
        $this->QuestionCollectionFactory = $QuestionCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Question data
     *
     * @param \AnhLng\ProductQuestion\Api\Data\QuestionInterface $Question
     * @return Question
     * @throws CouldNotSaveException
     */
    public function save(\AnhLng\ProductQuestion\Api\Data\QuestionInterface $Question)
    {
       
        try {
            $this->resource->save($Question);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Question: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Question;
    }

    /**
     * Load Question data by given Question Identity
     *
     * @param string $QuestionId
     * @return Question
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($QuestionId)
    {
        $Question = $this->QuestionFactory->create();
        $Question->load($QuestionId);
        if (!$Question->getId()) {
            throw new NoSuchEntityException(__('The CMS Question with the "%1" ID doesn\'t exist.', $QuestionId));
        }
        return $Question;
    }
    
    public function getQuestionByProId($productId){
        $questionList = $this->QuestionCollectionFactory->create();
        return $questionList;
    }

    /**
     * Load Question data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \AnhLng\ProductQuestion\Api\Data\QuestionSearchResultsInterface
     */
    public function getList()
    {
        /** @var \AnhLng\ProductQuestion\Model\ResourceModel\Question\Collection $collection */
        $collection = $this->QuestionCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Question
     *
     * @param \AnhLng\ProductQuestion\Api\Data\QuestionInterface $Question
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\AnhLng\ProductQuestion\Api\Data\QuestionInterface $Question)
    {
        try {
            $this->resource->delete($Question);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Question: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Question by given Question Identity
     *
     * @param string $QuestionId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($QuestionId)
    {
        return $this->delete($this->getById($QuestionId));
    }
}
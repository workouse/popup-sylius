<?php

declare(strict_types=1);

namespace Tests\Workouse\PopupPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManager;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;
use Sylius\Behat\NotificationType;
use Sylius\Behat\Page\Admin\Crud\CreatePageInterface;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface;
use Sylius\Behat\Service\NotificationCheckerInterface;
use Sylius\Behat\Service\Resolver\CurrentPageResolverInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

final class PopupContext implements Context
{
    /** @var SharedStorageInterface */
    private $sharedStorage;

    /** @var CurrentPageResolverInterface */
    private $currentPageResolver;

    /** @var NotificationCheckerInterface */
    private $notificationChecker;

    /** @var IndexPageInterface */
    private $indexPage;

    /** @var CreatePageInterface */
    private $createPage;

    /** @var FactoryInterface */
    private $popupFactory;

    /** @var EntityRepository */
    private $popupRepository;

    /** @var UpdatePageInterface */
    private $updatePage;

    /** @var EntityManager */
    private $entityManager;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        CurrentPageResolverInterface $currentPageResolver,
        NotificationCheckerInterface $notificationChecker,
        IndexPageInterface $indexPage,
        CreatePageInterface $createPage,
        FactoryInterface $popupFactory,
        EntityRepository $popupRepository,
        UpdatePageInterface $updatePage,
        EntityManager $entityManager
    )
    {
        $this->sharedStorage = $sharedStorage;
        $this->currentPageResolver = $currentPageResolver;
        $this->notificationChecker = $notificationChecker;
        $this->indexPage = $indexPage;
        $this->createPage = $createPage;
        $this->popupFactory = $popupFactory;
        $this->popupRepository = $popupRepository;
        $this->updatePage = $updatePage;
        $this->entityManager = $entityManager;
    }

    /**
     * @When I go to the create popup
     */
    public function iGoToTheCreatePopup(): void
    {
        $this->createPage->open();
    }

    /**
     * @When I fill the code with :code
     */
    public function iFillTheCodeWith(string $code): void
    {
        $this->resolveCurrentPage()->fillCode($code);
        $this->sharedStorage->set('code', $code);
    }

    /**
     * @When I fill the title with :title
     */
    public function iFillTheTitleWith(string $title): void
    {
        $this->resolveCurrentPage()->fillTitle($title);
        $this->sharedStorage->set('title', $title);
    }

    /**
     * @When I fill the enabled with :enabled
     */
    public function iFillTheEnabledWith(bool $status): void
    {
        $this->resolveCurrentPage()->fillEnabled($status);
        $this->sharedStorage->set('enabled', $status);
    }

    /**
     * @Then I should be notified that the popup has been created
     */
    public function iShouldBeNotifiedThatNewPopupWasCreated(): void
    {
        $this->notificationChecker->checkNotification(
            'Popup has been successfully created.',
            NotificationType::success()
        );
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt(): void
    {
        $this->resolveCurrentPage()->create();
    }

    /**
     * @Then I should be notified that :fields fields cannot be blank
     */
    public function iShouldBeNotifiedThatFieldsCannotBeBlank(string $fields): void
    {
        $fields = explode(',', $fields);
        foreach ($fields as $field) {
            Assert::true($this->resolveCurrentPage()->containsErrorWithMessage(sprintf(
                '%s cannot be blank.',
                trim($field)
            )));
        }
    }

    /**
     * @Given there is a popup in the store
     */
    public function thereIsAPopupInTheStore(): void
    {
        $popup = $this->createPopup();
        $this->savePopup($popup);
    }

    private function createPopup(?string $code = null, ?bool $enabled = true)
    {
        $popup = $this->popupFactory->createNew();

        if (null === $code) {
            $code = uniqid();
        }

        $popup->setCurrentLocale('en_US');
        $popup->setCode($code);
        $popup->setEnabled($enabled);

        return $popup;
    }

    private function savePopup($popup)
    {
        $this->popupRepository->add($popup);
        $this->sharedStorage->set('popup', $popup);
    }

    /**
     * @When I go to the popups page
     */
    public function iGoToThePopupsPage(): void
    {
        $this->indexPage->open();
    }

    /**
     * @When I delete this popup
     */
    public function iDeleteThisPopup(): void
    {
        $popup = $this->sharedStorage->get('popup');
        $this->indexPage->deletePopup($popup->getCode());
    }

    /**
     * @When I want to edit this popup
     */
    public function iWantToEditThisPopup(): void
    {
        $page = $this->sharedStorage->get('popup');
        $this->updatePage->open(['id' => $page->getId()]);
    }

    /**
     * @When I fill :fields fields
     */
    public function iFillFields(string $fields): void
    {
        $fields = explode(',', $fields);
        foreach ($fields as $field) {
            $this->resolveCurrentPage()->fillField(trim($field), uniqid());
        }
    }

    /**
     * @When I update it
     */
    public function iUpdateIt(): void
    {
        $this->resolveCurrentPage()->saveChanges();
    }

    /**
     * @Then I should be notified that the popup was updated
     */
    public function iShouldBeNotifiedThatThePopupWasUpdated(): void
    {
        $this->notificationChecker->checkNotification(
            'Popup has been successfully updated.',
            NotificationType::success()
        );
    }

    /**
     * @Given this popup has :title title
     */
    public function thisPopupHasTitle($title)
    {
        $this->sharedStorage->get('popup')->setTitle($title);
        $this->entityManager->flush();
    }

    private function resolveCurrentPage(): SymfonyPageInterface
    {
        return $this->currentPageResolver->getCurrentPageWithForm([
            $this->indexPage,
            $this->createPage,
            $this->updatePage
        ]);
    }

}

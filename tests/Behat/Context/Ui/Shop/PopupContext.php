<?php


namespace Tests\Workouse\PopupPlugin\Behat\Context\Ui\Shop;

use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Shop\HomePageInterface;
use Webmozart\Assert\Assert;

class PopupContext implements Context
{
    /** @var HomePageInterface */
    private $homePage;

    public function __construct(HomePageInterface $homePage)
    {
        $this->homePage = $homePage;
    }

    /**
     * @When I go to the homepage
     */
    public function iGoToTheHomepage(): void
    {
        $this->homePage->open();
    }

    /**
     * @Then I should see the :title popup link in the header
     */
    public function iShouldSeeThePopupLinkInTheHeader($title)
    {
        Assert::true($this->homePage->hasPopupWithTitle($title));
    }

}

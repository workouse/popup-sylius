<?php


namespace Tests\Workouse\PopupPlugin\Behat\Page\Admin;

use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

class IndexPage extends BaseIndexPage
{
    public function deletePopup(string $title): void
    {
        $this->deleteResourceOnPage(['title' => $title]);
    }
}

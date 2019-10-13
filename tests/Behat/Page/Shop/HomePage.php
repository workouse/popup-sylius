<?php


namespace Tests\Workouse\PopupPlugin\Behat\Page\Shop;

use Sylius\Behat\Page\Shop\HomePage as BaseHomePage;

class HomePage extends BaseHomePage
{
    public function hasPopupWithTitle(string $title): bool
    {
        return $title === $this->getElement('Title')->getText();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'Title' => '#workouse-popup-plugin-modal > .header'
        ]);
    }
}

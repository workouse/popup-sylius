<?php


namespace Tests\Workouse\PopupPlugin\Behat\Page\Admin;

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseIndexPage;

class UpdatePage extends BaseIndexPage
{
    public function fillField(string $field, string $value): void
    {
        $this->getDocument()->fillField($field, $value);
    }
}

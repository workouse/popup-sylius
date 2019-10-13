<?php

declare(strict_types=1);

namespace Tests\Workouse\PopupPlugin\Behat\Page\Admin;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;
use Tests\Workouse\PopupPlugin\Behat\Behaviour\ContainsErrorTrait;

class CreatePage extends BaseCreatePage
{

    use ContainsErrorTrait;

    public function filltitle(string $title): void
    {
        $this->getDocument()->fillField('Title', $title);
    }

    public function fillEnabled(bool $status): void
    {
        $this->getDocument()->fillField('Enabled', $status);
    }

}

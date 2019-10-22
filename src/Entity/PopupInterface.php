<?php


namespace Workouse\PopupPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface PopupInterface extends ResourceInterface, TranslatableInterface
{
    public function getCode();

    public function setCode($code);

    public function getCustomCss();

    public function setCustomCss($customCss);

    public function getCssClass();

    public function setCssClass($cssClass);

    public function isEnabled();

    public function setEnabled(bool $enabled);

    public function getContent();

    public function getButtonText();

    public function getButtonLink();

    public function getTitle();

    public function setTitle($title);
}

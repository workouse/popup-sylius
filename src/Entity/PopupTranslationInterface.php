<?php


namespace Workouse\PopupPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface PopupTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getContent();

    public function setContent($content);

    public function getButtonText();

    public function setButtonText($buttonText);

    public function getButtonLink();

    public function setButtonLink($buttonLink);
}

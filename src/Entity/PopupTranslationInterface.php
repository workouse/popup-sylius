<?php

declare(strict_types=1);

namespace Workouse\PopupPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface PopupTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getTitle(): ?string;

    public function setTitle(string $title): void;

    public function getContent(): ?string;

    public function setContent(string $content): void;

    public function getButtonText(): ?string;

    public function setButtonText(string $buttonText): void;

    public function getButtonLink(): ?string;

    public function setButtonLink(string $buttonLink): void;
}

<?php

declare(strict_types=1);

namespace Workouse\PopupPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface PopupInterface extends ResourceInterface, TranslatableInterface
{
    public function getCode(): ?string;

    public function setCode(string $code): void;

    public function getCustomCss(): ?string;

    public function setCustomCss(string $customCss): void;

    public function getCssClass(): ?string;

    public function setCssClass(string $cssClass): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function getContent(): ?string;

    public function getButtonText(): ?string;

    public function getButtonLink(): ?string;

    public function getTitle(): ?string;

    public function setTitle(string $title): void;

    public function getRules(): array;

    public function setRules(array $rules): void;
}

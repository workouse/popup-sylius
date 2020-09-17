<?php

declare(strict_types=1);

namespace Workouse\PopupPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="workouse_popup_plugin_popup")
 */
class Popup implements PopupInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    public const RULES = [
        'workouse_popup_plugin.ui.show_only_once' => 'showOnlyOnce',
    ];

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="workouse_popup_plugin.code.not_blank")
     */
    protected $code;

    /**
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    protected $customCss;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $cssClass;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $enabled = false;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $closeEnabled = true;

    /**
     * @var array
     * @ORM\Column(type="json", nullable=true)
     */
    protected $rules = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCustomCss(): ?string
    {
        return $this->customCss;
    }

    public function setCustomCss(string $customCss): void
    {
        $this->customCss = $customCss;
    }

    public function getCssClass(): ?string
    {
        return $this->cssClass;
    }

    public function setCssClass(string $cssClass): void
    {
        $this->cssClass = $cssClass;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getContent(): ?string
    {
        return $this->getTranslation()->getContent();
    }

    public function getButtonText(): ?string
    {
        return $this->getTranslation()->getButtonText();
    }

    public function getButtonLink(): ?string
    {
        return $this->getTranslation()->getButtonLink();
    }

    /**
     * @return PopupTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface
    {
        /** @var PopupTranslationInterface $translation */
        $translation = $this->doGetTranslation($locale);

        return $translation;
    }

    protected function createTranslation(): ?PopupTranslationInterface
    {
        return new PopupTranslation();
    }

    /**
     * @return array|string[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    public function isCloseEnabled(): bool
    {
        return $this->closeEnabled;
    }

    public function setCloseEnabled(bool $closeEnabled): void
    {
        $this->closeEnabled = $closeEnabled;
    }

    public function getTitle(): ?string
    {
        return $this->getTranslation()->getTitle();
    }

    public function setTitle(string $title): void
    {
        $this->getTranslation()->setTitle($title);
    }
}

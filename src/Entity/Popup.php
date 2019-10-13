<?php


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

    const RULES = [
        'Success cookie duration' => 'successCookieDuration',
    ];

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="workouse_popup_plugin.title.not_blank")
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $customCss;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $cssClass;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled = false;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    protected $rules = self::RULES;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getCustomCss()
    {
        return $this->customCss;
    }

    public function setCustomCss($customCss): void
    {
        $this->customCss = $customCss;
    }

    public function getCssClass()
    {
        return $this->cssClass;
    }

    public function setCssClass($cssClass): void
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

    public function getContent()
    {
        return $this->getTranslation()->getContent();
    }

    public function getButtonText()
    {
        return $this->getTranslation()->getButtonText();
    }

    public function getButtonLink()
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
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

}

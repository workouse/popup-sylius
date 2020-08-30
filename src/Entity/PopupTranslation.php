<?php

declare(strict_types=1);

namespace Workouse\PopupPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * @ORM\Entity()
 * @ORM\Table(name="workouse_popup_plugin_popup_translation")
 */
class PopupTranslation extends AbstractTranslation implements PopupTranslationInterface
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    protected $content;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $buttonText;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $buttonLink;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    public function setButtonText(string $buttonText): void
    {
        $this->buttonText = $buttonText;
    }

    public function getButtonLink(): ?string
    {
        return $this->buttonLink;
    }

    public function setButtonLink(string $buttonLink): void
    {
        $this->buttonLink = $buttonLink;
    }
}

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
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $content;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $buttonText;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $buttonLink;

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

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getButtonText()
    {
        return $this->buttonText;
    }

    public function setButtonText($buttonText): void
    {
        $this->buttonText = $buttonText;
    }

    public function getButtonLink()
    {
        return $this->buttonLink;
    }

    public function setButtonLink($buttonLink): void
    {
        $this->buttonLink = $buttonLink;
    }
}

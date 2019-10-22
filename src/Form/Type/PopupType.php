<?php


namespace Workouse\PopupPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Workouse\PopupPlugin\Entity\Popup;

class PopupType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'workouse_popup_plugin.ui.code',
                'required' => false
            ])
            ->add('customCss', TextareaType::class, [
                'label' => 'workouse_popup_plugin.ui.custom_css',
                'required' => false
            ])
            ->add('cssClass', TextType::class, [
                'label' => 'workouse_popup_plugin.ui.css_class',
                'required' => false
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'workouse_popup_plugin.ui.enabled',
            ])
            ->add('closeEnabled', CheckboxType::class, [
                'label' => 'workouse_popup_plugin.ui.close_button_enabled',
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'label' => 'workouse_popup_plugin.ui.translations',
                'entry_type' => PopupTranslationType::class,
            ])
            ->add('rules', ChoiceType::class, [
                'choices' => Popup::RULES,
                'compound' => true,
                'multiple' => true,
                'expanded' => true,
                'label' => 'workouse_popup_plugin.ui.rules'
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'workouse_popup_plugin_popup';
    }
}

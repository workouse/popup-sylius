<?php


namespace Workouse\PopupPlugin\Form\Type;


use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PopupTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'workouse_popup_plugin.ui.title',
                'required' => false
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'workouse_popup_plugin.ui.content',
                'required' => false
            ])
            ->add('buttonText', TextType::class, [
                'label' => 'workouse_popup_plugin.ui.button_text',
                'required' => false
            ])
            ->add('buttonLink', TextType::class, [
                'label' => 'workouse_popup_plugin.ui.button_link',
                'required' => false
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'workouse_popup_plugin_popup_translation';
    }
}

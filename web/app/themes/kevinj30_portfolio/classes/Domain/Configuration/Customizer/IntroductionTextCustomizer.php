<?php

namespace App\Domain\Configuration\Customizer;

use KevinJ30\Customizer\AbstractCustomizer;
use WP_Customize_Manager;

class IntroductionTextCustomizer extends AbstractCustomizer
{
    private string $title = "Personnaliser votre introduction";

    public function section(WP_Customize_Manager $wp_customizer): void
    {
        $wp_customizer->add_section(
            'KevinJ30_section_introduction',
            [
                'title' => __($this->title, 'KevinJ30'),
                'priority' => 120
            ]
        );
    }

    public function settings(WP_Customize_Manager $wp_customizer): void
    {
        /**
         * Title
         **/
        $wp_customizer->add_setting('KevinJ30_setting_introduction_title', [
            'label' => __('Ajouter votre titre')
        ]);

        /**
         * SVG
         **/
        $wp_customizer->add_setting('KevinJ30_setting_introduction_svg', [
            'label' => __('Ajouter une image percutante'),
        ]);

        /**
         * Text
         **/
        $wp_customizer->add_setting('KevinJ30_setting_introduction_text', [
            'label' => __('Ajouter une introduction pertinente'),
        ]);
    }

    public function control(WP_Customize_Manager $wp_customizer): void
    {
        $wp_customizer->add_control('KevinJ30_control_introduction_title', [
            'type' => 'text',
            'label' => __('Ajouter un titre'),
            'section' => 'KevinJ30_section_introduction',
            'settings' => 'KevinJ30_setting_introduction_title'
        ]);

        $wp_customizer->add_control('KevinJ30_control_introduction_svg', [
            'type' => 'textarea',
            'label' => __('Image de présentation'),
            'section' => 'KevinJ30_section_introduction',
            'settings' => 'KevinJ30_setting_introduction_svg',
            'description' => "Saisissez le code SVG de votre image"
        ]);

        $wp_customizer->add_control('KevinJ30_control_introduction_text', [
            'type' => 'textarea',
            'label' => __('Contenu de votre introduction'),
            'section' => 'KevinJ30_section_introduction',
            'settings' => 'KevinJ30_setting_introduction_text',
            'description' => "Ajouter un texte qui vous met en valeur"
        ]);
    }
}

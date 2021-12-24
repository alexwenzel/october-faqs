<?php

namespace Alexwenzel\OctoberFaqs;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'     => 'FAQs',
            'author'   => 'alexander.wenzel.berlin@gmail.com',
            'icon'     => 'icon-question',
            'homepage' => 'https://github.com/piersroberts/october-faqs',
        ];
    }

    public function registerNavigation()
    {
        return [
            'faqs' => [
                'label'       => 'FAQs',
                'url'         => Backend::url('alexwenzel/octoberfaqs/faqs'),
                'iconSvg'     => '/plugins/alexwenzel/octoberfaqs/assets/icon.svg',
                'permissions' => ['alexwenzel.octoberfaqs.*'],
            ],
        ];
    }

    public function registerComponents()
    {
        return [
            'Alexwenzel\OctoberFaqs\Components\FAQ'     => 'faq',
            'Alexwenzel\OctoberFaqs\Components\FAQList' => 'faqlist',
        ];
    }
}

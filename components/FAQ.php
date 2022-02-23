<?php

namespace Alexwenzel\OctoberFaqs\Components;

use Illuminate\Support\Facades\Log;
use Alexwenzel\OctoberFaqs\Models\FAQ as FAQModel;
use Cms\Classes\ComponentBase;

class FAQ extends ComponentBase
{
    private $faq;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQ Questions',
            'description' => 'Fetch a list of questions from a specific FAQ',
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'FAQ Name',
                'description' => 'The name of the FAQ',
                'type'        => 'dropdown',
                'placeholder' => 'Please choose a FAQ',
                'required'    => true,
            ],
            'id'   => [
                'title'             => 'FAQ Id [deprecated]',
                'description'       => 'Use to overide the selected FAQ',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Id must be a number',
            ],
        ];
    }

    public function getSlugOptions()
    {
        $faqs = FAQModel::all();
        $options = [];
        foreach ($faqs as $faq) {
            $options[$faq->slug] = $faq->slug;
        }
        return $options;
    }

    public function onRun()
    {
        if ($this->property('id')) {
            $identifier = $this->property('id');
            $this->faq = FAQModel::with('questions')->find($identifier);
        } else {
            $identifier = $this->property('slug');
            $this->faq = FAQModel::with('questions')->where('slug', $identifier)->first();
        }
    }

    public function title()
    {
        return isset($this->faq->name) ? $this->faq->name : '';
    }

    public function questions()
    {
        return isset($this->faq->questions) ? $this->faq->questions : [];
    }

    public function schemaFAQPage()
    {
        $result = [];
        foreach ($this->questions() as $item) {
            $result[] = [
                "@type"          => "Question",
                "name"           => strip_tags($item->question),
                "answerCount"    => 1,
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text"  => strip_tags($item->answer)
                ]
            ];
        }

        return $result;
    }
}

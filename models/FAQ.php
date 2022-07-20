<?php

namespace Alexwenzel\OctoberFaqs\Models;

use Eloquent;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Sluggable;

/**
 * @mixin Eloquent
 */
class FAQ extends Model
{
    use Sluggable;

    public $table = 'bc_faqs';

    /**
     * @var array
     */
    public $hasMany = [
        'questions'       => [
            'Alexwenzel\OctoberFaqs\Models\Question',
            'key'   => 'faq_id',
            'order' => 'sort_order',
        ],
        'questions_count' => [
            'Alexwenzel\OctoberFaqs\Models\Question',
            'key'   => 'faq_id',
            'count' => true,
        ],
    ];

    /**
     * @var string[]
     */
    protected array $slugs = ['slug' => 'name'];

    /**
     * @var string[]
     */
    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel',
    ];

    /**
     * @var array
     */
    public array $translatable = [
        "name",
    ];
}

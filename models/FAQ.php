<?php

namespace Alexwenzel\OctoberFaqs\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Traits\Sluggable;

class FAQ extends Model
{
    use Sluggable;

    public $table = 'bc_faqs';
    public $hasMany = [
        'questions' => [
            'Alexwenzel\OctoberFaqs\Models\Question',
            'key' => 'faq_id',
            'order' => 'sort_order',
        ],
        'questions_count' => [
            'Alexwenzel\OctoberFaqs\Models\Question',
            'key' => 'faq_id',
            'count' => true,
        ],
    ];

    protected $slugs = ['slug' => 'name'];
}

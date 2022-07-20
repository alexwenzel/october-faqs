<?php

namespace Alexwenzel\OctoberFaqs\Models;

use Eloquent;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Sortable;

/**
 * @mixin Eloquent
 */
class Question extends Model
{
    use Sortable;

    public $table = 'bc_questions';
    public $belongsTo = [
        'faq'   => 'FAQ',
        'order' => 'sort_order',
    ];

    /**
     * @var array
     */
    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel',
    ];

    /**
     * @var array
     */
    public array $translatable = [
        "question",
        "answer",
        "details",
    ];
}

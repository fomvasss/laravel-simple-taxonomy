<?php

namespace Fomvasss\SimpleTaxonomy\Models\Traits;

use Fomvasss\SimpleTaxonomy\Models\Term;
use Fomvasss\SimpleTaxonomy\Models\Vocabulary;

/**
 *
 * Trait HasTaxonomyablesToMany
 *
 * @package App\Models\Traits
 */
trait HasTaxonomyablesToMany
{
    /**
     * Сущность текущей модели "относится" к разным термам.
     * Получить список термов, к которым относится.
     *
     * @return $this
     */
    public function termsToMany()
    {
        $related = config('taxonomy.term_model');
        
        return $this->morphToMany($related, 'termable');
    }
}

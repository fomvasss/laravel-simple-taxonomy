<?php

namespace Fomvasss\SimpleTaxonomy\Models\Traits;

use Fomvasss\SimpleTaxonomy\Models\Term;
use Fomvasss\SimpleTaxonomy\Models\Vocabulary;

/**
 * Сущность текущей модели "относится" к разным
 * словарям или термам
 * (для класса модели к которому подключен трейт - методы не используются для категоризации)
 *
 * Trait HasTaxonomyablesToMany
 *
 * @package App\Models\Traits
 */
trait HasTaxonomyablesToMany
{
    /**
     * Сущность текущей модели "относится" к разным словарям.
     * Получить к список словарей, к которым относится.
     *
     * @return $this
     */
    public function vocabulariesToMany()
    {
        $related = config('taxonomy.models.vocabulary', Vocabulary::class);
        
        return $this->morphToMany($related, 'vocabularyable');
    }

    /**
     * Сущность текущей модели "относится" к разным термам.
     * Получить список термов, к которым относится.
     *
     * @return $this
     */
    public function termsToMany()
    {
        $related = config('taxonomy.term_model', Term::class);
        
        return $this->morphToMany($related, 'termable');
    }
}

<?php

namespace Fomvasss\SimpleTaxonomy\Models;

use Fomvasss\SimpleTaxonomy\Models\Traits\HasTaxonomies;
use Fomvasss\SimpleTaxonomy\Models\Traits\HasTaxonomyablesToMany;
use Fomvasss\SimpleTaxonomy\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Term extends Model
{
    use HasTaxonomies,
        HasTaxonomyablesToMany,
        NodeTrait;

    protected $guarded = ['id'];

    protected static function booted()
    {
        foreach (config('taxonomy.term_prepare_scopes', []) as $class) {
            if (class_exists($class)) {
                static::addGlobalScope(new $class);
            }
        }
    }

    /**
     * Relationship: Current model "has" many other terms.
     *
     * @return $this
     */
    public function termsByMany()
    {
        $related = config('taxonomy.term_model', static::class);
        
        return $this->morphedByMany($related, 'termable');
    }

    /**
     * Terms by vocabulary.
     *
     * @param $query
     * @param $vocabulary
     * @param string|null $vocabularyKey
     */
    public function scopeByVocabulary($query, $vocabulary)
    {
        $query->where('vocabulary', $vocabulary);
    }

    /**
     * Get Vocabulary data.
     *
     * @return array
     */
    public function getVocabulary(): array
    {
        $vocabularies = config('taxonomy.vocabularies', []);

        return $vocabularies[$this->vocabulary] ?? [];
    }
}

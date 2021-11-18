<?php

namespace Fomvasss\SimpleTaxonomy\Models\Traits;

use Fomvasss\SimpleTaxonomy\Models\Term;

/**
 * Trait for custom model classes that use taxonomy.
 *
 * Trait HasTaxonomies
 *
 * @package App\Models\Traits
 */
trait HasTaxonomies
{
    /**
     * Relationship: Entity current model "refers" to different terms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function terms()
    {
        $related = config('taxonomy.term_model');

        return $this->morphToMany($related, 'termable');
    }
    
    /**
     * Relationship: of the current model, from the term according to the specified vocabulary.
     *
     * @param $vocabulary
     * @param string|null $vocabularyKey
     * @return mixed
     */
    public function termsByVocabulary($vocabulary)
    {
        return $this->terms()->where('vocabulary', $vocabulary);
    }

    /**
     * @param null $foreignKey
     * @param null $ownerKey
     * @return mixed
     */
    public function term($foreignKey = null, $ownerKey = null, $relation = null)
    {
        $related = config('taxonomy.term_model');

        return $this->belongsTo($related, $foreignKey, $ownerKey, $relation);
    }

    /**
     * Сущности по указанным термам с соответствующих указанных словарей, например:
     * получить все Статьи терма-категории "Политика" (23) с словаря "Категории статтей" И
     * терма-города "Лондон" (35) или "Киев" (56) с словаря "Города"
     *
     * @param $query
     * @param array $taxonomies Example:
     *  [
     *      'categories' => 23,
     *      'cities' => [35, 56]
     *  ]
     * @param string $termKey
     */
    public function scopeByTaxonomies($query, array $taxonomies, string $termKey = 'id')
    {
        foreach ($taxonomies as $vocabulary => $terms) {
            $terms = is_array($terms) ? $terms : [$terms];
            $terms = array_filter($terms);
            if (count($terms)) {
                $query->whereHas('terms', fn ($t) => $t->where('vocabulary', $vocabulary)->whereIn($termKey, $terms));
            }
        }
    }

    /**
     * Terms of the current model according to the specified vocabulary.
     *
     * @param $query
     * @param $vocabulary
     * @param string $vocabularyKey
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function scopeTermsByVocabulary($query, $vocabulary)
    {
        return $query->whereHas('terms', fn ($t) => $t->where('vocabulary', $vocabulary));
    }
}

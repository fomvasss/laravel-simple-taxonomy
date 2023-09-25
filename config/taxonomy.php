<?php

return [

    /*
     * This model will be used to Term.
     */
    'term_model' => \Fomvasss\SimpleTaxonomy\Models\Term::class,

    /*
     * Define dictionaries to be in Your project.
     */
    'vocabularies' => [
        // 'categories' => [
        //     'name' => 'Categories',
        //     'description' => 'Shop product categories',
        //     'has_hierarchy' => true,
        //     'some_field' => 'Qqq',
        // ],

        // 'tags' => [
        //     'name' => 'Tags',
        //     'description' => 'Tags for articles',
        //     'has_hierarchy' => false,
        // ],
    ],

    /*
     * Apply global scopes for model terms.
     */
    'term_prepare_scopes' => [
        \Fomvasss\SimpleTaxonomy\Models\Scopes\WeightScope::class,
    ],
];

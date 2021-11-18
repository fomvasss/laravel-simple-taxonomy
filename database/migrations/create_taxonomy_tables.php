<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createTermsTable();

        $this->createTermablesTable();
    }

    /**
     * Taxonomy terms table
     */
    public function createTermsTable()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index();

            $table->string('name');
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            
            // Used Nested https://github.com/lazychaser/laravel-nestedset
            $table->unsignedInteger('_lft')->default(0);
            $table->unsignedInteger('_rgt')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('weight')->default(0);

            $table->string('vocabulary')->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Таблица сущностей "привязанных" к термам
     */
    public function createTermablesTable()
    {
         Schema::create('termables', function (Blueprint $table) {
             $table->unsignedInteger('term_id');
             $table->morphs('termable');
    
             $table->foreign('term_id')
                 ->references('id')
                 ->on('terms')
                 ->onDelete('CASCADE');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termables');
        Schema::dropIfExists('terms');
    }
}

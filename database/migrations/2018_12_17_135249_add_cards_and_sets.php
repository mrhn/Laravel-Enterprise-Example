<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardsAndSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $blueprint): void {
            $blueprint->uuid('id');
            $blueprint->string('name');
            $blueprint->unsignedInteger('size');
            $blueprint->string('type');

            $blueprint->primary('id');
        });

        Schema::create('cards', function (Blueprint $blueprint): void {
            $blueprint->uuid('id');
            $blueprint->string('name');
            $blueprint->string('power')->nullable();
            $blueprint->string('toughness')->nullable();
            $blueprint->string('mana_cost');
            $blueprint->double('converted_mana_cost');
            $blueprint->text('colors');
            $blueprint->text('color_identity');
            $blueprint->string('text');

            $blueprint->string('type');
            $blueprint->text('types');
            $blueprint->text('sub_types');
            $blueprint->text('super_types');

            $blueprint->string('frame_version');
            $blueprint->boolean('has_foil');
            $blueprint->boolean('has_non_foil');
            $blueprint->boolean('is_reserved');
            $blueprint->string('layout');
            $blueprint->text('rulings');
            $blueprint->boolean('starter');
            $blueprint->integer('tcgplayer_product_id');

            $blueprint->primary('id');
        });

        Schema::create('card_set', function (Blueprint $blueprint): void {
            $blueprint->uuid('card_id');
            $blueprint->uuid('set_id');

            $blueprint->foreign('card_id')->references('id')->on('cards');
            $blueprint->foreign('set_id')->references('id')->on('sets');
            $blueprint->primary(['card_id', 'set_id']);
        });

        Schema::create('formats', function (Blueprint $blueprint): void {
            $blueprint->uuid('id');
            $blueprint->string('name');

            $blueprint->primary('id');
        });

        Schema::create('card_format', function (Blueprint $blueprint): void {
            $blueprint->uuid('card_id');
            $blueprint->uuid('format_id');

            $blueprint->foreign('card_id')->references('id')->on('cards');
            $blueprint->foreign('format_id')->references('id')->on('formats');
            $blueprint->primary(['card_id', 'format_id']);
        });

        Schema::create('card_locales', function (Blueprint $blueprint): void {
            $blueprint->uuid('id');
            $blueprint->string('language');
            $blueprint->string('name');
            $blueprint->string('text')->nullable();
            $blueprint->string('type')->nullable();

            $blueprint->primary('id');
            $blueprint->uuid('card_id');
            $blueprint->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_locales');

        Schema::dropIfExists('card_format');
        Schema::dropIfExists('formats');

        Schema::dropIfExists('card_set');
        Schema::dropIfExists('sets');
        Schema::dropIfExists('cards');
    }
}

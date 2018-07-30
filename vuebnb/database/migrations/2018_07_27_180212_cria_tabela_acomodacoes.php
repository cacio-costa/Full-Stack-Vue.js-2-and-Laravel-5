<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaAcomodacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acomodacao', function (Blueprint $tabela) {
            $tabela->primary('id');
            $tabela->unsignedInteger('id');
            $tabela->string('title');
            $tabela->string('address');
            $tabela->longText('about');
            
            // Amenities
            $tabela->boolean('amenity_wifi')->default(false);
            $tabela->boolean('amenity_pets_allowed')->default(false);
            $tabela->boolean('amenity_tv')->default(false);
            $tabela->boolean('amenity_kitchen')->default(false);
            $tabela->boolean('amenity_breakfast')->default(false);
            $tabela->boolean('amenity_laptop')->default(false);
            
            // Prices
            $tabela->string('price_per_night')->nullable();
            $tabela->string('price_extra_people')->nullable();
            $tabela->string('price_weekly_discount')->nullable();
            $tabela->string('price_monthly_discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acomodacao');
    }
}

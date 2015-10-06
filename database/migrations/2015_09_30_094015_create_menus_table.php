<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('menus', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');$table->string('title_lat');$table->string('title_en');$table->string('url');$table->string('order');$table->string('parent_id');$table->string('type');$table->string('option');$table->string('is_published');$table->string('lang');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
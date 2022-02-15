<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('app_page_web', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url');
            $table->string('name');
            $table->integer('urutan');
            $table->char('status');
            $table->timestamps();
        });

        Schema::create('app_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('icon');
            $table->string('label')->nullable();
            $table->text('descp')->nullable();
            $table->char('status');
            $table->timestamps();
        });

        Schema::create('app_profile', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->text('descp')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('longlat')->nullable();
            $table->timestamps();
        });

        Schema::create('app_member', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->text('descp')->nullable();
            $table->timestamps();
        });

        Schema::create('app_banner', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->string('label')->nullable();
            $table->string('descp')->nullable();
            $table->char('status');
            $table->timestamps();
        });
      
        Schema::create('app_member_image', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('image');
            $table->text('descp')->nullable();
            $table->char('status');
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
        //
    }
}

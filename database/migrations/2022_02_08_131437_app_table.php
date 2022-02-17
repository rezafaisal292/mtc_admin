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
            $table->string('url',50);
            $table->string('name',50);
            $table->integer('urutan');
            $table->char('status',1);
            $table->timestamps();
        });

        Schema::create('app_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('icon',100);
            $table->string('label')->nullable();
            $table->text('descp')->nullable();
            $table->char('status',1);
            $table->timestamps();
        });

        Schema::create('app_profile', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image',100)->nullable();
            $table->string('name',50)->nullable();
            $table->text('descp')->nullable();
            $table->string('phone',30)->nullable();
            $table->string('email',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('longlat',30)->nullable();
            $table->timestamps();
        });

        Schema::create('app_member', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image',100)->nullable();
            $table->string('name',50)->nullable();
            $table->text('descp')->nullable();
            $table->timestamps();
        });

        Schema::create('app_banner', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->string('label',30)->nullable();
            $table->string('descp',100)->nullable();
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

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
            $table->string('url',100)->nullable();
            $table->string('image',100)->nullable();
            $table->string('name',50)->nullable();
            $table->text('descp')->nullable();
            $table->timestamps();
        });

        Schema::create('app_member_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url',100);
            $table->string('image',100);
            $table->text('descp')->nullable();
            $table->uuid('id_member');
            $table->char('status',1);
            $table->timestamps();
        });


        Schema::create('app_produk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url',100)->nullable();
            $table->string('image',100)->nullable();
            $table->string('label',30)->nullable();
            $table->string('descp',100)->nullable();
            $table->uuid('member')->nullable();
            $table->uuid('services')->nullable();
            $table->char('tipe_produk',1);
            $table->char('status',1);
            $table->timestamps();
            
        });
        Schema::create('app_produk_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url',100)->nullable();
            $table->string('image',100)->nullable();
            $table->string('label',30)->nullable();
            $table->string('descp',100)->nullable();
            $table->uuid('id_produk');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('app_produk')
            ->onUpdate('cascade')->onDelete('cascade');

        });

        
        Schema::create('app_banner', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image',100)->nullable();
            $table->string('label',30)->nullable();
            $table->string('descp',100)->nullable();
            $table->integer('urutan');
            $table->char('status');
            $table->timestamps();
        });
        Schema::create('app_sosmed', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image',100)->nullable();
            $table->string('label',30)->nullable();
            $table->uuid('member')->nullable();
            $table->char('status');
            $table->timestamps();
        });
        Schema::create('app_client', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image',100)->nullable();
            $table->string('label',30)->nullable();
            $table->string('descp',100)->nullable();
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

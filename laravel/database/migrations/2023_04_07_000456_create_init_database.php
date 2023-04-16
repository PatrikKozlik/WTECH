<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->id();
            $table->string('value', 25);
        });

        Schema::create('city', function (Blueprint $table) {
            $table->id();
            $table->string('value', 25);
        });

        Schema::create('street_number', function (Blueprint $table) {
            $table->id();
            $table->string('value', 10);
            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id')
                ->on('city')
                ->onDelete('cascade');
            // $table->timestamps();
        });

        Schema::create('street', function (Blueprint $table) {
            $table->id();
            $table->string('value', 45);
            $table->unsignedBigInteger('street_number_id');

            $table->foreign('street_number_id')
                ->references('id')
                ->on('street_number')
                ->onDelete('cascade');
            // $table->timestamps();
        });

        Schema::create('postal_code', function (Blueprint $table) {
            $table->id();
            $table->string('value', 25);
            $table->unsignedBigInteger('street_id');

            $table->foreign('street_id')
                ->references('id')
                ->on('street')
                ->onDelete('cascade');
            // $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('value', 25);
            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade');
            // $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('first_name', 25)->nullable();
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25)->nullable();
            $table->string('email', 254);
            $table->string('phone', 20)->nullable();
            $table->dateTime('create_date');
            
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');
        });

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->dateTime('create_date');    
            $table->unsignedBigInteger('postalcode_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('state_id');

            $table->foreign('postalcode_id')
                ->references('id')
                ->on('postal_code')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')->nullable();

            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade');
        });

        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('value', 25);
            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade');
        });

        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('value', 50);
            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 40);
            $table->float('price', 8, 2);
            $table->integer('number_of_products');
            $table->boolean('available');
            $table->text('details');
            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

            $table->foreign('supplier_id')
                ->references('id')
                ->on('supplier')
                ->onDelete('cascade');
        });

        Schema::create('product_user', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_products');
            $table->string('first_name', 25)->nullable();
            $table->string('last_name', 25)->nullable();
            
            $table->string('transport_type', 25);
            $table->string('payment_type', 25);
            
            $table->dateTime('create_date');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('address_id')->nullable();

            $table->foreign('address_id')
                ->references('id')
                ->on('address')
                ->onDelete('cascade')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')->nullable();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
        DB::statement('ALTER TABLE products ADD FULLTEXT INDEX product_name_fulltext (product_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
        Schema::dropIfExists('city');
        Schema::dropIfExists('street_number');
        Schema::dropIfExists('street');
        Schema::dropIfExists('postal_code');
        Schema::dropIfExists('role');
        Schema::dropIfExists('users');
        Schema::dropIfExists('address');
        Schema::dropIfExists('category');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_user');
    }
}

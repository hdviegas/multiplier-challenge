<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('email', 100);
            $table->timestamps();
        });
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->float('price', 10, 2);
            $table->foreignId('category_id')->constrained("product_categories");
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("customer_id")->constrained("customers");
            $table->dateTime("mail_sent");
            $table->timestamps();
        });
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders");
            $table->foreignId("product_id")->constrained("products");
            $table->integer("quantity");
            $table->float("price");
            $table->timestamps();
        });
        Schema::create('event_logs', function (Blueprint $table) {
            $table->id();
            $table->string("table", 50);
            $table->integer("operation");
            $table->text("old_values")->nullable();
            $table->text("new_values")->nullable();
            $table->text("references");
            //$table->foreignId("user_id")->constrained('users');
            $table->integer("user_id");
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('prodproducts_categoryucts');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_product');
        Schema::dropIfExists('event_logs');
    }
}

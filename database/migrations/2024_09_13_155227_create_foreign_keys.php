<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('clients', function(Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('carts', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('carts', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('cities', function(Blueprint $table) {
            $table->foreign('governorate_id')->references('id')->on('governorates')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::table('orders', function(Blueprint $table) {
            $table->dropForeign('orders_client_id_foreign');
        });
        Schema::table('clients', function(Blueprint $table) {
            $table->dropForeign('clients_city_id_foreign');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_client_id_foreign');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_post_id_foreign');
        });
        Schema::table('carts', function(Blueprint $table) {
            $table->dropForeign('carts_client_id_foreign');
        });
        Schema::table('carts', function(Blueprint $table) {
            $table->dropForeign('carts_product_id_foreign');
        });
        Schema::table('cities', function(Blueprint $table) {
            $table->dropForeign('cities_governorate_id_foreign');
        });
    }
}

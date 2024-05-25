<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'order_user_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained(table: 'products', indexName: 'order_product_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('products_total');
            $table->foreignId('address_id')->constrained(table: 'addresses', indexName: 'order_address_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
